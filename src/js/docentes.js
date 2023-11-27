document.addEventListener('DOMContentLoaded', function () {
    const docentes = document.querySelectorAll('.docente');
    docentes.forEach(docente => {
        docente.addEventListener('click', () => {
            const modalId = docente.dataset.modalTarget;
            openModal(modalId);
        });
    });

    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                closeModal(modal.id);
            }
        });
    });

    const closeButtons = document.querySelectorAll('[data-modal-close]');
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.dataset.modalClose;
            closeModal(modalId);
        });
    });
});

function openModal(id) {
    const modal = document.getElementById(id);
    modal.style.display = 'block';
}

function closeModal(id) {
    const modal = document.getElementById(id);
    modal.style.display = 'none';
}
