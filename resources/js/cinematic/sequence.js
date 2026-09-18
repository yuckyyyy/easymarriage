function loadImage(src) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.decoding = 'async';
        img.onload = () => resolve(img);
        img.onerror = () => reject(new Error(`Failed to load ${src}`));
        img.src = src;
    });
}

function coverDraw(ctx, img, width, height) {
    const iw = img.naturalWidth || img.width;
    const ih = img.naturalHeight || img.height;
    const scale = Math.max(width / iw, height / ih);
    const dw = iw * scale;
    const dh = ih * scale;
    const dx = (width - dw) / 2;
    const dy = (height - dh) / 2;
    ctx.drawImage(img, dx, dy, dw, dh);
}

export class RingSequenceController {
    constructor({ canvas, frames = [] }) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d', { alpha: false });
        this.frameUrls = frames;
        this.images = [];
        this.progress = 0;
        this.dpr = 1;
        this.width = 0;
        this.height = 0;
        this.ready = false;
        this.visible = true;
    }

    async preload() {
        const loaded = await Promise.allSettled(this.frameUrls.map(loadImage));
        this.images = loaded.filter((item) => item.status === 'fulfilled').map((item) => item.value);
        this.ready = this.images.length > 1;
        this.resize();
        return this.ready;
    }

    resize() {
        if (!this.canvas) {
            return;
        }

        const rect = this.canvas.getBoundingClientRect();
        this.width = Math.max(1, Math.round(rect.width));
        this.height = Math.max(1, Math.round(rect.height));
        this.dpr = Math.min(window.devicePixelRatio || 1, 2);
        this.canvas.width = this.width * this.dpr;
        this.canvas.height = this.height * this.dpr;
        this.ctx.setTransform(this.dpr, 0, 0, this.dpr, 0, 0);
        this.draw();
    }

    setProgress(progress) {
        this.progress = Math.max(0, Math.min(1, progress));
        if (this.visible) {
            this.draw();
        }
    }

    draw() {
        if (!this.ready || !this.ctx) {
            return;
        }

        const frames = this.images;
        const last = frames.length - 1;
        const f = this.progress * last;
        const index = Math.min(last, Math.floor(f));
        const next = Math.min(last, index + 1);
        const mix = f - index;

        this.ctx.fillStyle = '#070605';
        this.ctx.fillRect(0, 0, this.width, this.height);
        this.ctx.globalAlpha = 1;
        coverDraw(this.ctx, frames[index], this.width, this.height);

        if (mix > 0.01 && next !== index) {
            this.ctx.globalAlpha = mix;
            coverDraw(this.ctx, frames[next], this.width, this.height);
            this.ctx.globalAlpha = 1;
        }
    }
}
