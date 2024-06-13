<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kiểm tra đơn hàng</title>
    <link href="https://mobileworld.com.vn/uploads/favicon.webp?v=230317" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/oder_check/oder_check.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('user.page.header')
    @include('user.page.nav')
</head>
<body>
    <main id="ws-content" class="ws-content outer">
        {{-- <section class="breadcrumb">
            <div class="wrapper">
                <ul class="items" itemtype="http://schema.org/BreadcrumbList" itemscope="">
                    <li class="breadrumb-home breadrumb-item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"> <a href="https://mobileworld.com.vn" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadrumb-item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"> <span itemprop="name">Kiểm tra đơn hàng</span>
                        <meta itemprop="position" content="1">
                    </li>
                </ul>
            </div>
        </section> --}}
        <section class="box-title">
            <div class="grid">
                <div class="post-title">
                    <h1>Kiểm tra đơn hàng</h1>
                </div>
            </div>
        </section>
        <section class="box-content">
            <div class="grid">
                <div class="entry"> Nhập mã đơn hàng hoặc số điện thoại để kiểm tra đơn hàng của bạn.</div>
                <div class="entry-form">
                    <form action="" method="post" class="form-wrap" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="XjXDhi9tJ9nwFPbzeyWAPBMwtDqCCKdzNPT5LtHs">
                        <div class="form-field required last">
                            {{-- <div class="form-label hidden-xs hide"> <label for="code">Mã đơn hàng</label></div> --}}
                            <div class="form-input">
                                <input type="text" name="code" value="" id="code" required="1" autofocus="1" class="form-control" placeholder="Vui lòng nhập mã đơn hàng *"> </div>

                            <div class="form-submit">
                                <input type="submit" value="Kiểm tra" class="button btn-icon btn-primary"> </div>
                        </div>
                    </form>
                    <div class="order-empty hide"> </div>
                </div>
            </div>
        </section>
    </main>
    @include('user.page.footer')
</body>
