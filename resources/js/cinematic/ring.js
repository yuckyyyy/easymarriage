import gsap from 'gsap';
import { EASE, PIN, reducedMotion } from './config';
import { inners } from './split';

export async function initRing() {
    const hero = document.getElementById('hero');
    const stage = document.getElementById('ring-stage');
    const plateA = stage?.querySelector('.hero__plate--a');
    const plateB = stage?.querySelector('.hero__plate--b');

    if (!hero || !stage || !plateA) {
        return;
    }

    const copy = hero.querySelector('.hero__copy');
    const titleLines = inners(hero);
    const italic = hero.querySelector('.hero__italic');
    const lede = hero.querySelector('.hero__lede');
    const facts = hero.querySelector('.hero__facts');
    const cta = hero.querySelector('.btn');
    const scrollHint = hero.querySelector('.hero__scroll');
    const bars = hero.querySelectorAll('.hero__bar');
    const lightSweep = stage.querySelector('.hero__light');
    const introTargets = [italic, lede, facts, cta, scrollHint].filter(Boolean);

    gsap.set(plateA, { scale: 1.08, yPercent: 2 });
    gsap.set(plateB, { scale: 1.12, opacity: 0 });
    gsap.set(stage, { perspective: 1400 });
    gsap.set(bars, { scaleY: 1, transformOrigin: 'center' });

    const showCopy = () => {
        gsap.set(titleLines, { y: '0%' });
        gsap.set(introTargets, { opacity: 1, y: 0, clearProps: 'transform' });
    };

    const distance = () => {
        const compact = window.matchMedia('(max-width: 1080px)').matches;
        return Math.round(window.innerHeight * (compact ? 1.15 : 1.45));
    };

    // Register the pin immediately — never wait on the intro timeline
    if (!reducedMotion) {
        gsap.timeline({
            defaults: { ease: 'none' },
            scrollTrigger: {
                trigger: hero,
                start: 'top top',
                end: () => `+=${distance()}`,
                ...PIN,
            },
        })
            .to(plateA, { scale: 1.2, yPercent: 6, duration: 1 }, 0)
            .to(bars, { scaleY: 0.55, duration: 0.35 }, 0)
            .to(copy, { opacity: 0, y: -56, duration: 0.22 }, 0.18)
            .to(scrollHint, { opacity: 0, duration: 0.08 }, 0.16)
            .to(lightSweep, { opacity: 0.55, duration: 0.12 }, 0.28)
            .to(plateB, { opacity: 1, scale: 1.04, duration: 0.32 }, 0.42)
            .to(bars, { scaleY: 1, duration: 0.2 }, 0.78);
    }

    if (reducedMotion) {
        showCopy();
        gsap.set(plateA, { scale: 1.04, yPercent: 0 });
        gsap.set(plateB, { opacity: 0 });
        return;
    }

    await new Promise((resolve) => {
        let settled = false;
        const done = () => {
            if (settled) {
                return;
            }
            settled = true;
            showCopy();
            resolve();
        };

        gsap.timeline({
            defaults: { ease: EASE.reveal },
            onComplete: done,
        })
            .fromTo(bars, { scaleY: 2.4 }, { scaleY: 1, duration: 1.1 }, 0)
            .fromTo(plateA, { scale: 1.18, yPercent: 4 }, { scale: 1.08, yPercent: 2, duration: 1.35 }, 0)
            .fromTo(titleLines, { y: '110%' }, { y: '0%', duration: 1.05, stagger: 0.1 }, 0.18)
            .fromTo(italic, { opacity: 0, y: 14 }, { opacity: 1, y: 0, duration: 0.65 }, 0.48)
            .fromTo([lede, facts, cta], { opacity: 0, y: 18 }, { opacity: 1, y: 0, duration: 0.55, stagger: 0.08 }, 0.62)
            .fromTo(scrollHint, { opacity: 0 }, { opacity: 1, duration: 0.4 }, 0.9);

        // Safety: never block boot if RAF is throttled
        window.setTimeout(done, 2800);
    });
}
