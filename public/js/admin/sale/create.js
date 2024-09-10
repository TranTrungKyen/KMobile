$(document).ready(function () {
    jQuery('.scrollbar-inner').scrollbar();

    const app = {
        addItemProductSaleSeleted: function (dataProduct) {
            const listProductSaleSeletedElement = $('#list-product-sale-selected');

            const itemProductSaleSeletedHtml = `
                <li class="list-group-item" data-item-selected-id=${dataProduct.product_detail_id}>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card shadow-none mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center">
                                        <img src="${dataProduct.image}"
                                            class="img-fluid rounded-start pe-3 pt-2 pb-2 product-image"
                                            alt="${dataProduct.name}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-0">
                                            <h5 class="card-title fs-6">${dataProduct.name}</h5>
                                            <p class="card-text mb-0">
                                                <small class="text-muted">Màu sắc: ${dataProduct.color}</small>
                                            </p>
                                            <p class="card-text mb-0">
                                                <small class="text-muted">Dung lượng:
                                                    ${dataProduct.storage}</small>
                                            </p>
                                            <p class="card-text">
                                                <div class="text-muted d-flex">
                                                    <small>Giá: </small>
                                                    <small class="ms-2 price-js--vi" data-amount="${dataProduct.price}">
                                                        ${dataProduct.price}
                                                    </small>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline" hidden>
                                                <input type="number" name="productDetailIds[]"
                                                    id="productDetailIds[${dataProduct.product_detail_id}]" class="form-control" value="${dataProduct.product_detail_id}"/>
                                                <label class="form-label" for="productDetailIds[${dataProduct.product_detail_id}]">Mã chi tiết sản phẩm</label>
                                            </div>
                                            <div class="form-group p-0">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon3">Giảm giá (%)</span>
                                                    <input type="number" class="form-control" 
                                                    min="1" max="99"
                                                    name="discounts[]" data-price="${dataProduct.price}"
                                                    id="discounts[${dataProduct.product_detail_id}]" 
                                                    aria-describedby="basic-addon3"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <p class="text-muted mb-0">hoặc</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group p-0">
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" 
                                                    min="1" max="${dataProduct.price - 1}" data-price="${dataProduct.price}"
                                                    name="prices[]" id="prices[${dataProduct.product_detail_id}]"
                                                    aria-label="Giá cuối">
                                                    <span class="input-group-text">${lang.common.currency_unit}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="col-md-2 d-flex align-items-center justify-content-center">
                                    <div class="btn p-0 fs-3 shadow-none shadow-none delete-product-selected-js" data-id="${dataProduct.product_detail_id}">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            `;

            $(listProductSaleSeletedElement).prepend(itemProductSaleSeletedHtml);

            this.listenerDeleteProductSaleBtn(dataProduct.product_detail_id);

            this.handleInputDiscount(dataProduct.product_detail_id);

            this.handleInputPrice(dataProduct.product_detail_id);

            formatAllPriceViElement();
        },

        listenerDeleteProductSaleBtn: function (dataId) {
            const classDeleteProductSaleBtn = `.delete-product-selected-js[data-id=${dataId}]`;
            const classListItemId = `.list-group-item[data-item-selected-id=${dataId}]`;
            const classAddProductBtnId = `.btn[data-add-product-btn-id=${dataId}]`;

            $(classDeleteProductSaleBtn).on('click', function (event) {
                // Remove item with attribute and product detail id
                $(classListItemId).remove();

                // undisable class add product btn
                $(classAddProductBtnId).toggle('disabled');
            })
        },

        handleDisabledBtnAddAfterFindProduct: function () {
            const productSeletedElement = $('#list-product-sale-selected .list-group-item');

            let productSeletedIds = [];

            for (const productSelectedElement of productSeletedElement) {
                productSeletedIds.push($(productSelectedElement).data('itemSelectedId'));
            }

            productSeletedIds.forEach(productSeletedId => {
                $(`.btn[data-add-product-btn-id=${productSeletedId}]`).toggle('disabled');
            });
        },

        listenerAddProductSaleBtns: function () {
            const __this = this;
            const addProductSaleBtns = $('.add-product-sale-js');
            
            this.handleDisabledBtnAddAfterFindProduct();

            for (const element of addProductSaleBtns) {
                $(element).on('click', function (event) {
                    const dataProduct = JSON.parse($(element).attr('data-product'));
                    __this.addItemProductSaleSeleted(dataProduct);

                    // disable class add product btn
                    $(element).toggle('disabled');
                })
            }
        },

        updateListProductDetail: function(data) {
            // update list product
            const listProductElement = $('#list-product');

            const listGroupItemsHtml = data.productDetails.map((productDetail, index) => {
                let dataProduct = {
                    'product_detail_id': productDetail.id,
                    'image': productDetail.product.image.replace('public/', STORAGE_URL),
                    'name': productDetail.product.name,
                    'color': productDetail.color.name,
                    'storage': productDetail.storage.storage,
                    'price': productDetail.price,
                };
                return `
                <li class="list-group-item" data-key="${ index }">
                    <div class="card shadow-none mb-3">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="${ dataProduct.image }"
                                    class="img-fluid rounded-start pe-3 pt-2 pb-2 product-image"
                                    alt="${ dataProduct.name }">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body p-0">
                                    <h5 class="card-title fs-6">${ dataProduct.name }</h5>
                                    <p class="card-text mb-0">
                                        <small class="text-muted">Màu sắc: ${ dataProduct.color }</small>
                                    </p>
                                    <p class="card-text mb-0">
                                        <small class="text-muted">Dung lượng: ${ dataProduct.storage }</small>
                                    </p>
                                    <p class="card-text">
                                        <div class="text-muted d-flex">
                                            <small>Giá: </small>
                                            <small class="ms-2 price-js--vi" data-amount="${ dataProduct.price }">
                                                ${ dataProduct.price }
                                            </small>
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <div class="btn p-0 fs-3 shadow-none add-product-sale-js"
                                    data-add-product-btn-id="${ dataProduct.product_detail_id }"
                                    data-product='${ JSON.stringify(dataProduct) }'>
                                    <i class="fa-solid fa-circle-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                 `;
            }).join('');

            listProductElement.html(listGroupItemsHtml);
        },

        handleSubmitFormFind: function () {
            const __this = this;
            let isProcessing = false;
            // this is the id of the form
            $("#find-product-detail-form").submit(function (e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.

                if (isProcessing) {
                    return; 
                }
        
                isProcessing = true; 

                let form = $(this).serialize();
                let actionUrl = $(this).attr('action');

                $.ajax({
                    type: "GET",
                    url: actionUrl,
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status) {
                            __this.updateListProductDetail(data);
                            formatAllPriceViElement();
                            __this.listenerAddProductSaleBtns();

                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function (errors) {
                        if (errors.hasOwnProperty("responseJSON") && errors.responseJSON.errors) {
                            let messages = errors.responseJSON.errors;
                            showToastrErrors(messages);
                        }
                    },
                    complete: function() {
                        showOverlay();
                        setTimeout(function() {
                            hiddenOverlay();
                        }, 1000)
                        isProcessing = false; 
                    }
                });

            });
        },

        handleSubmitFormStore: function () {
            const __this = this;
            // this is the id of the form
            $("#create-sale-form").submit(function (e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                if (!__this.isCorrectDataSubmit()) {
                    return;
                }
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
                            showToastrErrors(messages);
                        }
                    }
                });

            });
        },

        isCorrectDataSubmit: function () {
            const countProductSaleSelectedElements = $('#list-product-sale-selected li').length;
            if (countProductSaleSelectedElements == 0) {
                toastr.error(lang.validate.backend.create_sale_form.productDetailIds.required);
                return false;
            }
            return true;
        },

        handleInputDiscount: function ($dataId) {
            const inputDiscountElement = $(`#discounts\\[${$dataId}\\]`);
            const inputPriceElement = $(`#prices\\[${$dataId}\\]`);
            const originalPrice = parseInt(inputDiscountElement.attr('data-price'));


            inputDiscountElement.on('keydown change', debounce(function (e) {
                let discountPercent = $(this).val();
                let discountAmount = (originalPrice * discountPercent) / 100;
                let discountedPrice = originalPrice - discountAmount;
                if (discountPercent < 0 || discountPercent > 100) {
                    discountPercent = 1;
                    discountAmount = (originalPrice * discountPercent) / 100;
                    discountedPrice = originalPrice - discountAmount;
                    inputDiscountElement.val(discountPercent);
                    toastr.error('Phần trăm giảm giá lớn hơn 0, nhỏ hơn 100')
                }

                inputPriceElement.val(parseInt(discountedPrice));
            }, 250));
        },

        handleInputPrice: function ($dataId) {
            const inputDiscountElement = $(`#discounts\\[${$dataId}\\]`);
            const inputPriceElement = $(`#prices\\[${$dataId}\\]`);
            const originalPrice = parseInt(inputPriceElement.attr('data-price'));

            inputPriceElement.on('keydown change', debounce(function (e) {
                let discountedPrice = $(this).val();
                let discountAmount = originalPrice - discountedPrice;
                let discountPercent = Math.round((discountAmount / originalPrice) * 100);

                if (discountedPrice < 0 || discountedPrice > originalPrice) {
                    discountPercent = 1;
                    discountAmount = (originalPrice * discountPercent) / 100;
                    discountedPrice = originalPrice - discountAmount;
                    inputPriceElement.val(discountedPrice);
                    toastr.error('Không được nhập giá cao hơn giá gốc hoặc nhỏ hơn 0')
                }

                inputDiscountElement.val(discountPercent);
            }, 250));
        },

        start: function () {
            this.listenerAddProductSaleBtns();
            this.handleSubmitFormStore();
            this.handleSubmitFormFind();
        }
    }

    app.start();
});