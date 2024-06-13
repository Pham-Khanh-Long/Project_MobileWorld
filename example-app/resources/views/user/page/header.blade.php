<header class="header">
    <div class="grid">
        <div class="header-with-search">
            <div class="header__logo">
                <a href="{{ route('home') }}" class="header__logo-link">
                    <img src="https://mobileworld.com.vn/uploads/logo.webp" alt="Mobileworld - Cửa Hàng Điện Thoại Lấy Uy Tín Là Sức Mạnh" class="header__logo-img">
                </a>
            </div>
            <div class="header__search">
                <div class="header__search-input-wrap">
                    <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
                    <div class="header__search-history">
                        <h3 class="header__search-history-heading">
                            Lịch sử tìm kiếm
                        </h3>
                        <ul class="header__search-history-list">
                            <li class="header__search-history-item">
                                <a href=""></a>
                            </li>
                            <li class="header__search-history-item">
                                <a href=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="header__search-btn">
                    <i class="header__search-btn-icon fa fa-search"></i>
                </button>
            </div>

            <ul class="header-icon-list">
                <li class="header-icon__item header-item__hotline">
                        <a href="tel:0828807783" class="icon-hotline">
                            <small> Gọi mua hàng </small>
                            <b>0123 234 222</b>
                        </a>
                </li>
                @guest
                @if (Route::has('login'))
                    <li class="header-icon__item header-item__login">
                        <a class="icon-user" class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                    </li>
                @endif
                @else
                <li class="header-icon__item header-item__user">
                    <a href="{{ route('account') }}" class="icon-user">Thành viên</a>
                    <div class="member-widget-wrap">
                        <ul class="member-widget">
                            <li class="avatar-thumb">
                                <span class="img">
                                    <img src="https://mobileworld.com.vn/uploads/noavatar.png" alt="">
                                </span>
                                <span class="username">@auth{{ auth()->user()->username}} @endauth</span>
                            </li>
                            <li class="item"><a href="{{ route('account') }}">Thông tin tài khoản</a></li>
                            <li class="item"><a href="">Quản lý đơn hàng</a></li>
                            <li class="item"><a href="">Đổi mật khẩu</a></li>
                            <li class="item "><a href="{{ route('signout') }}">Đăng xuất</a></li>
                        </ul>
                    </div>
                </li>
                @endguest
                <li class="header-icon__item header-item__order">
                    <a href="{{ route('oder_check') }}" class="icon-oder">KT Đơn hàng</a>
                </li>
                <li id="order-widget" class="mini-cart-box box-order-widget">
                    <a href="{{route('showCart')}}" class="icon-cart"> <span class="hidden-xs">Giỏ hàng</span>
                        @if(session()->has('Cart') != null)
                        <span id='total-quanty-show' class="total-items">{{session('Cart')->totalQuanty}}</span>
                        @else
                        <span id='total-quanty-show' class="total-items">0</span>
                        @endif
                    </a>

                    <div class="box-mini-cart hidden-xs">
                        <div class="box-mini-cart hidden-xs" id="change-item-cart">
                            @if(session()->has('Cart') != null)
                            <div class="mini-cart-list">
                                <div class="inner">
                                    @foreach(session('Cart')->products as $item)
                                    <div class="mini-cart-item cart-item">
                                        <div class="inner">
                                            <div class="thumb">
                                                <a href="{{route('product_detail',$item['productInfo']->id)}}" class="img-popup" rel="gallery" title="">
                                                    <img src="{{asset($item['productInfo']->main_img)}}"></a></div>
                                            <div class="text">
                                                <a href="{{route('product_detail',$item['productInfo']->id)}}">
                                                    {{$item['productInfo']->title}}
                                                </a>
                                                <div class="item-price">
                                                    {{number_format(($item['productInfo']->discount)*$item['quanty'],0,'.','.') }}₫
                                                </div>
                                            </div>
                                            <div class="delcart">
                                                <div class="item-qty">x {{$item['quanty']}}</div>
                                                <a href="javascript:" data-id="{{$item['productInfo']->id}}" class="delete-item-cart">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mini-cart-total">
                                    <span>Tổng cộng:</span>
                                    <span class="total">{{number_format(session('Cart')->totalPrice,0,'.','.') }}₫</span>
                                    <a href="{{route('showCart')}}" class="ws-btn">Thanh toán</a>
                                </div>
                                <input hidden id="total-quanty-cart" type="number" value="{{session('Cart')->totalQuanty}}">
                            </div>
                            @else
                            <div class="mini-cart-list">
                                <div class="mini-cart-empty">
                                    Giỏ hàng của bạn đang rỗng
                                    <a href="{{route('home')}}">Mua ngay</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
{{-- @endsection --}}
