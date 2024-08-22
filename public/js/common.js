$(document).ready(function () {
    const app = {
        stopEventInputDate: function () {
            const inputDateElements = $('.input-date-js');

            for (const element of inputDateElements) {
                $(element).on('keydown', function (event) {
                    event.preventDefault();
                })
            }
        },

        start: function () {
            this.stopEventInputDate();
            getSuccessMessageInLocalStorage();
        }
    }

    app.start();
});

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

function debounce(func, delay) {
    let timerId;
    return function (...args) {
        clearTimeout(timerId);
        timerId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}

function getSuccessMessageInLocalStorage() {
    let success = localStorage.getItem("success") ?? null;
    
    if(success) {
        toastr.success(success);
        localStorage.removeItem("success");
    }
}
