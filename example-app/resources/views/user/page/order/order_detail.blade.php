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

<main id="ws-content" class="ws-content outer">
    @if(session('Cart'))
    <section class="breadcrumb">
        <div class="grid">
            <ul class="items" itemtype="http://schema.org/BreadcrumbList" itemscope>
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
                <h1>Thông tin đơn hàng</h1>
            </div>
        </div>
    </section>
    <section class="box-content">
        <div class="grid">
            <form action="" method="post" class="cart-inner step2" accept-charset="utf-8">
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
                                        <div class="img"> <a href="{{route('product_detail',$item['productInfo']->id)}}"><img src="{{asset($item['productInfo']->main_img)}}" width="80" height="80" class="img-cover" alt=""></a>
                                            <div class="remove"> <a href="javascript:" onclick="DeleteListItemCart({{$item['productInfo']->id}})" class="remove-item fa-trash-o"></a> </div>
                                        </div>
                                        <div class="txt"> <a href="{{route('product_detail',$item['productInfo']->id)}}">{{$item['productInfo']->title}} - {{$item['productInfo']->memory}}</a>
                                            <div class="dropdown select-option"> Màu sắc : {{$item['productInfo']->color}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="col col-price text-center hidden-xs"> <strong class="price">{{number_format($item['productInfo']->discount,0,'.','.') }}₫</strong> </td>
                                <td class="col col-quantity text-center hidden-xs">
                                    <div class="qty">
                                        <a onclick="MinusItemCart({{$item['productInfo']->id}})" class="btn-press minus fa-minus"></a>
                                        <input type="text" value="{{$item['quanty']}}" required="1" minlength="1" class="quantity" readonly>
                                        <a onclick="AddItemCart({{$item['productInfo']->id}})" class="btn-press plus fa-plus"></a>
                                    </div>
                                </td>
                                <td class="col col-subtotal text-center subtotal hidden-xs">{{number_format(($item['productInfo']->discount)*$item['quanty'],0,'.','.') }}₫</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" class="hidden-xs">
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
                <div class="box box-info">
                    <div class="content-left">
                        <div id="box-dinfo" class="box-dinfo box-customer">
                            <div class="box-head"> <span>Thông tin thanh toán</span> </div>
                            <div class="box-body">
                                <div id="field-d_name" class="form-field field-d_name ">
                                    <div class="form-label"> <label for="d_name">Họ tên</label></div>
                                    <div class="form-input">
                                        <input type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}" id="name" class="form-control">
                                    <small class="form-text text-muted text-danger"><span style="color: red;">{{ $errors->first('name') }}</span></small>
                                    </div>
                                </div>
                                <div id="field-d_phone" class="form-field field-d_phone ">
                                    <div class="form-label"> <label for="d_phone">Điện thoại</label></div>
                                    <div class="form-input">
                                        <input type="text" name="phone_number" value="{{ Auth::check() ? Auth::user()->phone_number : '' }}" id="phone_number" class="form-control">
                                    <small class="form-text text-muted text-danger"><span style="color: red;">{{ $errors->first('phone_number') }}</span></small>

                                </div>
                                </div>
                                <div id="field-d_email" class="form-field field-d_email">
                                    <div class="form-label"> <label for="d_email">Email</label></div>
                                    <div class="form-input">
                                        <input type="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" id="email" class="form-control">
                                        <small class="form-text text-muted text-danger"><span style="color: red;">{{ $errors->first('email') }}</span></small>
                                    </div>

                                </div>
                                <div id="field-d_address" class="form-field field-d_address">
                                    <div class="form-label"> <label for="d_address">Địa chỉ</label></div>
                                    <div class="form-input">
                                        <input type="text" name="address" value="{{ Auth::check() ? Auth::user()->address : '' }}" id="address" class="form-control">
                                        <small class="form-text text-muted text-danger"><span style="color: red;">{{ $errors->first('address') }}</span></small>
                                    </div>
                                    </br>

                                </div>
                                <div id="field-d_address" class="form-field field-d_address">
                                    <div class="form-label"> <label for="d_note">Ghi chú</label></div>
                                    <div class="form-input">
                                        <input type="text" name="note" value="" id="note" class="form-control">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div id="box-payment" class="box box-payment box-table radio">
                    <div class="box-head"> <span>Phương thức thanh toán</span> </div>
                    <div class="box-body">
                        <ul class="items">
                            <li><label class="item"><input type="radio" name="payment" value="cash" checked="checked">
                                    <div class="box-desc">
                                        <h4>Thanh toán COD</h4>
                                        <div>Khách hàng thanh toán tiền mặt khi nhân viên tới giao hàng (áp dụng giao hàng trong nội thành)</div>
                                    </div>
                                </label></li>
                            <li><label class="item"><input type="radio" name="payment" value="transfer">
                                    <div class="box-desc">
                                        <h4>Thanh toán chuyển khoản</h4>
                                        <div>
                                            <p>Thanh toán qua ngân hàng, thông tin chuyển khoản:<br /> <strong>HỆ THỐNG CỬA HÀNG MOBILE WORLD</strong><br /> Tên tài khoản: <strong>Nguyễn Xuân Thành</strong><br /> Số tài khoản: <strong>0855562308</strong><br /> Ngân hàng <strong>Techcombank</strong>&nbsp;- Chi nhánh Thanh Xuân.&nbsp;</p>
                                        </div>
                                    </div>
                                </label></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="box-button text-center">
                    <button type="submit" class="btnCheckout">Hoàn thành</button>
                </div>
            </form>
        </div>
    </section>
    @else
    <section class="box-title"> <div class="grid"> <div class="post-title"> <h1>Giỏ hàng</h1></div> </div> </section>
    <section class="box-content"> <div class="grid"> <div class="cart-empty alert alert-warning no-margin"> <p><strong>Giỏ hàng của bạn đang rỗng.</strong></p> <p>Nếu bạn đã cố gắng thêm sản phảm vào giỏ hàng nhưng giỏ hàng vẫn rỗng, có lẽ do trình duyệt web của bạn đã tắt chức năng lưu Cookies. Vui lòng kiểm tra cấu hình của trình duyệt web để đảm bảo rằng trình duyệt web của bạn hỗ trợ tốt chức năng lưu Cookies.</p></div></div> </section>
    @endif
    @include('user.page.footer')
</main>
<script>
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
