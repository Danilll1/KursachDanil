function makeInput(e) {
    e.innerHTML = '<input value="' + e.innerText + '">';
}

$(window).on('load', function() {
    $('#status').fadeOut(); // Скрываем анимацию загрузки
    $('#preloader').delay(350).fadeOut('slow'); // Скрываем белый DIV
    $('body').delay(350).css({ 'overflow': 'visible' }); // Разрешаем прокрутку
});

function showCart(cart) {
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal();

    let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
    $('.mini-cart-qty').text(cartQty);

    // Обновляем видимость кнопок в зависимости от количества товаров в корзине
    if (cartQty > 0) {
        $('#cart-modal .modal-footer button.btn-cart').removeClass('d-none');
        $('#cart-modal .modal-footer a.btn-cart').removeClass('d-none');
    } else {
        $('#cart-modal .modal-footer button.btn-cart').addClass('d-none');
        $('#cart-modal .modal-footer a.btn-cart').addClass('d-none');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    window.getCart = function(action) {
        $.ajax({
            url: action,
            type: "get",
            success: function(result) {
                showCart(result);
            },
            error: function() {
                alert('Error');
            }
        });
    };

    // Функция для очистки корзины
    window.clearCart = function(action) {
        $.ajax({
            type: "get",
            url: action,
            success: function(result) {
                let now_location = document.location.pathname;
                if (now_location === '/cart/checkout') {
                    location = '/cart/checkout'; // Перезагружаем страницу на checkout
                } else {
                    showCart(result); // Обновляем корзину
                }
            },
            error: function() {
                alert('Error');
            }
        });
    };
});

function showAlert(cart) {
    $('#cart-modal .modal-body').html(cart);
    let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
    $('.mini-cart-qty').text(cartQty);

    $('#customNotification').removeClass('d-none').fadeIn(1000, function() {
        setTimeout(function() {
            $('#customNotification').fadeOut(2000);
        }, 1000);
    });
}

function addToCart(productId) {
    $.ajax({
        url: '/cart/add',
        method: 'POST',
        data: { product_id: productId },
        success: function(response) {
            // Обновляем количество на кнопке
            $('.mini-cart-qty').text(response.cart_qty);
            showAlert(response.cart); // Показываем обновленное состояние корзины
        },
        error: function() {
            alert('Error adding to cart');
        }
    });
}

$(function() {
    $('.addtocart').on('submit', function() {
        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            success: function(result) {
                showAlert(result);
            },
            error: function(msg) {
                alert('Error');
                console.log(msg.responseJSON);
                form[0].reset();
            }
        });
        return false; // предотвращаем стандартное поведение формы
    });

    // Обработчик для удаления товара из корзины
    const handleDeleteItem = function(actionUrl) {
        $.ajax({
            url: actionUrl,
            type: "get",
            success: function(result) {
                let now_location = document.location.pathname;
                if (now_location === '/cart/checkout') {
                    location.reload(); // перезагружаем страницу на checkout
                } else {
                    showCart(result);
                }
            },
            error: function(msg) {
                alert("Error!");
            }
        });
    };

    // Привязываем обработчик событий для удаления товара
    $("#table1").on("click", ".del-item", function() {
        handleDeleteItem($(this).data("action"));
    });

    $("#cart-modal .modal-body").on("click", ".del-item", function() {
        handleDeleteItem($(this).data("action"));
    });

    // Обработчик для добавления товара в корзину
    $('.add-to-cart-button').on('click', function() {
        const productId = $(this).data('product-id'); // Предполагается, что у кнопки есть атрибут data-product-id
        addToCart(productId);
    });

    // Обработчик для очистки корзины
    $('.clear-cart-button').on('click', function() {
        const clearCartUrl = $(this).data('action'); // Предполагается, что у кнопки есть атрибут data-action с URL для очистки корзины
        clearCart(clearCartUrl);
    });
});

