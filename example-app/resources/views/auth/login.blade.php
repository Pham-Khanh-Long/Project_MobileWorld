
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/login/login.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
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
    {{-- @yield('css') --}}
</head>
<body>
    <main id="ws-content" class="ws-content outer">
        <section class="breadcrumb">
            <div class="grid">
                <ul class="items-breadcrumb" itemtype="https://schema.org/BreadcrumbList" itemscope="">
                    <li class="breadrumb-home breadrumb-item" itemscope="" itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <a href="{{ route('home') }}" itemprop="item">
                            <span itemprop="name">Trang chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadrumb-item" itemscope="" itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <span itemprop="name">Đăng nhập</span>
                        <meta itemprop="position" content="2">
                    </li>
                </ul>
            </div>
        </section>
        <section class="box-title">
            <div class="grid">
                <div class="post-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
        </section>
        <section class="box-content">
            <div class="grid">
                <form action="{{ route('login.submit') }}" id="login-form" method="post" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="action" value="member_login">
                    <div id="box-login" class="box box-info box-login">
                        <div class="content-left">
                            <div id="field-username" class="form-field field-username required">
                                <div class="form-label">
                                    <label for="email">Nhập email</label>
                                </div> <div class="form-input">
                                    <input type="text" name="email" value="" required autofocus="1" minlength="4" id="username" class="form-control">
                                </div>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div id="field-password" class="form-field field-password required">
                                <div class="form-label">
                                    <label for="password">Mật khẩu</label>
                                </div>
                                <div class="form-input">
                                    <input type="password" name="password" value="" required="1" minlength="4" id="password" class="form-control">
                                </div>
                                @if ($errors->has('password'))
                                <span class="text-danger password">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div id="field-remember" class="form-field field-remember rememberme">
                                <div class="form-label">
                                    <input type="checkbox" name="remember" value="1" id="remember">
                                    <label for="remember">Ghi nhớ đăng nhập</label>
                                </div>
                                <div class="form-input">
                                    <a href="" class="pull-right">
                                        Bạn quên mật khẩu?
                                    </a>
                                </div>
                            </div>
                            <div id="field-button" class="form-field field-button buttons">
                                <button type="submit">Đăng nhập</button>
                            </div>
                            {{-- <div id="field-solcial" class="form-field field-solcial socials text-center hide">
                                <div class="line">
                                    <span>Hoặc đăng nhập bằng</span>
                                </div>
                                <div class="icon">
                                    <img src="https://mobileworld.com.vn/ws-content/themes/mobileworld/assets/images/fb-login.png" id="fb-login" class="icon" alt="Facebook Login">
                                    <div id="gg-login"></div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="content-right">
                            <div class="box-note">
                                <div class="entry">
                                    <h3>Nếu bạn chưa là thành viên? Đăng ký ngay để:</h3>
                                    <ul>
                                        <li>Được hưởng đầy đủ các ưu đãi mua hàng</li>
                                        <li>Cập nhật thông tin sản phẩm mới, tin tức ngành, tin khuyến mại</li>
                                        <li>Cập nhật giá sản phẩm, báo giá hàng ngày</li>
                                        <li>Theo dõi quản lý đơn hàng, điểm thưởng mua hàng</li>
                                        <li>Ưu đã bảo hành, giảm giá mua hàng và phí dịch vụ</li>
                                    </ul>
                                </div>
                                <div class="btn-link">
                                    <a href="{{ 'register' }}">Đăng ký ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    @include('user.page.footer')
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
</body>
</html>

