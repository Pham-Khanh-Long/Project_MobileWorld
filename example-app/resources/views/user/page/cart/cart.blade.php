<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <link href="https://mobileworld.com.vn/uploads/favicon.webp?v=230317" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/breadcrumb/breadcrumb.css">
    <link rel="stylesheet" href="./assets/css/oder_check/oder_check.css">
    <link rel="stylesheet" href="./assets/css/cart/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('user.page.header')
    @include('user.page.nav')
</head>
<body>
    <main id="ws-content" class="ws-content outer">
        @if(session('Cart'))
        <section class="breadcrumb">
            <div class="grid">
                <ul class="items-breadcrumb" itemtype="http://schema.org/BreadcrumbList" itemscope>
                    <li class="breadrumb-home breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem"> <a href="{{route('home')}}" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem"> <span itemprop="name">Thông tin đơn hàng</span>
                        <meta itemprop="position" content="2">
                    </li>
                </ul>
            </div>
        </section>
        <section class="box-title">
            <div class="grid">
                <div class="post-title">
                    <h1>Giỏ hàng</h1>
                </div>
            </div>
        </section>
        <section class="box-content">
            <div class="grid">
                    @csrf
                    <div class="box box-items" id="list-cart">
                        <table class="table">
                            <thead>
                                <th class="col col-name text-center">Sản phẩm</th>
                                <th class="col col-price text-center hidden-xs">Giá sản phẩm</th>
                                <th class="col col-quantity text-center hidden-xs">Số lượng</th>
                                <th class="col col-subtotal text-center hidden-xs">Thành tiền</th>
                            </thead>
                            <tbody>
                                @foreach(session('Cart')->products as $item)
                                <tr class="cart-item">
                                    <td class="col col-name text-center">
                                        <div class="info">
                                            <div class="img">
                                                <a href="{{route('product_detail',$item['productInfo']->id)}}">
                                                    <img src="{{asset($item['productInfo']->main_img)}}" width="80" height="80" class="img-cover" alt="">
                                                </a>
                                                <div class="remove">
                                                    <a href="javascript:" onclick="DeleteListItemCart({{$item['productInfo']->id}})" class="remove-item fa-trash-o"></a>
                                                </div>
                                            </div>
                                            <div class="txt">
                                                <a href="{{route('product_detail',$item['productInfo']->id)}}">
                                                {{$item['productInfo']->title}} - {{$item['productInfo']->memory}}
                                            </a>
                                                <div class="dropdown select-option"> Màu sắc : {{$item['productInfo']->color}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col col-price text-center hidden-xs"> <strong class="price">{{number_format($item['productInfo']->discount,0,'.','.') }}₫</strong> </td>
                                    <td class="col col-quantity text-center hidden-xs">
                                        <div class="qty">
                                            <a href="javascript:"  onclick="MinusItemCart({{$item['productInfo']->id}})" class="btn-press minus fa-minus ajax"></a>
                                            <input id="quantity-{{ $item['productInfo']->id }}" type="text" value="{{ $item['quanty'] }}" required="1" minlength="1" class="quantity">
                                            <a href="javascript:"  onclick="AddItemCart({{$item['productInfo']->id}})" class="btn-press plus fa-plus ajax"></a>
                                        </div>
                                    </td>
                                    <td class="col col-subtotal text-center subtotal hidden-xs">{{number_format(($item['productInfo']->discount)*$item['quanty'],0,'.','.') }}₫</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="2" class="hidden-xs">
                                    <div class="note-cart">
                                        <i class="fa fa-phone"></i>
                                        Thắc mắc vui lòng liên hệ:
                                        <a href="tel:0828807783" rel="nofoflow">xxxxx</a>
                                    </div>
                                </td>
                                <td class="text-center">Tổng cộng:</td>
                                <td class="col col-subtotal text-center">
                                    <strong id="pricecart" class="total-price">
                                        {{number_format(session('Cart')->totalPrice,0,'.','.') }}₫
                                    </strong>
                                </td>
                            </tfoot>
                        </table>
                    </div>
                    <a href="{{ route('order_detail') }}">
                        <div class="box-button text-center">
                            <button class="btnCheckout">Tiếp tục thanh toán</button>
                       </div>
                    </a>

            </div>
        </section>
        @else
        <section class="box-title"> <div class="grid"> <div class="post-title"> <h1>Giỏ hàng</h1></div> </div> </section>
        <section class="box-content"> <div class="grid"> <div class="cart-empty alert alert-warning no-margin"> <p><strong>Giỏ hàng của bạn đang rỗng.</strong></p> <p>Nếu bạn đã cố gắng thêm sản phảm vào giỏ hàng nhưng giỏ hàng vẫn rỗng, có lẽ do trình duyệt web của bạn đã tắt chức năng lưu Cookies. Vui lòng kiểm tra cấu hình của trình duyệt web để đảm bảo rằng trình duyệt web của bạn hỗ trợ tốt chức năng lưu Cookies.</p></div></div> </section>
        @endif

    </main>
    @include('user.page.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#change-item-cart").on('click', '.delete-item-cart', function() {
            $.ajax({
                url: '/DeleteItemCart/' + $(this).data('id'),
                type: 'GET',
            }).done(function(response) {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                $('#total-quanty-show').text($('#total-quanty-cart').val());
                alertify.success('Đã xóa thành công');
            });
        });
        function DeleteListItemCart(id) {
            $.ajax({
                url: 'DeleteItemListCart/' + id,
                type: 'GET',
            }).done(function(response) {
                $("#list-cart").empty();
                $("#list-cart").html(response);
                location.reload();
            });
        }
        function AddItemCart(id) {
            $.ajax({
                url: 'AddItemCart/' + id,
                type: 'GET',
            }).done(function(response) {
                location.reload();
                $("#list-cart").empty();
                $("#list-cart").html(response);
            })
        }
        function MinusItemCart(id) {
            var quantityInput = $('#quantity-' + id);
            var currentQuantity = parseInt(quantityInput.val());
            if (currentQuantity > 1) {
                $.ajax({
                    url: 'MinusItemCart/' + id,
                    type: 'GET',
                }).done(function(response) {
                    location.reload();
                    $("#list-cart").empty();
                    $("#list-cart").html(response);
                })
            }
        }
    </script>
</body>
