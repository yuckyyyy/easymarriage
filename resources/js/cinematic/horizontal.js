import gsap from 'gsap';
import { reducedMotion } from './config';

export function initHorizontal() {
    const section = document.getElementById('journey-film');
    const track = section?.querySelector('.horizontal__track');

    if (!section || !track || reducedMotion) {
        return;
    }

    if (window.matchMedia('(max-width: 1080px)').matches) {
        return;
    }

    gsap.to(track, {
        x: () => -(track.scrollWidth - window.innerWidth),
        ease: 'none',
        scrollTrigger: {
            trigger: section,
            start: 'top top',
            end: () => `+=${Math.max(track.scrollWidth - window.innerWidth, window.innerHeight * 2)}`,
            pin: true,
            scrub: 1,
            anticipatePin: 1,
            invalidateOnRefresh: true,
        },
    });

    gsap.utils.toArray('.horizontal__frame img').forEach((frame) => {
        gsap.fromTo(
            frame,
            { scale: 1.1 },
            {
                scale: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: section,
                    start: 'top top',
                    end: () => `+=${track.scrollWidth}`,
                    scrub: true,
                },
            },
        );
    });
}
