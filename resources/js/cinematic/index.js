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
import { initSmooth } from './smooth';

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

ScrollTrigger.config({
    ignoreMobileResize: true,
    autoRefreshEvents: 'visibilitychange,DOMContentLoaded,load',
});

export async function bootCinematic() {
    splitLines(document);
    initNav();
    initCursor();
    initForm();
    initFaq();
    initReviews();
    initMagnetic();

    await initLoader();

    initSmooth();

    // Don't block the whole film on hero intro — pin scenes must register immediately
    const ringReady = initRing().catch(() => {});

    initPassport();
    initHorizontal();
    initChapters();
    initProgress();

    await ringReady;

    if (reducedMotion) {
        document.documentElement.classList.add('reduced-motion');
    }

    const refresh = () => ScrollTrigger.refresh();
    requestAnimationFrame(refresh);
    window.addEventListener('load', refresh, { once: true });
    document.fonts?.ready.then(refresh);
    window.setTimeout(refresh, 120);
    window.setTimeout(refresh, 600);
}
