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
        }
    }
    
    app.start();
});