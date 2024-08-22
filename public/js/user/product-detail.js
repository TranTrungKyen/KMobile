$(document).ready(function () {
    // Render position by department
    function showColorByStorage(){
        const colorInputElement = $("#add-product-to-cart-form #color");
        const storageId = $(this).val();
        
        let optionColorHtmls = productDetailValues.map((element) => {
            
            if(storageId == element.storage_id){
                return `<option value="${ element.color_id }">${ element.color.name }</option>`;
            }
        })
        colorInputElement.html(`<option value="-1" selected="">Chọn màu sắc</option>` + optionColorHtmls);
        if(!storageId) {
            colorInputElement.attr('disabled', 'disabled');
            return;
        }
        if(colorInputElement.attr('disabled')) {
            colorInputElement.removeAttr('disabled');
        }
    }
    $("#add-product-to-cart-form #storage").on('input change', showColorByStorage);
});