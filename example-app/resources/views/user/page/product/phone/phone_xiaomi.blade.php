@extends('user.page.product.tpl_phone')
@section('breadcrumb')
        <ul class="items-breadcrumb" itemtype="http://schema.org/BreadcrumbList" itemscope>
            <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <a href="{{ route('home')}}" itemprop="item">
                    <span itemprop="name">Trang chủ</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <a href="{{ route('home') }}" itemprop="item">
                    <span itemprop="name">Điện thoại</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li class="breadrumb-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <span itemprop="name">Điện thoại xiaomi</span>
                <meta itemprop="position" content="3">
            </li>
        </ul>
@endsection
@section('content_1')
<ul id="filters" class="filters">
    <li>Lọc danh sách</li>
    <li class="nav-item dropdown-phone">
        <div id="box-filter-brands" class="filter-brands filter-radio">
            <div class="dropdown-toggle-phone">
                <div class="active-phone">Điện thoại</div>
            </div>
            <div class="box-dropdown-menu-phone">
                <ul class="dropdown-menu-phone">
                    <li><a href="{{ route('phone') }}" class="active">Điện Thoại</a></li>
                    <li><a href="{{ route('tablet') }}" class="">Máy tính bảng</a></li>
                </ul>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown-phone">
        <div id="box-filter-brands" class=" filter-brands filter-radio">
            <div class="dropdown-toggle-phone">
                <div class="active">Thương hiệu:</div> <i>Xiaomi</i>
            </div>
            <div class="box-dropdown-menu-phone">
                <ul class="dropdown-menu-phone">
                    <li><a href="{{ route('phone') }}" class="">Tất cả</a></li>
                    <li><a href="{{ route('phone_apple') }}" class="">Apple</a></li>
                    <li><a href="{{ route('phone_samsung') }}" class="">Samsung</a></li>
                    <li><a href="{{ route('phone_xiaomi') }}" class="active">Xiaomi</a></li>
                    <li><a href="{{ route('phone_google') }}" class="">Google</a></li>
                    <li><a href="{{ route('phone_asus') }}" class="">ASUS</a></li>
                </ul>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown-phone">
        <div id="box-filter-brands" class=" filter-brands filter-radio">
            <div class="dropdown-toggle-phone">
                <div class="active">
                    Dung lượng:
                </div>
                @if(Session::get('memory'))
                @if(Session::get('memory')== 1024)
                1TB
                @else
                {{ Session::get('memory') }}GB
                @endif
                @else
                <i>Tất cả</i>
                @endif
            </div>
            <div class="box-dropdown-menu-phone">
                <ul class="dropdown-menu-phone">
                    <li><a href="{{ route('phone_xiaomi')}}" class="{{ request('memory') == '' ? 'active' : '' }}">Tất cả</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory'=>64,'min_price' => Session::get('min_price'),'max_price' => Session::get('max_price'),'sort' => Session::get('sort')])}}" class="{{ request('memory') == 64 ? 'active' : '' }}">64GB</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory'=>128,'min_price' => Session::get('min_price'),'max_price' => Session::get('max_price'),'sort' => Session::get('sort')])}}" class="{{ request('memory') == 128 ? 'active' : '' }}">128GB</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory'=>256,'min_price' => Session::get('min_price'),'max_price' => Session::get('max_price'),'sort' => Session::get('sort')])}}" class="{{ request('memory') == 256 ? 'active' : '' }}">256GB</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory'=>512,'min_price' => Session::get('min_price'),'max_price' => Session::get('max_price'),'sort' => Session::get('sort')])}}" class="{{ request('memory') == 512 ? 'active' : '' }}">512GB</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory'=>1024,'min_price' => Session::get('min_price'),'max_price' => Session::get('max_price'),'sort' => Session::get('sort')])}}" class="{{ request('memory') == 1024 ? 'active' : '' }}">1TB</a></li>
                </ul>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown-phone">
        <div id="box-filter-brands" class=" filter-brands filter-radio">
            <div class="dropdown-toggle-phone">
                <div class="active">Mức giá:</div>
                @if(Session::get('min_price') and Session::get('max_price'))
                @if( Session::get('min_price') == 1 and Session::get('max_price')==2000000 )
                Dưới 2 triệu
                @elseif(Session::get('min_price') == 20000000 and Session::get('max_price')==99999999 )
                Trên 20 Triệu
                @else
                {{ Session::get('min_price')/1000000 }} - {{ Session::get('max_price')/1000000 }} Triệu
                @endif
                @else
                <i>Tất cả</i>
                @endif
            </div>
            <div class="box-dropdown-menu-phone">
                <ul class="dropdown-menu-phone">
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'), 'min_price' => '', 'max_price' => '','sort' => Session::get('sort')])}}" class="{{( request('min_price') == '' and request('max_price') == '') ? 'active' : '' }}">Tất cả</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'),'min_price' => 1, 'max_price' => 2000000,'sort' => Session::get('sort')])}}" class="{{( request('min_price') == 0 and request('max_price') == 2000000) ? 'active' : '' }}">Dưới 2 triệu</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'),'min_price' => 2000000, 'max_price' => 4000000,'sort' => Session::get('sort')])}}" class="{{( request('min_price') == 2000000 and request('max_price') == 4000000) ? 'active' : '' }}">Từ 2-4 triệu</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'),'min_price' => 4000000, 'max_price' => 7000000,'sort' => Session::get('sort')])}}" class="{{( request('min_price') == 4000000 and request('max_price') == 7000000) ? 'active' : '' }}">Từ 4-7 triệu</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'),'min_price' => 7000000, 'max_price' => 13000000,'sort' => Session::get('sort')])}}" class="{{( request('min_price') == 7000000 and request('max_price') == 13000000) ? 'active' : '' }}">Từ 7-13 triệu</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'),'min_price' => 13000000, 'max_price' => 20000000,'sort' => Session::get('sort')])}}" class="{{( request('min_price') == 13000000 and request('max_price') == 20000000) ? 'active' : '' }}">Từ 13-20 triệu</a></li>
                    <li><a href="{{ route('phone_xiaomi',['memory' => Session::get('memory'),'min_price' => 20000000, 'max_price' => 99999999,'sort' => Session::get('sort')])}}" class="{{( request('min_price') == 20000000 and request('max_price') == 99999999) ? 'active' : '' }}">trên 20 triệu</a></li>
                </ul>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown-phone">
        <div id="box-filter-brands" class=" filter-brands filter-radio">
            <div class="dropdown-toggle-phone">
                <div class="active">Xếp theo:</div> <i>Tất cả</i>
            </div>
            <div class="box-dropdown-menu-phone">
                <ul class="dropdown-menu-phone">
                    <li><a href="" class="active">Mới nhất</a></li>
                    <li><a href="" class="">Giá thấp đến cao</a></li>
                    <li><a href="" class="">Giá cao đến thấp</a></li>
                </ul>
            </div>
        </div>
    </li>
</ul>
<!-- Dưới lọc danh sách -->
<ul id="series" class="series">
   <!-- Dưới lọc danh sách -->
<ul id="series" class="series">
    <li><a href="{{ route('phone_xiaomi',['title'=> 'mi 13'])}}" class="{{ request('title') == 'mi 13'  ? 'active' : '' }}">Xiaomi 13 Series</a></li>
    <li><a href="{{ route('phone_xiaomi',['title'=> 'mi K60'])}}" class="{{ request('title') == 'mi K60'  ? 'active' : '' }}" >Redmi K60 Series</a></li>
    <li><a href="{{ route('phone_xiaomi',['title'=> 'mi 12'])}}" class="{{ request('title') == 'mi 12'  ? 'active' : '' }}" >Xiaomi 12 Series</a></li>
    <li><a href="{{ route('phone_xiaomi',['title'=> 'mi K50'])}}" class="{{ request('title') == 'mi K50'  ? 'active' : '' }}" >Redmi K50 Series</a></li>
    <li><a href="{{ route('phone_xiaomi',['title'=> 'mi note'])}}" class="{{ request('title') == 'mi note'  ? 'active' : '' }}" >Redmi Note 12 Series</a></li>
    <li><a href="{{ route('phone_xiaomi',['title'=> 'Shark 5'])}}" class="{{ request('title') == 'Shark 5'  ? 'active' : '' }}" >Black Shark 5 Series</a></li>
</ul>
</ul>
@foreach($manufacturers as $manufacturer)
<section id="box-product_brand-4" class="outer box-table">
    @php
    $list_product = [];
    $product_count = 0;
    foreach($products as $product)
    {
        if ($product->manufacturer_id == $manufacturer->id)
        {
            $list_product[]=$product;
            $product_count++;
        }
    }
    @endphp
    <div class="wrapper">
        <div class="box-inner">
            <div class="box-head">
                <h2 class="name">
                    {{count($list_product)}}
                    {{$categories[0]->name}}
                    Xiaomi
                </h2>
            </div>
            <div class="box-body">
                <div class="products">
                    @if ($product_count > 0)
                        @for ($product = 0; $product < count($list_product); $product++)
                            @if ($list_product[$product]->manufacturer_id == $manufacturer->id)
                                <div class="product" data-product_id="360">
                                    <!-- Hình ảnh  -->
                                    <div class="img img-center">
                                        <a href="{{ route('product_detail',$list_product[$product]->id)}}" title="">
                                            <img width="220" height="220" class="lazyload zoom-img" src="{{asset($list_product[$product]->main_img)}}">
                                        </a>
                                    </div>
                                    <!-- Tên và giá tiền -->
                                    <div class="txt">
                                        <!-- tên -->
                                        <h2 class=pname>
                                            <a href="{{ route('product_detail',$list_product[$product]->id)}}">
                                                {{$list_product[$product]->title}}</a>
                                        </h2>
                                        <!-- giá -->
                                        <ul class="price-text price-html" data-stock="1">
                                            <li class="price"> {{number_format($list_product[$product]->discount,0,'.','.') }}₫</li>
                                        </ul>
                                        @php
                                        $feed_back = null;
                                        foreach($feed_back_products as $row)
                                        {
                                            if($row->id == $list_product[$product]->id){
                                            $feed_back = $row;
                                        }
                                        }
                                        @endphp
                                        <!-- đánh giá -->
                                        @if($feed_back)
                                        <div class="star-wrap">
                                            <b>
                                                {{round($feed_back -> star,1)}}
                                            </b>/5
                                            <i class="fa fa-star"></i>
                                            <div class="numvote">{{$feed_back -> count}} đánh giá</div>
                                        </div>
                                        @else
                                            <div class="star-wrap"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endfor
                    @else
                        <!-- Hiển thị thông báo không có sản phẩm -->
                        <div class="noitem alert alert-warning">Không có sản phẩm nào.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<script>
   document.addEventListener("DOMContentLoaded", function() {
    var dropdownToggles = document.querySelectorAll('.dropdown-toggle-phone');

    // Thêm sự kiện lắng nghe cho sự kiện click trên cả trang
    document.addEventListener('click', function(event) {
        // Lặp qua mỗi dropdown-toggle-phone để kiểm tra xem sự kiện click có xảy ra trên dropdown hiện tại không
        dropdownToggles.forEach(function(dropdownToggle) {
            if (event.target.closest('.dropdown-toggle-phone') !== dropdownToggle) {
                // Nếu sự kiện click không xảy ra trên dropdown hiện tại, ẩn dropdown menu tương ứng (nếu nó đang mở)
                var dropdownMenu = dropdownToggle.nextElementSibling;
                dropdownMenu.style.display = 'none';
            }
        });
    });

    dropdownToggles.forEach(function(dropdownToggle) {
        dropdownToggle.addEventListener('click', function() {
            var dropdownMenu = this.nextElementSibling;

            // Ẩn tất cả các dropdown menu trước khi mở dropdown mới
            dropdownToggles.forEach(function(dropdown) {
                var menu = dropdown.nextElementSibling;
                if (menu !== dropdownMenu) {
                    menu.style.display = 'none';
                }
            });

            // Toggle hiển thị của dropdown menu
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
    });
});



</script>
@endsection
