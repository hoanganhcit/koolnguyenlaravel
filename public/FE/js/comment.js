document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('[data-comment-form]');
    if (!form) return;

    const list = document.querySelector('[data-comments-list]');
    const count = document.querySelector('[data-comment-count]');
    const error = document.querySelector('[data-comment-error]');
    const success = document.querySelector('[data-comment-success]');
    const submit = form.querySelector('[data-comment-submit]');

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
                    : [payload.message || 'Unable to post the comment.'];
                throw new Error(messages[0]);
            }

            const empty = list.querySelector('[data-comments-empty]');
            if (empty) empty.remove();
            list.insertAdjacentHTML('afterbegin', commentMarkup(payload.comment));
            count.textContent = Number(count.textContent) + 1;
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

    function commentMarkup(comment) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = `
            <div class="media">
                <div class="float-left col-avatar">
                    <img class="media-object" src="${comment.avatar}" alt="">
                </div>
                <div class="media-body">
                    <header class="media-header">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><h4 class="media-heading"></h4></li>
                            <li class="list-inline-item"><span class="data-comment">/ ${comment.date}</span></li>
                        </ul>
                    </header>
                    <p class="comment-content"></p>
                </div>
            </div>`;
        wrapper.querySelector('.media-heading').textContent = comment.name;
        wrapper.querySelector('.comment-content').textContent = comment.content;
        return wrapper.firstElementChild.outerHTML;
    }
});
