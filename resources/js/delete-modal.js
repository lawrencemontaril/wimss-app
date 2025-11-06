document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('delete-modal');
    const deleteForm = document.getElementById('delete-form');

    document.querySelectorAll('.delete-btn').forEach((button) => {
        button.addEventListener('click', function () {
            let deleteUrl = this.getAttribute('data-url');
            deleteForm.setAttribute('action', deleteUrl);
        });
    });
});
