$(document).ready(function(){


    $('[data-add_to_cart_btn]').on('click',function(e){
        $elem=$(this);
        fetch('/cart/add/'+$(this).attr('data-product_id'))
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Ошибка при выполнении запроса');
                }
            })
            .then(function(data) {
                data=data.data;
                if(data.status==='success'){
                    $('[data-cart_count]').html(data.cart_props.cart_count);

                    $elem.addClass( "d-none" );;

                    $('[data-product_quantity][data-product_id="'+data.product_id+'"]').html(data.quantity);
                    $('[data-inc_n_dec="'+data.product_id+'"]').removeClass( "d-none" );
                }else{
                    throw new Error('Товар не добавлен');

                }

            })
            .catch(function(error) {
                console.log(error);
            });
    });

    $('[data-increment_btn]').on('click',function(e){
        fetch('/cart/add/'+$(this).attr('data-product_id'))
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Ошибка при выполнении запроса');
                }
            })
            .then(function(data) {
                data=data.data;
                if(data.status==='success'){
                    if(data.quantity>0) {

                        $("[data-product_quantity]").html(data.quantity);
                    }else{
                        $('[data-add_to_cart_btn][data-product_id="'+data.product_id+'"]').removeClass( "d-none" );;

                        $('[data-product_quantity][data-product_id="'+data.product_id+'"]').html(data.quantity);
                        $('[data-inc_n_dec="'+data.product_id+'"]').addClass( "d-none" );
                    }
                    $('[data-cart_count]').html(data.cart_props.cart_count);
                }else{
                    throw new Error('Товар не добавлен');

                }

            })
            .catch(function(error) {
                console.log(error);
            });
    });

    $('[data-decrement_btn]').on('click',function(e){

        fetch('/cart/remove/'+$(this).attr('data-product_id'))
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Ошибка при выполнении запроса');
                }
            })
            .then(function(data) {
                data=data.data;
                if(data.status==='success'){
                    if(data.quantity>0) {

                        $("[data-product_quantity]").html(data.quantity);
                    }else{
                        $('[data-add_to_cart_btn][data-product_id="'+data.product_id+'"]').removeClass( "d-none" );;

                        $('[data-product_quantity][data-product_id="'+data.product_id+'"]').html(data.quantity);
                        $('[data-inc_n_dec="'+data.product_id+'"]').addClass( "d-none" );
                    }
                    $('[data-cart_count]').html(data.cart_props.cart_count);
                }else{
                    throw new Error('Товар не удален');

                }

            })
            .catch(function(error) {
                console.log(error);
            });
    });

    $('[data-c_increment_btn]').on('click',function(e){
        fetch('/cart/add/'+$(this).attr('data-product_id'))
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Ошибка при выполнении запроса');
                }
            })
            .then(function(data) {
                data=data.data;
                if(data.status==='success'){

                    if(data.quantity>0) {

                        $('[data-c_product_quantity][data-product_id="'+data.product_id+'"]').html(data.quantity);
                        $('[data-total_sum]').html(data.cart_props.total_sum + " ₽");
                        $('[data-sum_with_discount]').html(data.cart_props.sum_with_discount + " ₽");
                        $('[data-discount_percent]').html(data.cart_props.discount_percent + " %");
                    }else{
                        location.reload();
                    }
                    $('[data-cart_count]').html(data.cart_props.cart_count);
                }else{
                    throw new Error('Товар не добавлен');

                }

            })
            .catch(function(error) {
                console.log(error);
            });
    });

    $('[data-c_decrement_btn]').on('click',function(e){

        fetch('/cart/remove/'+$(this).attr('data-product_id'))
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Ошибка при выполнении запроса');
                }
            })
            .then(function(data) {
                data=data.data;
                if(data.status==='success'){
                    if(data.quantity>0) {

                        $('[data-c_product_quantity][data-product_id="'+data.product_id+'"]').html(data.quantity);
                        $('[data-total_sum]').html(data.cart_props.total_sum + " ₽");
                        $('[data-sum_with_discount]').html(data.cart_props.sum_with_discount + " ₽");
                        $('[data-discount_percent]').html(data.cart_props.discount_percent + " %");
                    }else{
                        location.reload();
                    }
                    $('[data-cart_count]').html(data.cart_props.cart_count);
                }else{
                    throw new Error('Товар не удален');

                }

            })
            .catch(function(error) {
                console.log(error);
            });
    });

});
