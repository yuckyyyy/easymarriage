import gsap from 'gsap';
import { EASE, reducedMotion } from './config';

export function initPassport() {
    const pin = document.getElementById('passport-pin');

    if (!pin) {
        return;
    }

    const desk = pin.querySelector('.pdesk img');
    const book = pin.querySelector('.pbook');
    const cover = pin.querySelector('.pbook__cover');
    const fly = pin.querySelector('.pbook__fly');
    const doc = pin.querySelector('.pdoc');
    const pen = pin.querySelector('.ppen');
    const signature = pin.querySelector('#signature-path');
    const stamp = pin.querySelector('.pstamp');
    const words = pin.querySelectorAll('.pass-scene__word');
    const shadow = pin.querySelector('.pbook__shadow');

    if (signature) {
        const length = signature.getTotalLength();
        signature.style.strokeDasharray = `${length}`;
        signature.style.strokeDashoffset = `${length}`;
    }

    gsap.set(book, { transformPerspective: 1600, transformStyle: 'preserve-3d', force3D: true });
    gsap.set(cover, {
        transformPerspective: 1800,
        transformOrigin: 'left center',
        transformStyle: 'preserve-3d',
        force3D: true,
    });
    gsap.set(fly, {
        transformPerspective: 1800,
        transformOrigin: 'left center',
        transformStyle: 'preserve-3d',
        force3D: true,
    });

    if (reducedMotion) {
        gsap.set(cover, { rotateY: -158 });
        gsap.set(fly, { rotateY: -150 });
        gsap.set([doc, stamp, words], { opacity: 1, x: 0, y: 0, rotate: 0, scale: 1 });
        gsap.set(pen, { opacity: 0 });
        gsap.set(signature, { strokeDashoffset: 0 });
        return;
    }

    gsap.set(cover, { rotateY: 0 });
    gsap.set(fly, { rotateY: 0 });
    gsap.set(book, { rotateX: 14, rotateY: 18, rotateZ: -8, xPercent: 4, yPercent: 4, scale: 0.94 });
    gsap.set(desk, { scale: 1.06 });
    gsap.set(doc, { opacity: 1 });
    gsap.set(pen, { xPercent: 8, yPercent: -18, opacity: 0, rotate: -28, scale: 0.94 });
    gsap.set(stamp, { scale: 1.6, opacity: 0, rotate: -22 });
    gsap.set(words, { opacity: 0, y: 28 });
    gsap.set(shadow, { scaleX: 0.7, opacity: 0.2 });

    const mobile = window.matchMedia('(max-width: 1080px)').matches;

    const tl = gsap.timeline({
        defaults: { ease: EASE.cinematic },
        scrollTrigger: {
            trigger: pin,
            start: 'top top',
            end: `+=${mobile ? 3400 : 4400}`,
            pin: true,
            scrub: 0.7,
            anticipatePin: 1,
            invalidateOnRefresh: true,
        },
    });

    tl.to(desk, { scale: 1, duration: 0.1 }, 0)
        .to(book, { rotateX: 8, rotateY: 6, rotateZ: -2, xPercent: 0, yPercent: 0, scale: 1, duration: 0.12 }, 0)
        .to(shadow, { scaleX: 1, opacity: 0.4, duration: 0.12 }, 0)
        .to(cover, { rotateY: -158, duration: 0.3 }, 0.1)
        .to(book, { rotateY: 0, rotateZ: 0, duration: 0.3 }, 0.1)
        .to(shadow, { scaleX: 1.55, xPercent: -28, opacity: 0.48, duration: 0.3 }, 0.1)
        .to(fly, { rotateY: -24, duration: 0.08 }, 0.4)
        .to(fly, { rotateY: -162, duration: 0.16 }, 0.48)
        .to(pen, { xPercent: -6, yPercent: 22, opacity: 1, rotate: -14, scale: 1, duration: 0.08 }, 0.64)
        .to(pen, { x: 70, y: 28, rotate: -6, duration: 0.2, ease: 'none' }, 0.7)
        .to(signature, { strokeDashoffset: 0, duration: 0.2, ease: 'none' }, 0.7)
        .to(pen, { xPercent: 10, yPercent: 10, opacity: 0, duration: 0.08 }, 0.88)
        .to(stamp, { opacity: 1, scale: 1, rotate: -11, duration: 0.08 }, 0.88);

    words.forEach((word, index) => {
        tl.to(word, { opacity: 1, y: 0, duration: 0.05 }, 0.94 + index * 0.02);
    });
}
