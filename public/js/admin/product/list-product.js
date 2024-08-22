$(document).ready(function () {
    $("#basic-datatables").DataTable({});

    function showModalForAction(formModal, element, action) {
        const name = element.attr('data-name');
        const routeAction = element.attr('data-route');
        let contentModalBody = lang.delete_form.body + ' ' + name + '?';
        $(formModal).attr('action', routeAction);
        if (action == actions[0]) {
            const isActive = element.attr('data-active');
            contentModalBody = lang.active_form.body.lock + ' ' + name + '?';
            if (!isActive) {
                contentModalBody = lang.active_form.body.unlock + ' ' + name + '?';
            }
        }
        if (action == actions[2]) {
            contentModalBody = lang.reset_password_form.body + ' ' + name + '?';
        }

        formModal.find('.modal-body:first').text(contentModalBody);
    }

    function addEventClickShowModal(classBtns, action = 'delete') {
        $('#basic-datatables').on('click', classBtns, function () {
            showModalForAction(formModal, $(this), action);
        });
    }

    const classDeleteBtns = '.toggle-delete-brand-js';
    const formModal = $('#container-modal form');
    const actions = [
        'active',
        'delete',
        'reset password',
    ];
    addEventClickShowModal(classDeleteBtns);
});