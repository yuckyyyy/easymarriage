import gsap from 'gsap';
import { EASE, reducedMotion } from './config';
import { inners } from './split';

export function initRing() {
    const hero = document.getElementById('hero');
    const stage = document.getElementById('ring-stage');
    const plate = stage?.querySelector('.hero__plate');

    if (!hero || !stage || !plate) {
        return;
    }

    const copy = hero.querySelector('.hero__copy');
    const titleLines = inners(hero);
    const italic = hero.querySelector('.hero__italic');
    const lede = hero.querySelector('.hero__lede');
    const cta = hero.querySelector('.btn');
    const scrollHint = hero.querySelector('.hero__scroll');
    const lightSweep = stage.querySelector('.hero__light');
    const flare = stage.querySelector('.hero__flare');
    const mobile = window.matchMedia('(max-width: 1080px)').matches;

    if (!reducedMotion) {
        gsap.timeline({ defaults: { ease: EASE.reveal } })
            .fromTo(titleLines, { y: '110%' }, { y: '0%', duration: 1.1, stagger: 0.1 }, 0.08)
            .from(italic, { opacity: 0, y: 14, duration: 0.7 }, 0.46)
            .from([lede, cta], { opacity: 0, y: 16, duration: 0.6, stagger: 0.08 }, 0.68)
            .from(scrollHint, { opacity: 0, duration: 0.5 }, 0.86);
    }

    gsap.set(plate, { scale: 1.12, rotateY: 8, yPercent: 2 });
    gsap.set(stage, { perspective: 1400 });

    if (reducedMotion) {
        gsap.set(plate, { scale: 1.18, rotateY: 0, yPercent: 0 });
        return;
    }

    gsap.timeline({
        defaults: { ease: 'none' },
        scrollTrigger: {
            trigger: hero,
            start: 'top top',
            end: `+=${mobile ? 2200 : 2800}`,
            pin: true,
            scrub: 0.65,
            anticipatePin: 1,
        },
    })
        .to(plate, { scale: 1.34, rotateY: -6, yPercent: 6, xPercent: -3, duration: 1 }, 0)
        .to(copy, { opacity: 0.35, y: -16, duration: 0.14 }, 0.08)
        .to(copy, { opacity: 0, y: -80, duration: 0.18 }, 0.28)
        .to(scrollHint, { opacity: 0, duration: 0.1 }, 0.18)
        .to(lightSweep, { xPercent: 22, opacity: 0.95, duration: 0.28 }, 0.48)
        .to(flare, { opacity: 0.85, x: 140, duration: 0.1 }, 0.72)
        .to(flare, { opacity: 0, x: 260, duration: 0.1 }, 0.86);
}
