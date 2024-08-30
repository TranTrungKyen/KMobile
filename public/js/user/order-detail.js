const formModal = $('#container-modal form');

function showFormStatus(event, action = "PENDING") {
    event.preventDefault();
    const element = event.currentTarget;
    const routeAction = $(element).attr('data-route');
    const name = $(element).data('name');
    
    
    let contentModelHeader = `
            <h3 class="mb-0">Xác nhận đơn hàng</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        `;

    let contentModalBody = lang.order_status_form.body[action] + ' ' + name + '?';

    let textSubmitBtn = 'Xác nhận';
    $('.modal-footer .btn').addClass('btn-primary').text(textSubmitBtn).removeClass('btn-danger');

    if (action == "SHIPPING") {
        contentModelHeader = `
                <h3 class="mb-0">Hoàn thành đơn hàng</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            `;
        textSubmitBtn = 'Hoàn thành';
        $('.modal-footer .btn').addClass('btn-primary').text(textSubmitBtn).removeClass('btn-danger');
    } else if (action == "CANCELED") {
        contentModelHeader = `
                <h3 class="mb-0">Hủy đơn hàng</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            `;
        $('.modal-footer .btn').addClass('btn-danger').text(textSubmitBtn).removeClass('btn-primary');
    }

    $('.modal-header').html(contentModelHeader);
    $(formModal).attr('action', routeAction);
    formModal.find('.modal-body:first').html(contentModalBody);
}