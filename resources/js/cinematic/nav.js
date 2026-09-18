import gsap from 'gsap';

export function initNav() {
    const nav = document.getElementById('site-nav');
    const toggle = nav?.querySelector('.nav__toggle');
    const menu = document.getElementById('mobile-menu');
    const langBtn = document.querySelector('.lang__btn');

    if (!nav) {
        return;
    }

    const onScroll = () => {
        nav.classList.toggle('is-scrolled', window.scrollY > 40);
    };

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    if (toggle && menu) {
        menu.hidden = false;
        toggle.addEventListener('click', () => {
            const open = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
            document.body.style.overflow = open ? 'hidden' : '';
        });

        menu.querySelectorAll('[data-menu-link], [data-open-consult]').forEach((link) => {
            link.addEventListener('click', () => {
                menu.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });
    }

    langBtn?.addEventListener('click', () => {
        const expanded = langBtn.getAttribute('aria-expanded') === 'true';
        langBtn.setAttribute('aria-expanded', String(!expanded));
    });

    document.querySelectorAll('a[href*="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (event) => {
            const url = new URL(anchor.getAttribute('href'), window.location.origin);
            if (url.pathname !== '/' && url.pathname !== window.location.pathname) {
                return;
            }
            if (window.location.pathname !== '/' && window.location.pathname !== '') {
                return;
            }
            const id = url.hash;
            if (!id) {
                return;
            }
            const target = document.querySelector(id);
            if (!target) {
                return;
            }
            event.preventDefault();
            gsap.to(window, {
                duration: 1.15,
                scrollTo: { y: target, offsetY: 0 },
                ease: 'power2.inOut',
                overwrite: 'auto',
            });
        });
    });
}
