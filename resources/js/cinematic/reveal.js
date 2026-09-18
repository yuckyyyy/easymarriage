import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { EASE, reducedMotion } from './config';
import { inners } from './split';

export function fadeUp(targets, vars = {}) {
    if (reducedMotion) {
        gsap.set(targets, { clearProps: 'all', opacity: 1, y: 0 });
        return;
    }

    gsap.from(targets, {
        y: 48,
        opacity: 0,
        duration: 1.2,
        ease: EASE.reveal,
        stagger: 0.08,
        scrollTrigger: {
            trigger: vars.trigger || targets,
            start: 'top 82%',
        },
        ...vars,
    });
}

export function revealLines(container) {
    const lines = inners(container);

    if (!lines.length) {
        return;
    }

    if (reducedMotion) {
        gsap.set(lines, { y: 0 });
        return;
    }

    gsap.fromTo(
        lines,
        { y: '110%' },
        {
            y: '0%',
            duration: 1.15,
            ease: EASE.reveal,
            stagger: 0.12,
            scrollTrigger: {
                trigger: container,
                start: 'top 78%',
            },
        },
    );
}

export function clipReveal(targets) {
    if (reducedMotion) {
        gsap.set(targets, { clipPath: 'inset(0% 0% 0% 0%)', scale: 1 });
        return;
    }

    gsap.fromTo(
        targets,
        { clipPath: 'inset(18% 12% 18% 12%)', scale: 1.08, filter: 'blur(8px)' },
        {
            clipPath: 'inset(0% 0% 0% 0%)',
            scale: 1,
            filter: 'blur(0px)',
            ease: EASE.film,
            scrollTrigger: {
                trigger: targets,
                start: 'top 90%',
                end: 'top 30%',
                scrub: 1,
            },
        },
    );
}

export function parallaxImage(img, amount = 80) {
    if (reducedMotion || !img) {
        return;
    }

    gsap.fromTo(
        img,
        { y: -amount * 0.3 },
        {
            y: amount,
            ease: EASE.film,
            scrollTrigger: {
                trigger: img.parentElement,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
        },
    );
}

export function textScrub(el, vars = {}) {
    if (reducedMotion || !el) {
        return;
    }

    gsap.to(el, {
        y: vars.y ?? -80,
        opacity: vars.opacity ?? 0.15,
        ease: EASE.film,
        scrollTrigger: {
            trigger: vars.trigger || el,
            start: 'top top',
            end: 'bottom top',
            scrub: true,
        },
    });
}

export function scaleReveal(el) {
    if (reducedMotion || !el) {
        return;
    }

    gsap.fromTo(
        el,
        { scale: 0.92, opacity: 0.4 },
        {
            scale: 1,
            opacity: 1,
            ease: EASE.film,
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                end: 'top 40%',
                scrub: 1,
            },
        },
    );
}

export { ScrollTrigger, gsap };
