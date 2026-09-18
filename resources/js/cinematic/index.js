import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';
import { reducedMotion } from './config';
import { splitLines } from './split';
import { initLoader } from './loader';
import { initCursor } from './cursor';
import { initNav } from './nav';
import { initProgress } from './progress';
import { initRing } from './ring';
import { initPassport } from './passport';
import { initHorizontal } from './horizontal';
import { initChapters } from './chapter';
import { initReviews, initFaq, initForm, initMagnetic } from './ui';

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

export async function bootCinematic() {
    splitLines(document);
    initNav();
    initCursor();
    initForm();
    initFaq();
    initReviews();
    initMagnetic();

    await initLoader();

    initRing();
    initPassport();
    initHorizontal();
    initChapters();
    initProgress();

    if (reducedMotion) {
        document.documentElement.classList.add('reduced-motion');
    }

    ScrollTrigger.refresh();
}
