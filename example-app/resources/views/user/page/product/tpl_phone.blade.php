<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Điện thoại</title>
    <link href="https://mobileworld.com.vn/uploads/favicon.webp?v=230317" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/tpl_phone/tpl_phone.css">
    <link rel="stylesheet" href="./assets/css/phone_apple/phone_apple.css">
    <link rel="stylesheet" href="./assets/css/breadcrumb/breadcrumb.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    @include('user.page.header')
    @include('user.page.nav')
</head>
<body>
    <main id="ws-content" class="ws-content outer">
        <section class="breadcrumb">
            <div class="grid">
            @yield('breadcrumb')
            </div>
        </section>
        <form action="" class="form-filter" method="post" accept-charset="utf-8">
            {{-- <input type="hidden" name="do_submit" value="1">
            <input type="hidden" name="show_more" value="0">
            <input type="hidden" name="count" value="97">
            <input type="hidden" name="show" value="20">
            <input type="hidden" name="pagenow" value="product_category_brand">
            <input type="hidden" name="sort" value="default">
            <input type="hidden" name="cats" value="6">
            <input type="hidden" name="tags" value="0">
            <input type="hidden" name="brands" value="4">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="prices" value="0">
            <input type="hidden" name="options" value="0">
            <input type="hidden" name="keyword" value="">
            <input type="hidden" name="promotion" value="0">
            <input type="hidden" name="series_id" value="0">
            <input type="hidden" name="action" value="product_load_more">
            <input type="hidden" name="redirect" value="https://mobileworld.com.vn/dien-thoai-iphone.html"> --}}
            <div class="grid">
                <div class="box-brands">
                    <a href="{{ route('phone_apple') }}" class="brand-item" title="Điện thoại iPhone">
                        <img src="https://mobileworld.com.vn/uploads/product/brand/thumbs/apple.webp" width="100" height="30" alt="Điện thoại iPhone">
                    </a>
                        <a href="{{ route('phone_samsung') }}" class="brand-item" title="Điện thoại Samsung">
                            <img src="https://mobileworld.com.vn/uploads/product/brand/thumbs/samsung.webp" width="100" height="30" alt="Điện thoại Samsung">
                    </a>
                        <a href="{{ route('phone_google') }}" class="brand-item" title="Điện thoại Google">
                            <img src="https://mobileworld.com.vn/uploads/product/brand/thumbs/google.webp" width="100" height="30" alt="Điện thoại Google">
                    </a>
                        <a href="{{ route('phone_xiaomi') }}" class="brand-item" title="Điện thoại Xiaomi">
                            <img src="https://mobileworld.com.vn/uploads/product/brand/thumbs/xiaomi.webp" width="100" height="30" alt="Điện thoại Xiaomi">
                    </a>
                        <a href="{{ route('phone_asus') }}" class="brand-item" title="Điện thoại Asus">
                            <img src="https://mobileworld.com.vn/uploads/product/brand/thumbs/asus.webp" width="100" height="30" alt="Điện thoại Asus">
                    </a>
                </div>

                @yield('content_1')

                 <!-- Câu hỏi thường gặp -->
                <div id="box-faqs" class="box-faqs">
                    <div class="box-faqs-global">
                        <div class="box-title"> Câu hỏi thường gặp</div>
                        <div class="box-content">
                            <div class="panel-group" id="accordion-faqs">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a href="#collapseOne-889" data-toggle="collapse" data-parent="#accordion-faqs" aria-expanded="false">Mobileworld có hỗ trợ giao hàng tận nhà không?</a> </h4>
                                    </div>
                                    <div id="collapseOne-889" class="panel-collapse collapse">
                                        <div class="panel-body entry">
                                            <ul>
                                                <li>Chúng tôi chấp nhận giao hàng tận nơi đến các tỉnh thành trên toàn quốc. Chi phí vận chuyển sẽ được chúng tôi tính toán theo chi tiết của từng đơn hàng, và sẽ thông báo rõ ràng với bạn ngay khi chúng tôi liên hệ xác nhận đơn hàng của bạn.</li>
                                                <li>Trong một số trường hợp hàng không có sẵn trong kho, chúng tôi sẽ chủ động thông báo thời gian gửi hàng cho bạn</li>
                                                <li>Thời gian giao hàng từ 3-7 ngày ngay khi chúng tôi xác nhận hàng đã có sẵn (không tính các ngày nghỉ cuối tuần và lễ tết)</li>
                                            </ul>
                                            <p>Mời bạn xem chi tiết tại đây:&nbsp;<a href="/chinh-sach-thanh-toan-giao-hang.html">https://mobileworld.com.vn/chinh-sach-thanh-toan-giao-hang.html&nbsp;</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    @include('user.page.footer')
</body>
</html>

<script>
    $("#change-item-cart").on('click', '.delete-item-cart', function() {
        $.ajax({
            url: 'DeleteItemCart/' + $(this).data('id'),
            type: 'GET',
        }).done(function(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $('#total-quanty-show').text($('#total-quanty-cart').val());
            alertify.success('Đã xóa thành công');
        });
    });
</script>
