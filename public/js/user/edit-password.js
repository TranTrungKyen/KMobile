$(document).ready(function () {
    // Ajax Edit user form 
    $("#edit-password-form").submit(function(e) {
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
                    localStorage.setItem('success', data.message);
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
})