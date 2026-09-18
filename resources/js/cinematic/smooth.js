import Lenis from 'lenis';
import 'lenis/dist/lenis.css';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { reducedMotion } from './config';

export let lenis = null;

export function initSmooth() {
    if (reducedMotion) {
        return;
    }

    lenis = new Lenis({
        duration: 1.05,
        smoothWheel: true,
        wheelMultiplier: 0.88,
        touchMultiplier: 1.1,
    });

    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);
}

export function cinematicScrollTo(target) {
    if (lenis) {
        lenis.scrollTo(target, { offset: 0, duration: 1.2 });
        return;
    }

    gsap.to(window, {
        duration: 1.15,
        scrollTo: { y: target, offsetY: 0 },
        ease: 'power2.inOut',
        overwrite: 'auto',
    });
}
