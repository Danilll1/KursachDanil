<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@if (!empty(session('cart')))
    <div class="table_responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead">
                <tr>
                    <th scope="col">Фото</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Цена</th>
                    <th scope="col" class="colv">Кол-во</th>
                    <th scope="col" class="colv">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cart') as $item)
                    <tr class="thead_2">
                        <td>
                            <a href="{{ route('products.show', ['slug' => $item['slug']]) }}">
                                <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="img-thumbnail" style="max-width: 100px; height: auto;">
                            </a>
                        </td>
                        <td>
                            <a class="title" href="{{ route('products.show', ['slug' => $item['slug']]) }}" class="text-decoration-none">{{ $item['title'] }}</a>
                        </td>
                        <td>@price_format($item['price']) $</td>
                        <td class="colv">{{ $item['qty'] }}</td>
                        <td class="colv">
                            <span class="text-danger del-item" data-action="{{ route('cart.del_item', ['product_id' => $item['product_id']]) }}" style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal-footerr">
            <a href="{{ route('cart.checkout') }}" class="btn btn-secondary btn-cart Button__StyledButtonn">Оформить заказ</a>
            <button type="button" onclick="clearCart('{{ route('cart.clear') }}')" class="btn btn-danger">Очистить корзину</button>
        </div>

        <div class="cart-summary left-bottom-summary mt-4">
                <div class="font-weight-bold">Итого: {{ session('cart_qty') }} яхт(ы)</div>
                <div class="font-weight-bold">На сумму: @price_format(session('cart_total')) $</div>
            </div>

        @else
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Корзина пуста</h4>
                <p>Пожалуйста, добавьте товары в корзину, чтобы продолжить покупки.</p>
                <hr>
                <p class="mb-0">Вы можете вернуться на главную страницу или просмотреть товары.</p>
            </div>
    </div>
@endif

<style>
    .thead {
        background-color: #fff !important;
        font-family: 'Tenor Sans', sans-serif;
        color:  #005154;
        text-align: center;
        font-size: 18px;
    }

    .thead_2 {
        font-family: 'Golos Text', sans-serif;
        text-align: center;
    }

    .img-thumbnail {
        width: 100%;
        object-fit: cover;
    }

    .title {
        font-family: 'Tenor Sans', sans-serif;
        color:  #005154;
    }

    .title:hover {
        text-decoration: none;
        color:  #005154;
    }

    .left-bottom-summary {
    position: absolute; 
    bottom: -150px; 
    left: 0px; 
    background-color: #f8f9fa;
    padding: 10px; 
    border-radius: 5px; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    z-index: 1000;
}

.modal-footerr {
    display: flex;
    justify-content: space-between;
}

.Button__StyledButtonn {
    color: #fff !important;
    background-color: #005154 !important;
    border: none !important;
}

.Button__StyledButtonn:hover {
    background-color: #00b2a1 !important; /* Цвет фона при наведении */
    border: none !important;
}

}

@media (max-width: 768px) {
    .left-bottom-summary {
        bottom: -150px; 
        left: 0px;
        padding: 8px; 
    }
}@media (max-width: 576px) {
    .left-bottom-summary {
        bottom: -150px; 
        left: 0px;
        padding: 5px;
        font-size: 14px;
    }
    .colv {
        display: none;
    }
}
</style>
