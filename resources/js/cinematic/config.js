export const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export const isFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

export const EASE = {
    cinematic: 'power2.inOut',
    reveal: 'power3.out',
    soft: 'power1.out',
    film: 'none',
};

export const PIN = {
    pin: true,
    pinSpacing: true,
    anticipatePin: 1,
    invalidateOnRefresh: true,
    scrub: 0.7,
    fastScrollEnd: false,
};

export const CHAPTERS = [
    { id: '01', name: 'The Promise', selector: '#hero' },
    { id: '02', name: 'The Paperwork', selector: '#about' },
    { id: '03', name: 'Georgia', selector: '#georgia-journey' },
    { id: '04', name: 'The Journey', selector: '#georgia-journey' },
    { id: '05', name: 'The Signature', selector: '#services' },
    { id: '06', name: 'Your Story', selector: '#reviews' },
    { id: '07', name: 'Begin', selector: '#begin' },
];
