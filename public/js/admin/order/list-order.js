$(document).ready(function () {
    $("#basic-datatables-1").DataTable({});

    $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
        let target = $(e.target).attr("href");

        if (target === '#line-shipping') {
            if (!$.fn.DataTable.isDataTable('#basic-datatables-2')) {
                $('#basic-datatables-2').DataTable();
            }
        } else if (target === '#line-completed') {
            if (!$.fn.DataTable.isDataTable('#basic-datatables-3')) {
                $('#basic-datatables-3').DataTable();
            }
        } else if (target === '#line-canceled') {
            if (!$.fn.DataTable.isDataTable('#basic-datatables-4')) {
                $('#basic-datatables-4').DataTable();
            }
        }
    });
});

const formModal = $('#container-modal form');

function showFormStatus(event, action = "PENDING") {
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