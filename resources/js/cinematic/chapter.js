import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { reducedMotion } from './config';
import { fadeUp, revealLines, clipReveal, parallaxImage, scaleReveal } from './reveal';

export function initChapters() {
    const storyCopy = document.querySelector('.story__copy');

    revealLines(storyCopy);
    fadeUp('.story__after');

    document.querySelectorAll('.timeline li').forEach((item) => {
        ScrollTrigger.create({
            trigger: item,
            start: 'top 68%',
            end: 'bottom 40%',
            onEnter: () => item.classList.add('is-active'),
            onEnterBack: () => item.classList.add('is-active'),
            onLeaveBack: () => item.classList.remove('is-active'),
        });
    });

    fadeUp('.process__intro, .process__list li');

    // Georgia + Arrival film is driven by initHorizontal() as one continuous pin.

    const journey = document.getElementById('journey-line');
    if (journey && !reducedMotion) {
        const grow = journey.querySelector('.journey__grow');
        const glow = journey.querySelector('.journey__glow');
        const steps = [...journey.querySelectorAll('.journey__steps li')];

        ScrollTrigger.create({
            trigger: journey,
            start: 'top 62%',
            end: 'bottom 48%',
            scrub: 0.65,
            onUpdate: (self) => {
                const p = self.progress;
                if (grow) {
                    grow.style.width = `${p * 100}%`;
                }
                if (glow) {
                    glow.style.left = `${p * 100}%`;
                }
                steps.forEach((step, index) => {
                    step.classList.toggle('is-on', p >= index / (steps.length - 0.35));
                });
            },
        });
    }

    document.querySelectorAll('.gallery__shot img, .gallery__full img').forEach((img) => {
        clipReveal(img);
        parallaxImage(img, 28);
    });

    scaleReveal(document.querySelector('.finale__copy'));

    if (!reducedMotion) {
        gsap.fromTo(
            '.finale__visual img',
            { scale: 1.12, opacity: 0.16 },
            {
                scale: 1,
                opacity: 0.42,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#begin',
                    start: 'top 78%',
                    end: 'top 18%',
                    scrub: true,
                },
            },
        );
    }

    fadeUp('.documents__cats li, .trust__pillars li, .services .display');
}
