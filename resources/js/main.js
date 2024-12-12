function makeInput(e) {
    e.innerHTML = '<input value="'+e.innerText+'">';
}

$(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
    $('body').delay(350).css({'overflow':'visible'});
  })

function showCart(cart) {
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal();
    let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
    $('.mini-cart-qty').text(cartQty);

    if (cartQty) {
        $('#cart-modal .modal-footer button.btn-cart').removeClass('d-none');
    } else {
        $('#cart-modal .modal-footer button.btn-cart').addClass('d-none');
    }
    if (cartQty > 0) {
        $('#cart-modal .modal-footer a.btn-cart').removeClass('d-none');
    } else {
        $('#cart-modal .modal-footer a.btn-cart').addClass('d-none');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    window.getCart = function(action) {
        $.ajax({
            url: action,
            type: "get",
            success: function (result) {
                showCart(result);
            },
            error: function () {
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

$(function() {
$('.addtocart').on('submit', function () {
    let form = $(this);
    $.ajax({
        url: form.attr('action'),
        data: form.serialize(),
        type: 'post',
        success: function (result) {
            showAlert(result);
        }, 
        error: function (msg) {
            alert('Error');
            console.log(msg.responseJSON);
            form[0].reset();
        }
    });
    return false;
})
});

$("#table1").on("click", ".del-item", function () {
    $.ajax({
        url: $(this).data("action"),
        type: "get",
        success: function (result) {
            let now_location = document.location.pathname;
            if (now_location == '/cart/checkout') {
                location = '/cart/checkout';
            } else {
                showCart(result);
            }
        },
        error: function (msg) {
            alert("Error!");
        },
    });
});

$("#cart-modal .modal-body").on("click", ".del-item", function () {
    $.ajax({
        url: $(this).data("action"),
        type: "get",
        success: function (result) {
            let now_location = document.location.pathname;
            if (now_location == '/cart/checkout') {
                location = '/cart/checkout';
            } else {
                showCart(result);
            }
        },
        error: function (msg) {
            alert("Error!");
        },
    });
});

$("#cart-modal .modal-body").on("click", ".del-item", function () {
    $.ajax({
        url: $(this).data("action"),
        type: "get",
        success: function (result) {
            let now_location = document.location.pathname;
            if (now_location == '/cart/checkout') {
                location = '/cart/checkout';
            } else {
                showCart(result);
            }
        },
        error: function (msg) {
            alert("Error!");
        },
    });
});

document.addEventListener('DOMContentLoaded', function () {
    window.clearCart = function(action) {
        $.ajax({
            type: "get",
            url: action,
            success: function (result) {
                let now_location = document.location.pathname;
                if (now_location == '/cart/checkout') {
                    location = '/cart/checkout';
                } else {
                    showCart(result);
                }
            },
            error: function () {
                alert('Error');
            }
        });
    }
});

