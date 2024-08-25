$(document).ready(function () {
    const inputDateElements = $('.input-date-js');
    const stopPreventDefaultOnKeydownElements = $('.stop-prevent-default-js--keydown');
    const stopPreventDefaultElements = $('.stop-prevent-default-js--click');

    const app = {
        autoTrimInputsJs: function () {
            $('.auto-trim-js').on('input change', function () {
                let autoTrimInputs= document.querySelectorAll('.auto-trim-js');
                autoTrimInputs.forEach(function(input) {
                    input.addEventListener('blur', function() {
                        this.value = this.value.trim();
                    });
                });
            });
        },

        noTextInputsJs: function () {
            $('.no-text-js').on('input change', function () {
                let noTextInputs = document.querySelectorAll('.no-text-js');
                noTextInputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/\D/g, '');
                    });
                });
            });
        },

        stopPreventDefaultOnKeyDown: function (elements) {
            for (const element of elements) {
                $(element).on('keydown', function (event) {
                    event.preventDefault();
                })
            }
        },

        stopPreventDefaultOnClick: function (elements) {
            for (const element of elements) {
                $(element).on('click', function (event) {
                    event.preventDefault();
                })
            }
        },

        start: function () {
            this.stopPreventDefaultOnKeyDown(inputDateElements);
            this.stopPreventDefaultOnKeyDown(stopPreventDefaultOnKeydownElements);
            this.stopPreventDefaultOnClick(stopPreventDefaultElements);
            formatAllPriceViElement();
            getSuccessMessageInLocalStorage();
            
        }
    }

    app.start();
});

function formatAllPriceViElement () {
    const priceViElements = $('.price-js--vi');
    priceViElements.each(function () {
        let amount = $(this).data('amount');
        let formattedAmount = formatCurrencyVND(amount);
        $(this).text(formattedAmount);
    });
}

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

function formatCurrencyVND(number) {
    if (isNaN(number)) {
        return '';
    }
    return number.toLocaleString('vi-VN', { 
        style: 'currency', 
        currency: lang.common.currency_unit,
     });
}
