
$(document).ready(function () {
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	// this is the id of the form
	$("#login-form").submit(function (e) {
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
