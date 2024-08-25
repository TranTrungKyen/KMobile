$(document).ready(function () {
    const inputStorageElement = $("#add-to-cart-form #storage");
    const inputColorElement = $("#add-to-cart-form #color");
    const inputProductDetailIdElement = $("#add-to-cart-form #product-detail-id");
    const productDetailPriceElement = $('.product-detail-price-js');

    // Render position by department
    function showColorByStorage() {
        const colorInputElement = $("#add-to-cart-form #color");
        const storageId = $(this).val();

        let optionColorHtmls = productDetailValues.map((element) => {

            if (storageId == element.storage_id) {
                return `<option value="${element.color_id}">${element.color.name}</option>`;
            }
        })
        colorInputElement.html(`<option value="-1" selected="">Chọn màu sắc</option>` + optionColorHtmls);
        // Set productDetailId is null
        inputProductDetailIdElement.val('');

        if (!storageId) {
            colorInputElement.attr('disabled', 'disabled');
            return;
        }
        if (colorInputElement.attr('disabled')) {
            colorInputElement.removeAttr('disabled');
        }
    }
    inputStorageElement.on('input change', showColorByStorage);

    // getProductDetailId
    function getProductDetailId() {
        const storageId = inputStorageElement.val();
        const colorId = inputColorElement.val();
        productDetailValues.forEach(productDetail => {
            if (storageId != productDetail.storage_id || colorId != productDetail.color_id) {
                return;
            }
            inputProductDetailIdElement.val(productDetail.id);
            changePrice(productDetail.price, productDetail.price_current)
        });
    }

    function changePrice(price, priceCurrent) {

        let priceHtmls = `
            <h3 class="font-weight-semi-bold mb-4 price-js--vi" data-amount="${price}">${price}</h3>
        `;
        if (priceCurrent != null) {
            priceHtmls = `
                <h4 class="mb-4 text-muted mr-2"><del class="price-js--vi" data-amount="${price}">${price}</del></h3>
                <h3 class="font-weight-semi-bold mb-4 price-js--vi" data-amount="${priceCurrent}">${priceCurrent}</h3>
            `;
        }
        productDetailPriceElement.html(priceHtmls);
        formatAllPriceViElement()
    }

    // Set product detail id
    inputColorElement.on('change', getProductDetailId);
});