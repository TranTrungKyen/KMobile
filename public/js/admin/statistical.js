let revenueChart = null;
let revenueChart1 = null;

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

    let ctx1 = document.getElementById('revenueChart').getContext('2d');
    revenueChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Doanh thu (VND)',
                data: [],
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
                    revenueChart1.data.labels = response.labels;
                    revenueChart1.data.datasets[0].data = response.data;
                    revenueChart1.update();
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