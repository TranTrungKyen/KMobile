$(document).ready(function () {
    $("#basic-datatables").DataTable({});

    function showModalForAction(formModal, element, action) {
        const name = element.attr('data-name');
        const routeAction = element.attr('data-route');
        $(formModal).attr('action', routeAction);
        if (action != "delete") {
            const isActive = element.attr('data-active');
            formModal.find('.modal-body:first').text(lang.active_form.body.lock + ' ' + name + '?');
            if (!isActive) {
                formModal.find('.modal-body:first').text(lang.active_form.body.unlock + ' ' + name + '?');
            }
            return;
        }
        formModal.find('.modal-body:first').text(lang.delete_form.body + ' ' + name + '?');
    }

    function addEventClickShowModal(classBtns, action = 'delete') {
        $('#basic-datatables').on('click', classBtns, function () {
            if (action != "delete") {
                showModalForAction(formModal, $(this), action);
                return;
            }
            showModalForAction(formModal, $(this), action);
        });
    }

    const classActiveBtns = '.toggle-active-user-js';
    const classDeleteBtns = '.toggle-delete-user-js';
    const formModal = $('#container-modal form');
    const actions = [
        'active',
        'delete',
    ];

    addEventClickShowModal(classActiveBtns, actions[0]);
    addEventClickShowModal(classDeleteBtns);
});