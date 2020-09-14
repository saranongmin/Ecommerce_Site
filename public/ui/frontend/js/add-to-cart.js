
function addToCart(id) {
    // console.log($('meta[name="csrf-token"]').attr('content'));
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url: APP_URL+'add_to_cart',
        data: {productId: id},
        cache: false,
        success: function (res) {
            $('#addToCart'+id).html(`
            <span type="submit" class="hub-cart phub-cart btn">
          <i class="fas fa-shopping-bag" aria-hidden="true"></i> Already In Cart
    </span>

            `);
        },
        error: function (xhr, status, error) {
            console.log("An AJAX error occured: " + status + "\nError: " + error);
        }
    });


}
