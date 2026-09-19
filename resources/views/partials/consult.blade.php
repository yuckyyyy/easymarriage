<div class="consult" id="consult" hidden>
    <div class="consult__veil" data-close-consult></div>
    <div class="consult__panel" role="dialog" aria-modal="true" aria-labelledby="consult-title">
        <button class="consult__close" type="button" data-close-consult aria-label="{{ __('site.form.close') }}">{{ __('site.form.close') }}</button>

        <form class="consult__form" id="consult-form" action="{{ route('consultation.store') }}" method="post">
            @csrf
            <input type="hidden" name="locale" value="{{ app()->getLocale() }}">
            <p class="chapter-kicker">{{ __('site.form.kicker') }}</p>
            <h2 class="display" id="consult-title">{{ __('site.form.title') }}</h2>
            <p class="lede">{{ __('site.form.lede') }}</p>

            <div class="form-grid">
                <label>
                    <span>{{ __('site.form.name') }}</span>
                    <input type="text" name="name" required autocomplete="name">
                </label>
                <label>
                    <span>{{ __('site.form.partner') }}</span>
                    <input type="text" name="partner_name" autocomplete="name">
                </label>
                <label>
                    <span>{{ __('site.form.email') }}</span>
                    <input type="email" name="email" required autocomplete="email">
                </label>
                <label>
                    <span>{{ __('site.form.phone') }}</span>
                    <input type="tel" name="phone" autocomplete="tel">
                </label>
                <label>
                    <span>{{ __('site.form.nationality') }}</span>
                    <input type="text" name="nationality">
                </label>
                <label>
                    <span>{{ __('site.form.date') }}</span>
                    <input type="date" name="preferred_date">
                </label>
                <label>
                    <span>{{ __('site.form.guests') }}</span>
                    <input type="number" name="guests" min="0" max="500">
                </label>
                <label class="form-span">
                    <span>{{ __('site.form.looking') }}</span>
                    <select name="looking_for" required>
                        <option value="" disabled selected>{{ __('site.form.choose') }}</option>
                        <option value="legal">{{ __('site.form.legal') }}</option>
                        <option value="ceremony">{{ __('site.form.ceremony') }}</option>
                        <option value="full">{{ __('site.form.full') }}</option>
                        <option value="documents">{{ __('site.form.documents') }}</option>
                        <option value="unsure">{{ __('site.form.unsure') }}</option>
                    </select>
                </label>
                <label class="form-span">
                    <span>{{ __('site.form.message') }}</span>
                    <textarea name="message" rows="4"></textarea>
                </label>
            </div>

            <p class="form-error" id="form-error" hidden></p>
            <button class="btn btn--pill" type="submit">{{ __('site.form.submit') }}</button>
        </form>

        <div class="consult__success" id="consult-success" hidden>
            <p class="chapter-kicker">{{ __('site.form.received') }}</p>
            <h2 class="display">{{ __('site.form.got_it') }}</h2>
            <p class="lede">{{ __('site.form.soon') }}</p>
        </div>
    </div>
</div>
