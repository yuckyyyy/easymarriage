<div class="consult" id="consult" hidden>
    <div class="consult__veil" data-close-consult></div>
    <div class="consult__panel" role="dialog" aria-modal="true" aria-labelledby="consult-title">
        <button class="consult__close" type="button" data-close-consult aria-label="Close">Close</button>

        <form class="consult__form" id="consult-form" action="{{ route('consultation.store') }}" method="post">
            @csrf
            <p class="chapter-kicker">Consultation</p>
            <h2 class="display" id="consult-title">Tell us your plans.</h2>
            <p class="lede">A few details are enough. We’ll reply with a clear next step.</p>

            <div class="form-grid">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" required autocomplete="name">
                </label>
                <label>
                    <span>Partner’s name</span>
                    <input type="text" name="partner_name" autocomplete="name">
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required autocomplete="email">
                </label>
                <label>
                    <span>Phone / WhatsApp</span>
                    <input type="tel" name="phone" autocomplete="tel">
                </label>
                <label>
                    <span>Nationality</span>
                    <input type="text" name="nationality">
                </label>
                <label>
                    <span>Preferred marriage date</span>
                    <input type="date" name="preferred_date">
                </label>
                <label>
                    <span>Number of guests</span>
                    <input type="number" name="guests" min="0" max="500">
                </label>
                <label class="form-span">
                    <span>What are you looking for?</span>
                    <select name="looking_for" required>
                        <option value="" disabled selected>Please choose</option>
                        <option value="legal">Legal marriage only</option>
                        <option value="ceremony">Marriage + ceremony</option>
                        <option value="full">Full wedding</option>
                        <option value="documents">Documents only</option>
                        <option value="unsure">Not sure yet</option>
                    </select>
                </label>
                <label class="form-span">
                    <span>Message</span>
                    <textarea name="message" rows="4"></textarea>
                </label>
            </div>

            <p class="form-error" id="form-error" hidden></p>
            <button class="btn btn--pill" type="submit">Send request</button>
        </form>

        <div class="consult__success" id="consult-success" hidden>
            <p class="chapter-kicker">Received</p>
            <h2 class="display">We’ve got it.</h2>
            <p class="lede">We’ll be in touch shortly.</p>
        </div>
    </div>
</div>
