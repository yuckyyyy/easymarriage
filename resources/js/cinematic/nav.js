import { cinematicScrollTo } from './smooth';

function homePath() {
    const path = window.__I18N?.homePath || '/';

    return path.replace(/\/$/, '') || '/';
}

function currentPath() {
    return window.location.pathname.replace(/\/$/, '') || '/';
}

export function initNav() {
    const nav = document.getElementById('site-nav');
    const toggle = nav?.querySelector('.nav__toggle');
    const menu = document.getElementById('mobile-menu');

    if (!nav) {
        return;
    }

    const onScroll = () => {
        nav.classList.toggle('is-scrolled', window.scrollY > 40);
    };

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    const setOpen = (open) => {
        if (!toggle || !menu) {
            return;
        }

        menu.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute(
            'aria-label',
            open ? window.__I18N?.closeMenu || 'Close menu' : window.__I18N?.openMenu || 'Open menu',
        );
        document.body.style.overflow = open ? 'hidden' : '';
        document.body.classList.toggle('menu-open', open);
    };

    if (toggle && menu) {
        menu.hidden = false;
        toggle.addEventListener('click', () => {
            setOpen(!menu.classList.contains('is-open'));
        });

        menu.querySelectorAll('[data-menu-link], [data-open-consult], [data-close-menu]').forEach((link) => {
            link.addEventListener('click', () => setOpen(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && menu.classList.contains('is-open')) {
                setOpen(false);
            }
        });
    }

    document.querySelectorAll('.lang a').forEach((link) => {
        link.addEventListener('click', (event) => {
            const hash = window.location.hash;
            if (!hash) {
                return;
            }
            event.preventDefault();
            window.location.assign(`${link.href.split('#')[0]}${hash}`);
        });
    });

    document.querySelectorAll('a[href*="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (event) => {
            const url = new URL(anchor.getAttribute('href'), window.location.origin);
            const targetPath = url.pathname.replace(/\/$/, '') || '/';
            const home = homePath();
            const current = currentPath();

            if (targetPath !== home && targetPath !== current) {
                return;
            }
            if (current !== home) {
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
            cinematicScrollTo(target);
        });
    });
}
