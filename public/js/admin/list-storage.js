$(document).ready(function () {
    $("#basic-datatables").DataTable({});

    const classDeleteBtns = '.toggle-delete-js';
    const classUpdateBtns = '.toggle-update-js';
    const classAddColorBtn = '.toggle-add-js';
    const formModal = $('#container-modal form');

    function addEventClickShowModal(classBtns, action = 'delete') {
        $('#basic-datatables').on('click', classBtns, function () {
            const routeAction = $(this).attr('data-route');
            const name = $(this).data('name');
                
            let contentModelHeader = `
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            `;
            
            let contentModalBody = lang.delete_form.body + ' ' + name;
    
            let textSubmitBtn = 'Chắc chắn';
            $('.modal-footer .btn').addClass('btn-danger').text(textSubmitBtn).removeClass('btn-primary');

            if( action != 'delete' ) {
                contentModelHeader = `
                    <h3 class="mb-0">Chỉnh sửa</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                contentModalBody = `
                    <input type="text" class="form-control" id="name" placeholder="Nhập phiên bản dung lượng" value="${name}" name="storage">
                `;
                textSubmitBtn = 'Cập nhật';
                $('.modal-footer .btn').addClass('btn-primary').text(textSubmitBtn).removeClass('btn-danger');
            }

            $('.modal-header').html(contentModelHeader);
            $(formModal).attr('action', routeAction);
            formModal.find('.modal-body:first').html(contentModalBody);
        });
    }
    addEventClickShowModal(classDeleteBtns);
    addEventClickShowModal(classUpdateBtns, 'update');
    
    $(classAddColorBtn).on('click', function () {
        const routeAction = $(this).attr('data-route');
        let contentModelHeader = `
            <h3 class="mb-0">Thêm mới</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        `;
        $('.modal-header').html(contentModelHeader);
        $(formModal).attr('action', routeAction);
        let contentModalBody = `
            <input type="text" class="form-control" id="name" placeholder="Nhập phiên bản dung lượng" name="storage">
        `;
        formModal.find('.modal-body:first').html(contentModalBody);
        $('.modal-footer .btn').removeClass('btn-danger').addClass('btn-primary').text('Thêm');
    })

    // this is the id of the form
    $("#form-post").submit(function (e) {
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