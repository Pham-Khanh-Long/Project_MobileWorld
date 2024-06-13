<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register/register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/breadcrumb/breadcrumb.css') }}">
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
                <ul class="items-breadcrumb" itemtype="https://schema.org/BreadcrumbList" itemscope="">
                    <li class="breadrumb-home breadrumb-item" itemscope="" itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <a href="{{ route('home') }}" itemprop="item">
                            <span itemprop="name">Trang chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadrumb-item" itemscope="" itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <span itemprop="name">Đăng ký</span>
                        <meta itemprop="position" content="2">
                    </li>
                </ul>
            </div>
        </section>
        <section class="box-title">
            <div class="wrapper">
                <div class="post-title">
                    <h1>Đăng ký</h1>
                </div>
            </div>
        </section>
        <section class="box-content">
            <div class="grid">
                <form action="{{ route('register') }}" id="register-form" method="post" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="action" value="member_register">
                    <div id="box-register" class="box-register">
                        <div class="box-info">
                            <div class="content-left">
                                <div id="field-username" class="form-field field-username required">
                                    <div class="form-label">
                                        <label for="username">Tên đăng nhập</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="text" name="username" value="{{ old('username') }}" required autofocus minlength="4" id="username" class="form-control">
                                    </div>
                                    @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div id="field-email" class="form-field field-email">
                                    <div class="form-label">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control">
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
                                        <input type="password" name="password" required minlength="8" id="password" class="form-control">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div id="field-password_re" class="form-field field-password_re required">
                                    <div class="form-label">
                                        <label for="password_re">Nhập lại mật khẩu</label>
                                    </div>
                                    <div class="form-input">
                                        <input type="password" name="password_confirmation" required minlength="8" id="password_re" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-foot text-center">
                        <div class="box-agree">
                            <input type="checkbox" name="agree" value="1" id="agree" required>
                            <label for="agree">Tôi đã đọc và đồng ý với nội quy, chính sách bảo mật của công ty.</label>
                        </div>
                        <div class="box-button">
                            <button type="reset" class="btn btn-reset">Nhập lại</button>
                            <button type="submit" class="btn btn-send">Đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
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
