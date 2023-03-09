const ORDER = {
    init() {
        this.addMoreProductRow();
        this.removeProductRow();
    },

    addMoreProductRow() {
        $('.add-row-product').click(function () {
            let html = `<div class="form-row row-product">
                            <div class="col-sm-3 my-1">
                                <input type="text" class="form-control" name="product_codes[]" placeholder="Mã sản phẩm" required>
                            </div>
                            <div class="col-sm-3 my-1">
                                <input type="number" min="1" class="form-control" name="product_quantitys[]" placeholder="Số lượng" required>
                            </div>
                            <div class="col-sm-2 my-1 delete-row-product">
                                <i class="fas fa-trash"></i>
                            </div>
                        </div>`;
            
            $('.list-row-product').append(html);
            if ($('.row-product').length > 1) {
                $('.row-product .delete-row-product').removeClass('d-none');
            }
        });
    },

    removeProductRow() {
        $(document).on('click', '.delete-row-product', function () {
            $(this).parents('.row-product').remove();
            if ($('.row-product').length == 1) {
                $('.row-product .delete-row-product').addClass('d-none');
            }
        });
    }
}

$(function () {
    ORDER.init();
});


