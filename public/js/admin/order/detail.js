$(document).ready(function () {
    $("#basic-datatables").DataTable({});

    // this is the id of the form
    $("#comfirm-order-form").submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        let form = new FormData(this);
        let actionUrl = $(this).attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form,
            processData: false,
            contentType: false, 
            success: function (data) {
                if (data.status) {
                    localStorage.setItem('success', data.message);
                    window.location.href = data.redrirectRoute;
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (errors) {
                if (errors.hasOwnProperty("responseJSON") && errors.responseJSON.errors) {
                    let messages = errors.responseJSON.errors;
                    showToastrErrors(messages)
                }
            }
        });

    });
});
const formModal = $('#container-modal form');

function showFormStatus(event, action = "PENDING") {
    event.preventDefault();
    const element = event.currentTarget;
    const routeAction = $(element).attr('data-route');
    const name = $(element).data('name');
    
    
    let contentModelHeader = `
            <h3 class="mb-0">Xác nhận đơn hàng</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        `;

    let contentModalBody = lang.order_status_form.body[action] + ' ' + name + '?';

    let textSubmitBtn = 'Xác nhận';
    $('.modal-footer .btn').addClass('btn-primary').text(textSubmitBtn).removeClass('btn-danger');

    if (action == "SHIPPING") {
        contentModelHeader = `
                <h3 class="mb-0">Hoàn thành đơn hàng</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            `;
        textSubmitBtn = 'Hoàn thành';
        $('.modal-footer .btn').addClass('btn-primary').text(textSubmitBtn).removeClass('btn-danger');
    } else if (action == "CANCELED") {
        contentModelHeader = `
                <h3 class="mb-0">Hủy đơn hàng</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            `;
        $('.modal-footer .btn').addClass('btn-danger').text(textSubmitBtn).removeClass('btn-primary');
    }

    $('.modal-header').html(contentModelHeader);
    $(formModal).attr('action', routeAction);
    formModal.find('.modal-body:first').html(contentModalBody);
}