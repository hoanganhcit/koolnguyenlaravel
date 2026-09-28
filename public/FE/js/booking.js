document.addEventListener('DOMContentLoaded', function() {
    const popup = document.querySelector('[data-booking-popup]');
    const form = document.querySelector('[data-booking-form]');
    if (!popup || !form) return;

    const packageInput = form.querySelector('[data-booking-package-input]');
    const packageLabel = popup.querySelector('[data-booking-package-label]');
    const priceLabel = popup.querySelector('[data-booking-price-label]');
    const error = popup.querySelector('[data-booking-error]');
    const success = popup.querySelector('[data-booking-success]');
    const submit = form.querySelector('[data-booking-submit]');
    const dateInput = form.querySelector('input[type="date"]');

    if (dateInput && typeof dateInput.showPicker === 'function') {
        dateInput.addEventListener('click', function() {
            dateInput.showPicker();
        });
    }

    document.querySelectorAll('[data-booking-open]').forEach(function(button) {
        button.addEventListener('click', function() {
            packageInput.value = button.dataset.bookingPackage;
            packageLabel.textContent = button.dataset.bookingPackage;
            priceLabel.textContent = button.dataset.bookingPrice;
            error.hidden = true;
            success.hidden = true;
            popup.classList.add('show-popup');
            popup.setAttribute('aria-hidden', 'false');
            document.body.classList.add('hideScroll');
            form.querySelector('[name="name"]').focus();
        });
    });

    function closePopup() {
        popup.classList.remove('show-popup');
        popup.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('hideScroll');
    }

    popup.querySelector('[data-booking-close]').addEventListener('click', closePopup);

    popup.addEventListener('click', function(event) {
        if (event.target === popup) closePopup();
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && popup.classList.contains('show-popup')) closePopup();
    });

    form.addEventListener('submit', async function(event) {
        event.preventDefault();
        error.hidden = true;
        success.hidden = true;
        submit.disabled = true;

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: { 'Accept': 'application/json' }
            });
            const payload = await response.json();

            if (!response.ok) {
                const messages = payload.errors
                    ? Object.values(payload.errors).flat()
                    : [payload.message || 'Unable to submit the booking request.'];
                throw new Error(messages[0]);
            }

            form.reset();
            packageInput.value = packageLabel.textContent;
            success.textContent = payload.message;
            success.hidden = false;
        } catch (exception) {
            error.textContent = exception.message;
            error.hidden = false;
        } finally {
            submit.disabled = false;
        }
    });
});
