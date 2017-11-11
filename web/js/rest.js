$(function() {
    var messageContainer = $('#message');
    var oneProduct = $('#one-product');
    var preparationForEdit = $('#preparation-for-edit');
    var allProduct = $('#all-product');

    oneProduct.on('click', function() {

        var url = $(this).attr('href');
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                var id = '<p><b>id:</b>' + response['id'] + '</p>';
                var providerId = '<p><b>id_provider:</b>' + response['provider_id'] + '</p>';
                var name = '<p><b>name:</b>' + response['name']  + '</p>';
                var price = '<p><b>price:</b>' + response['price'] + '</p>';
                var img = '<p><b>img:</b>' + response['img'] + '</p>';

                messageContainer.html(id + providerId + name + price + img);
            }
        });

        return false;
    });

    allProduct.on('click', function() {
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            method: 'GET',
            success: function(responses) {
                var id, providerId, name, price, img, res = '';

                for (response in responses) {
                    id = '<p><b>id:</b>' + responses[response]['id'] + '</p>';
                    providerId = '<p><b>id_provider:</b>' + responses[response]['provider_id'] + '</p>';
                    name = '<p><b>name:</b>' + responses[response]['name'] + '</p>';
                    price = '<p><b>price:</b>' + responses[response]['price'] + '</p>';
                    img = '<p><b>img:</b>' + responses[response]['img'] + '</p><hr/>';

                    res += id + providerId + name + price + img;
                }

                messageContainer.html(res);
            }
        });

        return false;
    });

    preparationForEdit.on('click', function() {
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                var providerId = response['provider_id'];
                var name = response['name'];
                var price = response['price'];
                var img = response['img'];

                $('input[name=provider-id]').val(providerId);
                $('input[name=name-product]').val(name);
                $('input[name=price]').val(price);
                $('input[name=img]').val(img);

                messageContainer.html('');
                $('#rest-edit-form-preparation').clone(true).attr('id', 'rest-edit-form').removeClass('hidden').appendTo(messageContainer);
                $('#rest-edit-form button').attr('id', 'one-product-edit');
            }
        });

        return false;
    });

    messageContainer.on('click', '#one-product-edit', function() {
        var url = $(this).closest('form').attr('action');

        var providerId = +$('#rest-edit-form input[name=provider-id]').val();
        var name = $('#rest-edit-form input[name=name-product]').val();
        var price = +$('#rest-edit-form input[name=price]').val();
        var img = $('#rest-edit-form input[name=img]').val();

        var data = {
            provider_id: providerId,
            name: name,
            price: price,
            img: img,
        };

        $.ajax({
            url: url,
            type: 'PUT',
            data: {
                provider_id: providerId,
                name: name,
                price: price,
                img: img,
            },
            success: function(response) {
                //console.log(response);
                alert('Успешно изменено');
            },
            error: function (response) {
                console.log(response);
                alert('Ошибка, детальнее в консоли');
            }
        });

        return false;
    });
});