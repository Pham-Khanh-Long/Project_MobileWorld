<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tài khoản</title>
    <link href="https://mobileworld.com.vn/uploads/favicon.webp?v=230317" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/account/acc.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/breadcrumb/breadcrumb.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('user.page.header')
    @include('user.page.nav')
</head>
<body>
    <main id="ws-content" class="ws-content outer">
        <section class="breadcrumb">
            <div class="grid">
                <ul class="items-breadcrumb" itemtype="http://schema.org/BreadcrumbList" itemscope>
                    <li class="breadrumb-home breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <a href="" itemprop="item">
                            <span itemprop="name">Trang chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem"> <span itemprop="name">Tài khoản</span>
                        <meta itemprop="position" content="2">
                    </li>
                </ul>
            </div>
        </section>
    </main>
    <section class="box-title">
        <div class="grid">
            <ul class="nav-step step-by-step">
                <li><a href="{{ route('account') }}" class="icon-account active">Thông tin tài khoản</a></li>
                <li><a href="" class="icon-userorder">Quản lý đơn hàng</a></li>
                <li><a href="" class="icon-changepass">Đổi mật khẩu</a></li>
                <li><a class="icon-logout fa-sign-out" href="{{ route('signout') }}">Đăng xuất</a></li>
            </ul>
        </div>
    </section>
    <section class="box-content">
        <div class="grid">
            <form action="{{ route('acc_update', $user->id) }}" class="account-form" method="post">
                @method('PATCH')
                @csrf
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="form-wrap">
                    <div class="col-left">
                        <div class="avatar">
                            <img class="avatar-img" src="https://mobileworld.com.vn/uploads/noavatar.png">
                        </div>
                    </div>
                    <div class="account col-right">
                        <div id="field-username" class="form-field field-username fa-user">
                            <input type="text" name="username" value="{{ $user->username }}" required="1" autofocus="1" minlength="2" id="username" class="form-control">
                            @if ($errors->has('username'))
                                <small class="form-text text-muted">{{ $errors->first('username') }}</small>
                            @endif
                        </div>
                        <div id="field-address" class="form-field field-address fa-map-marker">
                            <input type="text" name="address" value="{{ $user->address }}" id="address" class="form-control">
                            @if ($errors->has('address'))
                                <small class="form-text text-muted">{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                        <div id="field-phone" class="form-field field-phone fa-phone">
                            <input type="text" name="phone_number" value="{{ $user->phone_number }}" id="phone" class="form-control">
                            @if ($errors->has('phone_number'))
                                <small class="form-text text-muted">{{ $errors->first('phone_number') }}</small>
                            @endif
                        </div>
                        <div id="field-user_email" class="form-field field-user_email fa-envelope-o">
                            <input type="email" name="email" value="{{ $user->email }}" required="1" id="user_email" class="form-control">
                            @if ($errors->has('email'))
                                <small class="form-text text-muted">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <button type="submit" class="button btn-save">Lưu thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('user.page.footer')
</body>
