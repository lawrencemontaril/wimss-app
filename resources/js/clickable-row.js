document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.clickable-row').forEach((row) => {
        row.addEventListener('click', function (event) {
            // Prevent navigation if the click is on a button, link, or inside a form
            if (event.target.closest('a, button, form')) {
                event.stopPropagation();
                return;
            }

            // Navigate to the resource URL set in data-url
            window.location.href = this.dataset.href;
        });
    });
});
