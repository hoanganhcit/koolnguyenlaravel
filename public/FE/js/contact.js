document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('[data-contact-form]');
    if (!form) return;

    const error = form.querySelector('[data-contact-error]');
    const success = form.querySelector('[data-contact-success]');
    const submit = form.querySelector('[type="submit"]');

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
                    : [payload.message || 'Unable to send the message.'];
                throw new Error(messages[0]);
            }

            form.reset();
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
