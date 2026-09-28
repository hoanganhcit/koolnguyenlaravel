document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('[data-like-post]');
    if (!button) return;

    const count = button.querySelector('[data-like-count]');

    button.addEventListener('click', async function(event) {
        event.preventDefault();
        if (button.disabled) return;

        button.classList.add('is-loading');
        button.setAttribute('aria-busy', 'true');

        try {
            const response = await fetch(button.dataset.likeUrl, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': button.dataset.csrfToken
                }
            });
            const payload = await response.json();

            if (!response.ok) {
                throw new Error(payload.message || 'Không thể thích bài viết.');
            }

            count.textContent = payload.likes_count;
            button.classList.add('is-liked');
            button.setAttribute('aria-pressed', 'true');
            button.setAttribute('title', 'Bạn đã thích bài viết này');
            button.disabled = true;
        } catch (error) {
            button.setAttribute('title', error.message);
        } finally {
            button.classList.remove('is-loading');
            button.removeAttribute('aria-busy');
        }
    });
});
