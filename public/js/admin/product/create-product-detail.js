$(document).ready(function () {
    const addProductDetailBtn = $('.add-product-detail-js');
    const createProductDetailsFormElement = $('#create-product-details-form .card-body');
    let indexRow = 1;

    addProductDetailBtn.on('click', function (e) {
        const rowInputDataHtmls = `
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="color_id">Màu sắc</label>
                    <span class="text-danger">*</span>
                    <select class="form-select" id="color_id[${indexRow}]" name="color_id[]">
                        <option value="" hidden selected hidden>Chọn màu sắc</option>
                        ${colors.map(color => `<option value="${color.id}">${color.name}</option>`).join('')}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="storage_id">Dung lượng</label>
                    <span class="text-danger">*</span>
                    <select class="form-select" id="storage_id[${indexRow}]" name="storage_id[]">
                        <option value="" hidden selected hidden>Chọn dung lượng</option>
                        ${storages.map(storage => `<option value="${storage.id}">${storage.storage}</option>`).join('')}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="qty">Số lượng</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" name="qty[]" id="qty[${indexRow}]">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="price">Giá</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" name="price[]" id="price[${indexRow}]">
                </div>
            </div>
        </div>
        `;

        createProductDetailsFormElement.prepend(rowInputDataHtmls);
        indexRow++;
    })

    // ----------multiplefile-upload---------
    function ImgUpload() {
        let imgArray = [];
    
        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                let imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                let maxLength = parseInt($(this).attr('data-max_length'), 10);
    
                let files = e.target.files;
                let filesArr = Array.from(files);
    
                filesArr.some(function (f) {
                    if (!f.type.match('image.*')) {
                        return false;
                    }
    
                    if (imgArray.length >= maxLength) {
                        return true; // Dừng thêm file mới nếu đã đạt tới maxLength
                    }
    
                    imgArray.push(f);
    
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let html = `
                            <div class='upload__img-box'>
                                <div style='background-image: url(${e.target.result})' data-file='${f.name}' class='img-bg'>
                                    <div class='upload__img-close'></div>
                                </div>
                            </div>`;
                        imgWrap.append(html);
                    };
                    reader.readAsDataURL(f);
                });
    
                updateInputFiles($(this), imgArray);
            });
        });
    
        $('body').on('click', ".upload__img-close", function () {
            let fileName = $(this).parent().data("file");
    
            // Xóa file khỏi imgArray và cập nhật input file
            imgArray = imgArray.filter(f => f.name !== fileName);
            let input = $(this).closest('.upload__box').find('.upload__inputfile');
            updateInputFiles(input, imgArray);
    
            // Xóa phần tử HTML của ảnh đã bị xóa
            $(this).closest('.upload__img-box').remove();
        });
    
        function updateInputFiles(input, files) {
            let dataTransfer = new DataTransfer();
            files.forEach(file => dataTransfer.items.add(file));
            input[0].files = dataTransfer.files;
        }
    }
    ImgUpload();

    // Hàm để hiển thị thông báo Toastr mà không bị trùng lặp
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
    $("#create-product-details-form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        let form = new FormData(this);
        let actionUrl = $(this).attr('action');
        
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form,
            processData: false, // Ngăn chặn jQuery xử lý dữ liệu
            contentType: false, // Ngăn chặn jQuery đặt Content-Type
            success: function(data) {
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