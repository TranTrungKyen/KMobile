$(document).ready(function () {
    $("#show_hide_password a").on('click', (e) => showPassword(e));

    function showPassword (e) {
        e.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    }

    // Update avatar preview
    $('#avatar-file').on('change', function (event) {
        avatarFile = event.target.files[0] || avatarFile;
        const file = avatarFile;   
        const avatarPreviewElement = $('#avatar-preview');

        // Change content label input
        let fileName = $(this).val().split('\\').pop() || "Chọn tệp";
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        
        if (file) {
            // Create a URL for the selected file and set it as the src of the img tag
            let reader = new FileReader();
            reader.onload = function(e) {
                avatarPreviewElement.attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
            let list = new DataTransfer();
            let file1 = file;
            list.items.add(file1);
            let myFileList = list.files;
            $('#avatar-file').prop('files', myFileList);
        }
    });

    // Ajax Edit user form 
    $("#edit-user-form").submit(function(e) {
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