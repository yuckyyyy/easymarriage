export function splitLines(root = document) {
    root.querySelectorAll('.split-line').forEach((line) => {
        if (line.dataset.split === 'true') {
            return;
        }

        const text = line.textContent ?? '';
        line.textContent = '';
        const inner = document.createElement('span');
        inner.className = 'split-line__inner';
        inner.textContent = text;
        inner.style.display = 'block';
        inner.style.transform = 'translateY(110%)';
        line.appendChild(inner);
        line.dataset.split = 'true';
    });
}

export function inners(el) {
    return el.querySelectorAll('.split-line__inner');
}
