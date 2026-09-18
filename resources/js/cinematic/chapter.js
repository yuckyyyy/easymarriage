import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { reducedMotion } from './config';
import { fadeUp, revealLines, clipReveal, parallaxImage, scaleReveal } from './reveal';

export function initChapters() {
    revealLines(document.querySelector('.story__copy'));
    fadeUp('.story__after');

    document.querySelectorAll('.timeline li').forEach((item) => {
        ScrollTrigger.create({
            trigger: item,
            start: 'top 70%',
            onEnter: () => item.classList.add('is-active'),
            onEnterBack: () => item.classList.add('is-active'),
            onLeaveBack: () => item.classList.remove('is-active'),
        });
    });

    fadeUp('.process__intro, .process__list li');

    const georgia = document.querySelector('.georgia');
    if (georgia && !reducedMotion) {
        const back = georgia.querySelector('.georgia__img--back img');
        const mid = georgia.querySelector('.georgia__img--mid');
        const fore = georgia.querySelector('.georgia__img--fore');

        gsap.timeline({
            scrollTrigger: {
                trigger: georgia,
                start: 'top top',
                end: '+=2200',
                scrub: 1,
                pin: true,
                anticipatePin: 1,
            },
        })
            .to(back, { yPercent: 12, scale: 1.08, ease: 'none' }, 0)
            .to(mid, { opacity: 0.9, yPercent: -6, ease: 'none' }, 0.25)
            .to(fore, { opacity: 0.55, yPercent: -10, ease: 'none' }, 0.55);
    }

    fadeUp('.georgia__copy, .georgia__facts li');

    const journey = document.getElementById('journey-line');
    if (journey && !reducedMotion) {
        const grow = journey.querySelector('.journey__grow');
        const glow = journey.querySelector('.journey__glow');
        const steps = [...journey.querySelectorAll('.journey__steps li')];

        ScrollTrigger.create({
            trigger: journey,
            start: 'top 70%',
            end: 'bottom 40%',
            scrub: true,
            onUpdate: (self) => {
                const p = self.progress;
                if (grow) {
                    grow.style.width = `${p * 100}%`;
                }
                if (glow) {
                    glow.style.left = `${p * 100}%`;
                }
                steps.forEach((step, index) => {
                    step.classList.toggle('is-on', p >= index / (steps.length - 0.4));
                });
            },
        });
    }

    document.querySelectorAll('.gallery__shot img, .gallery__full img').forEach((img) => {
        clipReveal(img);
        parallaxImage(img, 40);
    });

    scaleReveal(document.querySelector('.finale__copy'));

    if (!reducedMotion) {
        gsap.fromTo(
            '.finale__visual img',
            { scale: 1.15, opacity: 0.12 },
            {
                scale: 1,
                opacity: 0.42,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#begin',
                    start: 'top 80%',
                    end: 'top 10%',
                    scrub: 1,
                },
            },
        );
    }

    fadeUp('.documents__cats li, .trust__pillars li, .services .display');
}
