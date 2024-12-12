$(window).on('load', function() {
    $('#status').fadeOut(); // Скрываем анимацию загрузки
    $('#preloader').delay(350).fadeOut('slow'); // Скрываем белый DIV
    $('body').delay(350).css({'overflow':'visible'}); // Разрешаем прокрутку
});

function showCart(cart) { 
    $("#cart-modal .modal-body").html(cart); 
    $("#cart-modal").modal(); 
    let cartQty = $("#modal-cart-qty").text() ? $("#modal-cart-qty").text() : 0; 
    $(".mini-cart-qty").text(cartQty); 
    console.log(cartQty); 
 
    if (cartQty) { 
        $("#cart-modal .modal-footer button.btn-cart").removeClass("d-none"); 
    } else { 
        $("#cart-modal .modal-footer button.btn-cart").addClass("d-none"); 
    } 
    if (cartQty > 0) { 
        $("#cart-modal .modal-footer a.btn-cart").removeClass("d-none"); 
    } else { 
        $("#cart-modal .modal-footer a.btn-cart").addClass("d-none"); 
    } 
}; 
 
function showCount(cart) { 
    $("#cart-modal .modal-body").html(cart); 
    let cartQty = $("#modal-cart-qty").text() ? $("#modal-cart-qty").text() : 0; 
    $(".mini-cart-qty").text(cartQty); 
    $("#liveToast").fadeIn(500, () => { 
        setTimeout(()=> { 
            $("#liveToast").fadeOut() 
        },3000) 
    }); 
}; 
 
document.addEventListener('DOMContentLoaded', function (){ 
 
    window.clearCart = function(action) { 
        $.ajax({ 
            url: action, 
            type: "get", 
            success: function (result) { 
                let now_location = document.location.pathname; 
                if (now_location == '/cart/checkout') { 
                    location = '/cart/checkout'; 
                } else { 
                    showCart(result) 
                } 
            }, 
            error: function () { 
                alert("Errorrrrr"); 
            }, 
        }); 
    }; 
}) 
 
document.addEventListener('DOMContentLoaded', function (){ 
 
    window.getCart = function(action) { 
        $.ajax({ 
            url: action, 
            type: "get", 
            success: function (result) { 
                showCart(result); 
            }, 
            error: function () { 
                alert("Errorrrrrr"); 
            }, 
        }); 
    }; 
}); 
 
$(function () { 
    $(".addtocart").on("submit", function () { 
        let form = $(this); 
        $.ajax({ 
            url: form.attr("action"), 
            data: form.serialize(), 
            type: "post", 
            success: function (result) { 
                // showCart(result); 
                showCount(result); 
            }, 
            error: function (msg) { 
                alert("Error!"); 
                console.log(msg.responseJSON); 
                form[0].reset(); 
            }, 
        }); 
        return false; 
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
                    showCart(result) 
                } 
            }, 
            error: function (msg) { 
                alert("Error!"); 
            }, 
        }); 
    }); 
    $("#order-product").on("click", ".del-item", function () { 
        $.ajax({ 
            url: $(this).data("action"), 
            type: "get", 
            success: function (result) { 
                let now_location = document.location.pathname; 
                if (now_location == '/cart/checkout') { 
                    location = '/cart/checkout'; 
                } else { 
                    showCart(result) 
                } 
            }, 
            error: function (msg) { 
                alert("Error!"); 
            }, 
        }); 
    }); 
});


// function showCart(cart) {
//     $('#cart-modal .modal-body').html(cart);
//     $('#cart-modal').modal();
//     updateCartQuantity();
// }

// function updateCartQuantity() {
//     const cartQty = $('#modal-cart-qty').text() || 0;
//     $('.mini-cart-qty').text(cartQty);
    
//     const isCartEmpty = cartQty <= 0;
//     $('#cart-modal .modal-footer button.btn-cart').toggleClass('d-none', isCartEmpty);
//     $('#cart-modal .modal-footer a.btn-cart').toggleClass('d-none', isCartEmpty);
// }

// document.addEventListener('DOMContentLoaded', function () {
//     window.getCart = function(action) {
//         $.ajax({
//             url: action,
//             type: "get",
//             success: showCart,
//             error: function () {
//                 alert('Error');
//             }
//         });
//     };
// });

// function showAlert(cart) {
//     $('#cart-modal .modal-body').html(cart);
//     updateCartQuantity();
    
//     $('#customNotification').removeClass('d-none').fadeIn(1000, function() {
//         setTimeout(function() {
//             $('#customNotification').fadeOut(2000);
//         }, 1000);
//     });
// }

// $(function() {
//     // Проверка на авторизацию
//     const isAuthenticated = /* ваша логика проверки авторизации */

//     $('.addtocart').on('submit', function (event) {
//         event.preventDefault(); // Предотвращаем стандартное поведение формы
//         const form = $(this);

//         if (!isAuthenticated) {
//             alert('Пожалуйста, войдите в систему, чтобы добавить товары в корзину.');
//             return;
//         }

//         $.ajax({
//             url: form.attr('action'),
//             data: form.serialize(),
//             type: 'post',
//             success: showAlert,
//             error: function (msg) {
//                 alert('Ошибка при добавлении товара в корзину.');
//                 console.log(msg.responseJSON);
//                 form[0].reset();
//             }
//         });
//     });

//     // Обработчик удаления элемента из корзины
//     $(document).on("click", ".del-item", function () {
//         if (!isAuthenticated) {
//             alert('Пожалуйста, войдите в систему, чтобы управлять корзиной.');
//             return;
//         }

//         $.ajax({
//             url: $(this).data("action"),
//             type: "get",
//             success: function (result) {
//                 if (document.location.pathname === '/cart/checkout') {
//                     location.reload(); // Перезагружаем страницу
//                 } else {
//                     showCart(result);
//                 }
//             },
//             error: function () {
//                 alert("Ошибка при удалении товара из корзины!");
//             },
//         });
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     window.clearCart = function(action) {
//         if (!isAuthenticated) {
//             alert('Пожалуйста, войдите в систему, чтобы очистить корзину.');
//             return;
//         }

//         $.ajax({
//             type: "get",
//             url: action,
//             success: function (result) {
//                 let now_location = document.location.pathname;
//                 if (now_location === '/cart/checkout') {
//                     location = '/cart/checkout';
//                 } else {
//                     showCart(result);
//                 }
//             },
//             error: function () {
//                 alert('Ошибка при очистке корзины.');
//             }
//         });
//     };
// });
