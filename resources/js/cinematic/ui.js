import gsap from 'gsap';

export function initReviews() {
    const quote = document.getElementById('review-quote');
    const name = document.getElementById('review-name');
    const image = document.getElementById('review-image');
    const buttons = document.querySelectorAll('.reviews__thumbs button');

    if (!quote || !buttons.length) {
        return;
    }

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const payload = JSON.parse(button.dataset.review || '{}');
            buttons.forEach((item) => item.setAttribute('aria-selected', 'false'));
            button.setAttribute('aria-selected', 'true');

            const tl = gsap.timeline();
            tl.to([quote, name, image], { opacity: 0, duration: 0.28, ease: 'power1.out' })
                .add(() => {
                    quote.textContent = payload.quote || quote.textContent;
                    if (name) {
                        name.textContent = payload.name || name.textContent;
                    }
                    if (image && payload.image) {
                        image.src = payload.image;
                        image.alt = payload.alt || '';
                    }
                })
                .to([quote, name, image], { opacity: 1, duration: 0.55, ease: 'power2.out' });
        });
    });
}

export function initFaq() {
    document.querySelectorAll('.faq__item').forEach((item) => {
        const button = item.querySelector('button');
        const body = item.querySelector('.faq__body');
        if (!button || !body) {
            return;
        }

        button.addEventListener('click', () => {
            const open = item.classList.toggle('is-open');
            button.setAttribute('aria-expanded', String(open));
            if (open) {
                gsap.fromTo(body, { opacity: 0, y: 8 }, { opacity: 1, y: 0, duration: 0.35 });
            }
        });
    });
}

export function initForm() {
    const root = document.getElementById('consult');
    const form = document.getElementById('consult-form');
    const success = document.getElementById('consult-success');
    const error = document.getElementById('form-error');

    if (!root || !form) {
        return;
    }

    const openers = document.querySelectorAll('[data-open-consult]');
    const closers = document.querySelectorAll('[data-close-consult]');

    const open = () => {
        root.hidden = false;
        document.body.style.overflow = 'hidden';
        gsap.fromTo(root, { opacity: 0 }, { opacity: 1, duration: 0.35 });
        form.querySelector('input')?.focus();
    };

    const close = () => {
        gsap.to(root, {
            opacity: 0,
            duration: 0.25,
            onComplete: () => {
                root.hidden = true;
                document.body.style.overflow = '';
            },
        });
    };

    openers.forEach((el) => el.addEventListener('click', open));
    closers.forEach((el) => el.addEventListener('click', close));

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !root.hidden) {
            close();
        }
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        error.hidden = true;

        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const formData = new FormData(form);

        try {
            const response = await window.axios.post(form.action, formData, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    Accept: 'application/json',
                },
            });

            if (response.data?.ok) {
                gsap.to(form, {
                    opacity: 0,
                    duration: 0.4,
                    onComplete: () => {
                        form.hidden = true;
                        success.hidden = false;
                        gsap.fromTo(success, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.6 });
                    },
                });
            }
        } catch (err) {
            const messages = err.response?.data?.errors;
            error.textContent = messages
                ? Object.values(messages).flat().join(' ')
                : window.__I18N?.formError || 'Something went wrong. Please try again.';
            error.hidden = false;
        }
    });
}

export function initMagnetic() {
    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        return;
    }

    document.querySelectorAll('.btn--pill').forEach((btn) => {
        btn.addEventListener('mousemove', (event) => {
            const rect = btn.getBoundingClientRect();
            const x = event.clientX - rect.left - rect.width / 2;
            const y = event.clientY - rect.top - rect.height / 2;
            gsap.to(btn, { x: x * 0.18, y: y * 0.18, duration: 0.35, ease: 'power3.out' });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'power3.out' });
        });
    });
}
