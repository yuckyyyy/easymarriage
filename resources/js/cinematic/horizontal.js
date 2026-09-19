import gsap from 'gsap';
import { PIN, reducedMotion } from './config';

/**
 * One continuous pin: Georgia layers → crossfade into Arrival → horizontal film.
 * Pins the outer section (not an overflow:hidden child) so ScrollTrigger can hold.
 */
export function initHorizontal() {
    const run = document.getElementById('georgia-journey');
    const stage = document.getElementById('film-run-pin');
    const georgia = document.getElementById('georgia');
    const horizontal = document.getElementById('journey-film');
    const track = horizontal?.querySelector('.horizontal__track');
    const chapters = horizontal ? gsap.utils.toArray('.horizontal__chapter') : [];

    if (!run || !stage || !georgia || !horizontal || !track) {
        return;
    }

    const back = georgia.querySelector('.georgia__img--back img');
    const mid = georgia.querySelector('.georgia__img--mid');
    const fore = georgia.querySelector('.georgia__img--fore');
    const copy = georgia.querySelector('.georgia__copy');
    const facts = georgia.querySelector('.georgia__facts');
    const firstFrame = chapters[0]?.querySelector('img');
    const isStacked = window.matchMedia('(max-width: 1080px)').matches;

    if (reducedMotion) {
        gsap.set([mid, fore, horizontal, georgia], { opacity: 1, clearProps: 'transform' });
        return;
    }

    gsap.set(mid, { opacity: 0 });
    gsap.set(fore, { opacity: 0 });
    gsap.set(georgia, { opacity: 1 });

    // Stacked layout: pin Georgia alone, then chapters scroll normally below
    if (isStacked) {
        gsap.set(horizontal, { opacity: 1, clearProps: 'transform' });
        gsap.set(firstFrame, { scale: 1 });

        gsap.timeline({
            defaults: { ease: 'none' },
            scrollTrigger: {
                trigger: georgia,
                start: 'top top',
                end: () => `+=${Math.round(window.innerHeight * 2.2)}`,
                ...PIN,
                pin: true,
                pinSpacing: true,
                scrub: 0.7,
                fastScrollEnd: false,
            },
        })
            .to(back, { yPercent: 8, scale: 1.06, duration: 1.4 }, 0)
            .to(mid, { opacity: 1, yPercent: -4, duration: 0.4 }, 0.15)
            .to(fore, { opacity: 0.45, yPercent: -6, duration: 0.4 }, 0.45)
            .to(copy, { y: -14, duration: 1.4 }, 0)
            .to(facts, { y: -8, duration: 1.4 }, 0);

        return;
    }

    gsap.set(horizontal, { opacity: 0 });
    gsap.set(track, { x: 0 });
    if (firstFrame) {
        gsap.set(firstFrame, { scale: 1.08 });
    }

    const getTravel = () => {
        const total = chapters.reduce((sum, chapter) => sum + chapter.offsetWidth, 0);
        return Math.max(window.innerWidth, total - window.innerWidth);
    };

    // Longer hold so the pinned scene finishes before the next section can enter
    const getEnd = () => Math.round(window.innerHeight * 3.2 + getTravel());

    const tl = gsap.timeline({
        defaults: { ease: 'none' },
        scrollTrigger: {
            trigger: run,
            start: 'top top',
            end: () => `+=${getEnd()}`,
            ...PIN,
            pin: true,
            pinSpacing: true,
            scrub: 0.7,
            fastScrollEnd: false,
        },
    });

    // Act 1 — Why Georgia holds while layers build
    tl.to(back, { yPercent: 8, scale: 1.06, duration: 1.6 }, 0)
        .to(mid, { opacity: 1, yPercent: -4, duration: 0.45 }, 0.2)
        .to(fore, { opacity: 0.45, yPercent: -6, duration: 0.45 }, 0.55)
        .to(copy, { y: -14, duration: 1.6 }, 0)
        .to(facts, { y: -8, duration: 1.6 }, 0);

    // Act 2 — same pin, morph into Arrival
    tl.to([copy, facts], { opacity: 0, y: -36, duration: 0.55 }, 1.5)
        .to([mid, fore], { opacity: 0, duration: 0.6 }, 1.52)
        .to(back, { opacity: 0, duration: 0.6 }, 1.55)
        .to(horizontal, { opacity: 1, duration: 0.6 }, 1.52)
        .to(firstFrame, { scale: 1, duration: 0.75 }, 1.52)
        .to(georgia, { opacity: 0, duration: 0.4 }, 1.85);

    // Act 3 — horizontal journey while still pinned
    const travelStart = 2.15;
    tl.to(
        track,
        {
            x: () => -getTravel(),
            duration: 3,
        },
        travelStart,
    );

    chapters.slice(1).forEach((chapter, index) => {
        const frame = chapter.querySelector('img');
        if (!frame) {
            return;
        }
        const slot = 3 / Math.max(1, chapters.length - 1);
        tl.fromTo(
            frame,
            { scale: 1.06 },
            { scale: 1, duration: slot * 0.85, ease: 'none' },
            travelStart + index * slot + 0.1,
        );
    });
}
