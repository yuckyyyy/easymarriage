import gsap from 'gsap';
import { isFinePointer, reducedMotion } from './config';

export function initCursor() {
    const cursor = document.getElementById('cursor');

    if (!cursor || !isFinePointer || reducedMotion) {
        return;
    }

    const label = cursor.querySelector('.cursor__label');
    cursor.hidden = false;
    document.body.classList.add('has-cursor');

    const pos = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    const mouse = { ...pos };

    window.addEventListener(
        'mousemove',
        (event) => {
            mouse.x = event.clientX;
            mouse.y = event.clientY;
        },
        { passive: true },
    );

    gsap.ticker.add(() => {
        pos.x += (mouse.x - pos.x) * 0.22;
        pos.y += (mouse.y - pos.y) * 0.22;
        cursor.style.transform = `translate(${pos.x}px, ${pos.y}px)`;
    });

    document.querySelectorAll('[data-cursor], a, button').forEach((el) => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('is-hover');
            if (label) {
                label.textContent = (el.getAttribute('data-cursor') || 'open').toUpperCase();
            }
        });
        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('is-hover');
            if (label) {
                label.textContent = '';
            }
        });
    });
}
