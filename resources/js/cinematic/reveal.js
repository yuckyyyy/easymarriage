import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { EASE, reducedMotion } from './config';
import { inners } from './split';

export function fadeUp(targets, vars = {}) {
    const els = gsap.utils.toArray(targets);

    if (!els.length) {
        return;
    }

    if (reducedMotion) {
        gsap.set(els, { clearProps: 'all', opacity: 1, y: 0 });
        return;
    }

    const { trigger, ...rest } = vars;

    gsap.fromTo(
        els,
        { y: 32, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.85,
            ease: EASE.reveal,
            stagger: 0.07,
            overwrite: 'auto',
            scrollTrigger: {
                trigger: trigger || els[0],
                start: 'top 76%',
                toggleActions: 'play none none none',
                once: true,
            },
            ...rest,
        },
    );
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
            duration: 1,
            ease: EASE.reveal,
            stagger: 0.1,
            overwrite: 'auto',
            scrollTrigger: {
                trigger: container,
                start: 'top 72%',
                toggleActions: 'play none none none',
                once: true,
            },
        },
    );
}

export function clipReveal(targets) {
    const els = gsap.utils.toArray(targets);

    if (!els.length) {
        return;
    }

    if (reducedMotion) {
        gsap.set(els, { clipPath: 'inset(0% 0% 0% 0%)', scale: 1 });
        return;
    }

    els.forEach((el) => {
        gsap.fromTo(
            el,
            { clipPath: 'inset(12% 8% 12% 8%)', scale: 1.06 },
            {
                clipPath: 'inset(0% 0% 0% 0%)',
                scale: 1,
                ease: EASE.film,
                scrollTrigger: {
                    trigger: el,
                    start: 'top 88%',
                    end: 'top 36%',
                    scrub: true,
                },
            },
        );
    });
}

export function parallaxImage(img, amount = 48) {
    if (reducedMotion || !img) {
        return;
    }

    gsap.fromTo(
        img,
        { y: -amount * 0.25 },
        {
            y: amount * 0.55,
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
        { scale: 0.94, opacity: 0.45 },
        {
            scale: 1,
            opacity: 1,
            ease: EASE.film,
            scrollTrigger: {
                trigger: el,
                start: 'top 82%',
                end: 'top 42%',
                scrub: true,
            },
        },
    );
}

export { ScrollTrigger, gsap };
