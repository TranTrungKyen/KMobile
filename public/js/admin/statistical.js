let revenueChart = null;

document.addEventListener('DOMContentLoaded', function() {
    let ctx = document.getElementById('revenue-chart-three-months').getContext('2d');
    revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: lablesThreeMonths,
            datasets: [{
                label: 'Doanh thu (VND)',
                data: dataThreeMonths,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        callback: function(value) {
                            if (typeof value === 'string') {
                                let parts = value.split("-");
                                return parts[1] + '/' + parts[0];
                            }
                            return value;
                        }
                    }
                }],
                yAxes: [{
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('vi-VN');
                        }
                    }
                }]
            }
        }
    });
});

$(document).ready(function () {

    function formatPercentage(number) {
        if (isNaN(number)) {
            number = parseFloat(number);
        }
        return (number * 100).toFixed(2) + ' %';
    }

    function updateStatistical(response) {
        const totalRevenueElement = $('#revenue');
        const totalOrderElement = $('#order-qty');
        const averageRevenueElement = $('#average-revenue');
        const cancelRateElement = $('#cancel-rate');

        totalRevenueElement.data('amount', response.data.totalRevenue);
        averageRevenueElement.data('amount', response.data.averageRevenue);
        totalOrderElement.text(response.data.totalOrder);
        cancelRateElement.text(formatPercentage(response.data.cancellationRate));

        formatAllPriceViElement();
    }

    // this is the id of the form
    $("#statistical-form").submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        let form = new FormData(this);
        let actionUrl = $(this).attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form,
            processData: false,
            contentType: false, 
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message);
                    // Cập nhật dữ liệu biểu đồ với dữ liệu từ server
                    updateStatistical(response);
                } else {
                    toastr.error(response.message);
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

})