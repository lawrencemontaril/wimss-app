document.addEventListener('DOMContentLoaded', function () {
    const likertScales = document.querySelectorAll('.likert-scale');

    likertScales.forEach((likertScale) => {
        const boxes = likertScale.getElementsByClassName('likert-box');
        const hiddenInput = document.getElementById(likertScale.id.replace('-scale', ''));

        // Prefill the form if there is a preselected value
        const preselectedValue = hiddenInput.value;
        if (preselectedValue) {
            for (let box of boxes) {
                if (box.getAttribute('data-value') === preselectedValue) {
                    const selectedClasses = box.getAttribute('data-selected-class').split(' ');
                    removeDefaultBorderClasses(box);
                    box.classList.add(...selectedClasses);
                }
            }
        }

        for (let box of boxes) {
            box.addEventListener('click', function () {
                handleSelection(box, boxes, hiddenInput);
            });

            box.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    handleSelection(box, boxes, hiddenInput);
                }
            });
        }
    });

    function handleSelection(selectedBox, boxes, hiddenInput) {
        clearSelection(boxes);
        const selectedClasses = selectedBox.getAttribute('data-selected-class').split(' ');
        removeDefaultBorderClasses(selectedBox);
        selectedBox.classList.add(...selectedClasses);
        hiddenInput.value = selectedBox.getAttribute('data-value');
    }

    function clearSelection(boxes) {
        for (let box of boxes) {
            const selectedClasses = box.getAttribute('data-selected-class').split(' ');
            box.classList.remove(...selectedClasses);
            resetDefaultBorderClasses(box);
        }
    }

    function removeDefaultBorderClasses(box) {
        const defaultBorderClasses = ['border-zinc-200'];
        box.classList.remove(...defaultBorderClasses);
    }

    function resetDefaultBorderClasses(box) {
        const defaultBorderClasses = ['border-zinc-200'];
        box.classList.add(...defaultBorderClasses);
    }
});
