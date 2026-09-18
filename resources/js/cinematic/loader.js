import gsap from 'gsap';
import { EASE, reducedMotion } from './config';

export function initLoader() {
    const loader = document.getElementById('loader');

    const finish = () => {
        document.body.style.overflow = '';
        if (loader) {
            loader.classList.add('is-done');
            gsap.set(loader, { autoAlpha: 0 });
        }
        document.documentElement.classList.add('is-ready');
    };

    if (!loader) {
        finish();
        return Promise.resolve();
    }

    const brand = loader.querySelector('.loader__brand');
    const place = loader.querySelector('.loader__place');
    const line = loader.querySelector('.loader__line');
    const copy = loader.querySelector('.loader__line-copy');

    if (reducedMotion) {
        finish();
        return Promise.resolve();
    }

    document.body.style.overflow = 'hidden';

    const tl = gsap.timeline();

    tl.set(loader, { clipPath: 'inset(0% 0% 0% 0%)' })
        .set([brand, place, copy], { opacity: 0, letterSpacing: '0.8em', y: 12 })
        .to(brand, { opacity: 1, letterSpacing: '0.42em', y: 0, duration: 0.45, ease: EASE.reveal })
        .to(place, { opacity: 1, letterSpacing: '0.5em', y: 0, duration: 0.4, ease: EASE.reveal }, '-=0.15')
        .to(line, { width: 72, duration: 0.35, ease: EASE.cinematic })
        .to(copy, { opacity: 1, letterSpacing: '0.12em', y: 0, duration: 0.35 }, '-=0.1')
        .to(loader, {
            clipPath: 'inset(0 0 100% 0)',
            duration: 0.7,
            ease: EASE.cinematic,
            delay: 0.2,
        });

    return Promise.race([
        new Promise((resolve) => {
            tl.eventCallback('onComplete', resolve);
        }),
        new Promise((resolve) => {
            window.setTimeout(resolve, 3200);
        }),
    ]).then(finish);
}
