$(document).ready(function() {
    // Show toastr not repeat notify
    function showToastrErrors(errors) {
        let displayedErrors = new Set();

        for (let key in errors) {
            if (errors.hasOwnProperty(key)) {
                errors[key].forEach(error => {
                    if (!displayedErrors.has(error)) {
                        toastr.error(error);
                        displayedErrors.add(error);
                    }
                });
            }
        }
    }

    // this is the id of the form
    $("#register-user-form").submit(function (e) {
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
