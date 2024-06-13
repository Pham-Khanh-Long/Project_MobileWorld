
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
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product_detail/product_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('user.page.header')
    @include('user.page.nav')
</head>
<body>
<main id="ws-content_product_detail" class="ws-content outer">
        <section class="breadcrumb">
            <div class="grid">
                <ul class="items-breadcrumb" itemtype="http://schema.org/BreadcrumbList" itemscope>
                    <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <a href="{{ route('home')}}" itemprop="item">
                            <span itemprop="name">Trang chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <a href="{{ route('phone') }}" itemprop="item">
                            <span itemprop="name">{{ $category->name }}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <span itemprop="name"> {{$product->title}}</span>
                        <meta itemprop="position" content="3">
                    </li>
                </ul>
            </div>
        </section>
        @if(session('success'))
        <div class="alert alert-info">{{ session('success') }}</div>
        @endif
        <div class="box-head">
            <div class="grid">
                <div class="box-pname">
                    <h1>{{$product->title}}</h1>
                    @php
                    $feed_back = null;
                    foreach($feed_back_products as $row)
                    {
                        if($row->id == $product->id)
                        {
                            $feed_back = $row;
                        }
                    }
                    @endphp
                   <div class="post-meta">
                    <div class="star-wrap">
                        @if($feed_back)
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <div class="numvote">{{$feed_back -> count}} đánh giá</div>
                        @else
                        <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                        @endif
                    </div>
                    <div class="post-meta-brand"> Thương hiệu:
                        <a href="">{{$manufacturer->name}}</a></div>
                </div>
                </div>
                <div class="content-primary">
                    <div id="box-galleries" class="box-galleries">
                        <div id="slider-for">
                            <div class="slider-for">
                                <img width="460" height="460" alt="iPhone 14" class="lazyload" src="{{asset($product->main_img)}}" data-toggle="modal" data-target="#largerImageModal">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal fade custom-modal" id="largerImageModal" tabindex="-1" role="dialog" aria-labelledby="largerImageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img width="1000" height="1000" src="/storage/images/EAA6CeifM3jdZkaEPyjQewZAbRYNMagRLOnfHp2d.webp" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <script>
                        $(document).ready(function() {
                            $('#largerImageModal').modal();
                        });
                    </script> --}}
                    <form action="" id="box-info" class="box-info" method="post" accept-charset="utf-8"> <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="add-to-cart" value="360">
                        <div class="box-price-html">
                            <ul class="price-html-ul">
                                <li> <span class="price">{{number_format($product->discount,0,'.','.') }}₫</span> </li>
                            </ul>
                        </div>
                        <div class="box-product-group">
                            <label>Phiên bản</label>
                            <ul class="items_detail">
                                <li>
                                    <a href="" class=active>
                                        <span class="item-name">{{$product->memory}}</span>
                                        <span class="item-price">{{number_format($product->discount,0,'.','.') }}₫</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="box-product-group flex">
                            <label>Màu</label>
                            <ul class="items_detail">
                                <li>
                                    <a href="" class="item active" data-pa_id="5" data-code="24">
                                    <span class="item-image">
                                        <img src="{{asset($product->main_img)}}" width="80" height="80" class="img-cover" alt="iPhone 14 Pro Max 128GB Mới Fullbox - Đen">
                                    </span>
                                        <span class="item-name">{{$product->color}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @if($product->quantity > 0)
                        <div class="box-buttons tragop">
                            <div class="button-action button-buynow">
                                <button type="button" class="button add-to-cart buynow" onclick="AddCartNow({{ $product->id }})">
                                    <span class="row0">Mua ngay</span>
                                    <small>Giao tận nhà (COD) hoặc Nhận tại cửa hàng</small>
                                </button>
                            </div>
                            <div class="button-action button-addcart">
                                <div class="button-action button-addcart">
                                    <a type="button" class="button add-to-cart ajax" onclick="AddCart({{$product->id}})" href="javascript:">
                                        <span>Thêm vào giỏ hàng</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="box-buttons stock-1">
                            <div class="button-action button-contact widefat">
                                <a href="tel:xxxx" class="button">
                                    <span class="row0">Liên hệ</span>
                                    <small>Hotline: xxxxx</small>
                                </a>
                            </div>
                        </div>
                    @endif
                        <div class="box-promotion widget"> <label>Khuyến mãi</label>
                            <div class="box-gift">
                                <p><em><strong>✔️&nbsp;</strong></em><em><strong>Hỗ trợ thu cũ đổi mới</strong></em></p>
                                <p><em><strong>✔️</strong></em><em><strong> Mua kèm airpods pro chính hãng giá chỉ 4.190.000</strong></em></p>
                                <p><em><strong>✔️</strong></em><em><strong> Mua Apple AirPods 2 chính hãng giá chỉ 2.790.000đ</strong></em></p>
                                <p><em><strong>✔️</strong></em><em><strong> Mua củ sạc 18W chính hãng giá chỉ 350.000đ</strong></em></p>
                            </div>
                        </div>
                    </form>
                    <div id="box-widgets" class="box-widgets">
                        <div id="box-scroll-fixed" class="box-scroll-fixed">
                            <div id="box-sidebar" class="widget box-sidebar">
                                <div class="widget-title"> Thông số kỹ thuật </div>
                                <div class="widget-content">
                                    <div class="options">
                                        <ul class="items_detail">
                                            <li><strong>Kích thước</strong>: <span>{{ $data_summary['kich_thuoc'] }}</span></li>
                                            <li><strong>Độ phân giải</strong>: <span>{{ $data_summary['do_phan_giai'] }}</span></li>
                                            <li><strong>Hệ điều hành</strong>: <span>{{ $data_summary['he_dieu_hanh'] }}</span></li>
                                            <li><strong>CPU</strong>: <span>{{ $data_summary['cpu'] }}</span></li>
                                            <li><strong>Ram</strong>: <span>{{ $data_summary['ram'] }}</span></li>
                                            <li><strong>Bộ nhớ trong</strong>: <span>{{ $data_summary['bo_nho_trong'] }}</span></li>
                                            <li><strong>Dung lượng pin</strong>: <span>{{ $data_summary['dung_luong_pin'] }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-address widget">
                            <div class="widget-title">Xem cửa hàng gần bạn</div>
                            <div class="widget-content">
                                <ul class="items_detail">
                                    <li>
                                        <span class="row0">Mộ Lao, Hà Đông, Tp.HN</span>
                                        <strong class="row1">Hotline: 0855562308</strong>
                                    </li>
                                    <li>
                                        <strong class="row0">Kho online</strong>
                                        <span class="row1">
                                            <p>Giao hàng trong 3h - 3 ngày<br>
                                                <strong>
                                                    Hotline:
                                                    <a href="tel:0855562308">0855562308</a>
                                                </strong>
                                            </p>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-foot">
            <div class="grid">
                <div class="box-compare">
                    <div class="compare-search">
                        <label for="s">Sản phẩm tương tự</label>
                        <div class="compare-search-inner dropdown">
                            <div class="results dropdown-menu"></div>
                        </div>
                    </div>
                    <!-- Sảm phẩm tương tự  -->
                    <div class="box-product-compare box-table">
                        <div class="box-body">
                            <div class="products">
                                @foreach($similar_products as $similar_product)
                                <div class="product">
                                    <!-- Hình ảnh -->
                                    <div class="img img-center">
                                        <a href="{{ route('product_detail', $similar_product->id) }}" title="">
                                            <img width="220" height="220" class="lazyload_similarproduct zoom-img" src="{{ asset($similar_product->main_img) }}">
                                        </a>
                                    </div>
                                    <!-- Tên và giá tiền -->
                                    <div class="txt">
                                        <!-- Tên -->
                                        <h2 class="pname">
                                            <a href="{{ route('product_detail', $similar_product->id) }}">
                                                {{ $similar_product->title }}
                                            </a>
                                        </h2>
                                        <!-- Giá -->
                                        <ul class="price-text price-html" data-stock="1">
                                            <li class="price">{{ number_format($similar_product->discount, 0, '.', '.') }}₫</li>
                                        </ul>
                                        <!-- Đánh giá sản phẩm -->
                                        @php
                                        $feed_back = $feed_back_products->firstWhere('id', $similar_product->id);
                                        @endphp
                                        @if($feed_back)
                                        <div class="star-wrap">
                                            <b>{{ round($feed_back->star, 1) }}</b>/5
                                            <i class="fa fa-star"></i>
                                            <div class="numvote">{{ $feed_back->count }} đánh giá</div>
                                        </div>
                                        @else
                                        <div class="star-wrap">
                                            <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <section id="box-product-focus" class="box-table">
                    <div class="grid">
                        <div class="box-inner">
                            <div class="box-head">
                                <div class="box-head__name box-head_name_detail">
                                    <div class="ws-name">
                                        Sản phẩm nổi bật
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="products">
                                    @for($i = 0; $i < min(5, count($feed_back_products)); $i++)
                                        @if($feed_back_products[$i]->count > 0 && $feed_back_products[$i]->star > 0)
                                        @php
                                        $featured_products = null;
                                        foreach($product_all as $product)
                                        {
                                            if ($feed_back_products[$i]->id == $product->id)
                                            {
                                                $featured_products = $product;
                                            }
                                        }
                                        @endphp
                                        <div class="product">
                                            <div class="img img-center">
                                                <a href="{{ route('product_detail',$featured_products->id)}}" title="">
                                                    <img alt="" title="" width="220" height="220" class="lazyload" src="{{asset($featured_products->main_img)}}">
                                                </a>
                                            </div>
                                            <div class="txt">
                                                <h2 class=pname>
                                                    <a href="{{ route('product_detail',$featured_products->id)}}">
                                                        {{$featured_products->title}} </a>
                                                </h2>
                                                <ul class="price-text price-html">
                                                    <li class="price">{{number_format($featured_products->discount,0,'.','.') }}₫</li>
                                                </ul>
                                                <div class="star-wrap"><b>{{round($feed_back_products[$i]->star,1)}}</b>/5 <i class="fa fa-star"></i>
                                                    <div class="numvote">{{$feed_back_products[$i]->count}} đánh giá</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div id="box-reviews" class="widget box-reviews">
                    <div class="widget-title"> Bình luận về {{$product_feed_back->title}}</div>
                    <div class="widget-content">
                        <div class="extCMT">
                            <div id="box-comment" class="box-comment">
                                <div class="comment-title">
                                    <span id="cmt-totals" onclick="CMT.scrollTop()">
                                        {{count($feed_back_product)}} Bình luận</span>
                                </div>
                                <div class="inner">
                                    <div class="comment-form form-comment">
                                        <form action="{{route('product_detail_store',['product_id' => $product_feed_back->id] )}}" method="post" class="cmt-form" id="form-feed-back" accept-charset="utf-8">
                                            @csrf
                                            <textarea name="content" cols="40" rows="5" required="1" id="comment-text" class="form-control" placeholder="Nhập nội dung bình luận *"></textarea>
                                            <div class="comment-hide">
                                                <div class="comment-info-wrap">
                                                    <div class="row01">
                                                        <div class="comment-name column">
                                                            <input type="text" name="name" value="" required="1" id="comment-name" autocomplete="off" class="form-control" placeholder="Họ tên *">
                                                        </div>
                                                        @if ($errors->has('name'))
                                                        <small class="form-text text-muted">{{ $errors->first('name') }}</small>
                                                        @endif
                                                        <div class="comment-phone column">
                                                            <input type="text" name="phone_number" value="" id="comment-phone" class="form-control" placeholder="Điện thoại">
                                                        </div>
                                                        @if ($errors->has('phone_number'))
                                                        <small class="form-text text-muted">{{ $errors->first('phone_number') }}</small>
                                                        @endif
                                                        <div class="comment-phone column">
                                                            <input type="email" name="email" value="" id="comment-email" class="form-control" placeholder="Email">
                                                        </div>
                                                        @if ($errors->has('email'))
                                                        <small class="form-text text-muted">{{ $errors->first('email') }}</small>
                                                        @endif
                                                        <div class="comment-btn column">
                                                            <button type="submit" class="ws-btn">Gửi bình luận</button>
                                                        </div>

                                                    </div>
                                                    <div class="row02">
                                                        <div class="box-comment-vote">
                                                            <ul class="comment-vote">
                                                                <li class="vote-title">Điểm đánh giá của bạn về sản phẩm này:</li>
                                                                <li class="votes">
                                                                    <select name="star" id="star-select">
                                                                        <option value="">Đánh giá</option>
                                                                        @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }} Sao
                                                                            </option>
                                                                            @endfor
                                                                    </select>
                                                                    @if ($errors->has('star'))
                                                                    <small class="form-text text-muted">{{ $errors->first('star') }}</small>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="cmt-list" class="box">
                                        <div id="list-comment" class="comment-list">
                                            @if($feed_back_product)
                                            @php
                                            $feed_back_product = $feed_back_product->reverse();
                                            @endphp
                                            @foreach($feed_back_product as $row)

                                            <div id="comment-4411" class="comment-item cmt-parent">
                                                <div class="inner">
                                                    <div class="commentAvatar guest">
                                                        <div class="avatar" style="width:40px; height:40px;"><span class="iconcom-user">{{substr($row->name, 0, 1)}}</span></div>
                                                    </div>
                                                    <div class="commentBody">
                                                        <div class="commentName">
                                                            <span class="name">{{$row->name}}</span>
                                                            <span class="star-wrap">
                                                                @for( $i=1 ; $i <= $row->star; $i++)
                                                                    <i class="fa fa-star"></i>
                                                                    @endfor
                                                                    @for( $j=1 ; $j <= 5- ($row->star) ; $j++)
                                                                        <i class="fa fa-star-o"></i>
                                                                        @endfor
                                                            </span>
                                                        </div>
                                                        <div class="commentText">{{$row->content}}</div>
                                                        <ul class="commentInfo">
                                                            <li class="commentDate last">
                                                                <span class="commentDate">
                                                                    {{$row->time_diff}} </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <script>
        $('.product').on('click', function() {
            // Lấy thông tin của sản phẩm đã chọn
            var productId = $(this).data('product_id');
            var productName = $(this).find('.pname a').text();

            // Thay thế thông tin của sản phẩm đang xem ở phần "box-head"
            $('.box-head .box-pname h1').text(productName);
            $('.box-head .box-price-html .price').text(productPrice);

            // Ẩn sản phẩm đã chọn trong phần "Sản phẩm tương tự"
            $(this).hide();

            // Hiện sản phẩm đang xem ở phần "box-head"
            $('.box-head').show();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function AddCart(id) {
            $.ajax({
                url: '/AddCart/' + id,
                type: 'GET',
            }).done(function(response) {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                $('#total-quanty-show').text($('#total-quanty-cart').val());
                alertify.success('Đã thêm thành công vào giỏ hàng');
            });
        }
        function AddCartNow(id) {
            $.ajax({
                url: '/AddCartNow/' + id, // Đường dẫn đến hàm xử lý ở phía backend
                type: 'GET',
            }).done(function(response) {
                // Chuyển hướng người dùng đến trang order_detail sau khi thêm vào giỏ hàng thành công
                window.location.href = "{{ route('order_detail') }}";
            }).fail(function(jqXHR, textStatus, errorThrown) {
                // Hiển thị thông báo lỗi nếu có lỗi xảy ra trong quá trình xử lý
                console.error("AJAX Request Failed: " + textStatus, errorThrown);
                alert("Có lỗi xảy ra khi thực hiện yêu cầu. Vui lòng thử lại sau.");
            });
        }
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
    </script>
</main>
@include('user.page.footer')
</body>
