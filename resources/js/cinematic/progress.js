import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { CHAPTERS, reducedMotion } from './config';

export function initProgress() {
    const bar = document.getElementById('progress-bar');
    const label = document.getElementById('chapter-indicator');

    if (!bar) {
        return;
    }

    ScrollTrigger.create({
        start: 0,
        end: 'max',
        onUpdate: (self) => {
            bar.style.width = `${self.progress * 100}%`;
        },
    });

    if (!label || reducedMotion) {
        return;
    }

    CHAPTERS.forEach((chapter) => {
        const trigger = document.querySelector(chapter.selector);
        if (!trigger) {
            return;
        }

        ScrollTrigger.create({
            trigger,
            start: 'top 45%',
            end: 'bottom 45%',
            onEnter: () => setChapter(label, chapter),
            onEnterBack: () => setChapter(label, chapter),
        });
    });
}

function setChapter(label, chapter) {
    label.innerHTML = `<span>${chapter.id}</span> / 07`;
    label.setAttribute('data-name', chapter.name);
}
