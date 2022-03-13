$(document).ready(function () {

    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart() {
        $.ajax({
            method: 'GET',
            url: '/load-cart-data',
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    function loadwishlist() {
        $.ajax({
            method: 'GET',
            url: '/load-wishlist-data',
            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                swal(response.status);
                loadcart();
            }
        });

    });

    // add to cart from wishlist
    $('.addToCartBtnFW').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                swal(response.status);
                loadcart();
            }
        });

    });

    $('.addToWishlist').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: 'POST',
            url: '/add-to-wishlist',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                swal(response.status);
                loadwishlist();
            }
        });
    });

    // $('.increment-btn').click(function (e) {
    $(document).on('click', '.increment-btn', function (e) {

        e.preventDefault();
        let max_qty = $(this).data('max-qty');
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < max_qty && value < 7) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        } else {
            swal({
                title: "Oops!",
                text: "Product quantity exceeded!!",
                icon: "error",
            });
        }
    });

    // $('.decrement-btn').click(function (e) {
    $(document).on('click', '.decrement-btn', function (e) {

        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // $('.delete-cart-item').click(function (e) {
    $(document).on('click', '.delete-cart-item', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url: 'delete-cart-item',
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadcart();
                $('.cartitemsR').load(location.href + " .cartitemsR");
                swal("", response.status, "success", {
                    timer: 1000,
                    button: false
                });
            }
        });
    });

    $(document).on('click', '.remove-wishlist-item', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url: 'delete-wishlist-item',
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                //window.location.reload();
                loadwishlist();
                $('.wishlistitemsR').load(location.href + " .wishlistitemsR");
                swal("", response.status, "success", {
                    timer: 1000,
                    button: false
                });
            }
        });
    });

    $(document).on('click', '.changeQuantity', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                $('.cartitemsR').load(location.href + " .cartitemsR");
                // window.location.reload();
            }
        });
    });
});

// loader
$(window).on('load', function () {
    $('.loader').fadeOut(500);
    $('.content').fadeIn(1500);
});
