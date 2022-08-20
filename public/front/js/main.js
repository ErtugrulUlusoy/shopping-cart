$(document).ready(function(){
    $('.add-product-cart').click(function(){
        var productId = $(this).attr('data-product-id');
        var quantity = $('input[data-product-id="' + productId + '"').val();
        var url = $('base').attr('href');
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url + '/cart',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {productId: productId, quantity: quantity},
            cache: false,
            success:function(response)
            {
                response = JSON.parse(response);
                if(response.status === true)
                {
                    if($('.cart-container .cart-table').length === 0) {
                        $('.cart-container').append('<table class="table cart-table"></table>')
                    }
                    if($('.cart-container .cart-table').hasClass('d-none')){
                        $('.cart-container .cart-table').removeClass('d-none')
                    }

                    if($('.cart-container .cart-total-holder').hasClass('d-none')){
                        $('.cart-container .cart-total-holder').removeClass('d-none')
                    }

                    $('.cart-table tbody tr').remove();

                    $.each(response.data.products, function(index, item){
                        console.log(item)
                        $('.cart-table tbody').append('<tr data-id="' + item.productId + '">'
                        + '<td>' + item.productName + '</td>'
                        + '<td><input type="number" class="form-control cart-quantity" style="max-width: 70px" data-product-id="' + item.productId + '" value="' + item.quantity + '" /></td>'
                        + '<td>' + item.price + ' TL</td>'
                        + '<td>' + item.amount + '</td>'
                        + '<td><button type="button" class="btn btn-danger remove-product-cart" data-product-id="' + item.productId + '">Kaldır</button></td>'
                    +'</tr>');
                    });

                    $('.cart-total').text(response.data.total);
                    $('.none-product-message').addClass('d-none');
                    $('.dropdown-toggle').click();

                    alert(response.message);
                }
                else
                {
                    alert(response.message);
                }

            },
            error: function(response) {
            }
        });

    });

    $(document).on("click",".remove-product-cart", function() {
        var productId = $(this).attr('data-product-id');
        var url = $('base').attr('href');
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url + '/cart/remove',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {productId: productId},
            cache: false,
            success:function(response)
            {
                response = JSON.parse(response);
                if(response.status === true)
                {
                    $('.cart-table tr[data-id="' + productId + '"]').remove();
                    if(response.data.products.length < 1) {-
                        $('.cart-table').addClass('d-none');
                        $('.cart-total-holder').addClass('d-none');
                        $('.cart-container').append('<div class="text-center none-product-message">Sepetinizde hiç ürün yok</div>');
                    } else {
                        $('.cart-total').text(response.data.total);
                    }
                    alert(response.message);
                }
                else
                {
                    alert(response.message);
                }

            },
            error: function(response) {
            }
        });
    });

    $(document).on('change', '.cart-quantity', function(){
        var productId = $(this).attr('data-product-id');
        var quantity = $(this).val();
        var url = $('base').attr('href');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url + '/cart',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {productId: productId, quantity: quantity},
            cache: false,
            success:function(response)
            {
                response = JSON.parse(response);
                if(response.status === true)
                {
                    if($('.cart-container .cart-table').length === 0) {
                        $('.cart-container').append('<table class="table cart-table"></table>')
                    }
                    if($('.cart-container .cart-table').hasClass('d-none')){
                        $('.cart-container .cart-table').removeClass('d-none')
                    }

                    if($('.cart-container .cart-total-holder').hasClass('d-none')){
                        $('.cart-container .cart-total-holder').removeClass('d-none')
                    }

                    $('.cart-table tbody tr').remove();

                    $.each(response.data.products, function(index, item){
                        $('.cart-table tbody').append('<tr data-id="' + item.productId + '">'
                        + '<td>' + item.productName + '</td>'
                        + '<td><input type="number" class="form-control cart-quantity" data-product-id="' + item.productId + '" style="max-width: 70px" value="' + item.quantity + '" /></td>'
                        + '<td>' + item.price + ' TL</td>'
                        + '<td>' + item.amount + '</td>'
                        + '<td><button type="button" class="btn btn-danger remove-product-cart" data-product-id="' + item.productId + '">Kaldır</button></td>'
                    +'</tr>');
                    });

                    $('.cart-total').text(response.data.total);
                    $('.none-product-message').addClass('d-none');
                    
                    if(!$('.dropdown-toggle').hasClass('show'))
                         $('.dropdown-toggle').click();

                    alert(response.message);
                }
                else
                {
                    alert(response.message);
                }

            },
            error: function(response) {
            }
        });

    });
});
