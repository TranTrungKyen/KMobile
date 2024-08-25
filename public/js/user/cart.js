$(document).ready(function() {
    $("#update-cart-form").on('submit', function(e) {
        e.preventDefault(); 

        let form = new FormData(this);
        let actionUrl = $(this).attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    console.log(data.message); 
                    window.location.href = data.redrirectRoute;
                } else {
                    toastr.error(data.message); 
                }
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let messages = xhr.responseJSON.errors;
                    showToastrErrors(messages); 
                }
            }
        });
    });

    function updateQuantity(element) {
        $('#rowId').val($(element).data('rowId'));
        $('#product_detail_id').val($(element).data('productDetailId'));
        $('#qty').val($(element).val());
        $("#update-cart-form").submit(); 
    }

    $('.update-qty-js').on('change', function() {
        updateQuantity(this);
    });

    function deleteItem(element) {
        $('#rowD_Id').val($(element).data('rowId'));
        $("#delete-item-cart-form").submit(); 
    }

    $('.delete-item-js').on('click', function() {
        deleteItem(this);
    });

    $('.clear-items-js').on('click', function() {
        $("#clear-cart-form").submit(); 
    });
});
