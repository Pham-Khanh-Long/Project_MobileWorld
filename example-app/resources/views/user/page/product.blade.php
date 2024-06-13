{{-- Sản phẩm nổi bật --}}
<section id="box-product-focus" class="box-table">
    <div class="grid">
        <div class="box-inner">
            <div class="box-head">
                <div class="box-head__name">
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
                                $featured_product = null;
                                foreach($products as $product) {
                                    if ($feed_back_products[$i]->id == $product->id) {
                                        $featured_product = $product;
                                        break;
                                    }
                                }
                            @endphp
                            @if($featured_product)
                                <div class="product" data-product_id="{{ $featured_product->id }}">
                                    <div class="img img-center">
                                        <a href="{{ route('product_detail', $featured_product->id) }}" title="">
                                            <img alt="{{ $featured_product->title }}" title="{{ $featured_product->title }}" width="220" height="220" class="lazyload zoom-img" src="{{ asset($featured_product->main_img) }}">
                                        </a>
                                    </div>
                                    <div class="txt">
                                        <h2 class="pname">
                                            <a href="{{ route('product_detail', $featured_product->id) }}">
                                                {{ $featured_product->title }} {{ $featured_product->memory }}
                                            </a>
                                        </h2>
                                        <ul class="price-text price-html" data-stock="1">
                                            <li class="price">{{ number_format($featured_product->discount, 0, '.', '.') }}₫</li>
                                        </ul>
                                        <div class="star-wrap">
                                            <b>{{ round($feed_back_products[$i]->star, 1) }}</b>/5
                                            <i class="fa fa-star"></i>
                                            <div class="numvote">{{ $feed_back_products[$i]->count }} đánh giá</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Sản phẩm --}}
@foreach($manufacturers as $manufacturer)
    <section id="box-product_brand-4" class="box-table">
        <div class="grid">
            <div class="box-inner">
                <div class="box-head">
                    <a href="{{$manufacturer->name}}" class="ws-name">
                        @foreach($categories as $category)
                        @if($category->id == $manufacturer->category_id )
                        {{$category->name}}
                        @endif
                        @endforeach
                        {{$manufacturer->name}}
                    </a>
                </div>
                <div class="box-body">
                    <div class="products">
                        @php
                        $list_product = [];
                        foreach($products as $product){
                            if ($product->manufacturer_id == $manufacturer->id)
                            {
                                $list_product[]=$product;
                            }
                        }
                        @endphp
                        @for($i = 0; $i < min(5, count($list_product)); $i++)
                        @if ($list_product[$i]->manufacturer_id == $manufacturer->id)
                            <div class="product">
                                <!-- Hình ảnh  -->
                                <div class="img img-center">
                                    <a href="{{ route('product_detail',$list_product[$i]->id)}}" title="">
                                        <img width="220" height="220" class="lazyload zoom-img" src="{{ asset($list_product[$i]->main_img) }}">
                                    </a>
                                </div>
                                <!-- Tên và giá tiền -->
                                <div class="txt">
                                    <!-- tên -->
                                    <h2 class="pname">
                                        <a href="{{ route('product_detail',$list_product[$i]->id)}}">
                                            {{ $list_product[$i]->title }}</a>
                                    </h2>
                                    <!-- giá -->
                                    <ul class="price-text price-html" data-stock="1">
                                        <li class="price">{{ number_format($list_product[$i]->discount, 0, '.', '.') }}₫</li>
                                    </ul>
                                    <!-- Đánh giá sản phẩm -->
                                    @php
                                        $feed_back = $feed_back_products->firstWhere('id', $list_product[$i]->id);
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
                        @endif
                        @endfor
                    </div>
                </div>
                <div class="box-foot">
                    @php
                        // Khởi tạo biến $redirectRoute và $productType mặc định
                        $redirectRoute = '';
                        $productType = '';

                        // Kiểm tra giá trị của category_id
                        if ($manufacturer->category_id == 1) {
                            // Nếu là danh mục điện thoại, chuyển hướng đến trang tương ứng của từng nhà sản xuất
                            switch (strtolower(trim($manufacturer->name))) {
                                case 'apple':
                                    $redirectRoute = route('phone_apple');
                                    $productType = 'Điện thoại';
                                    break;
                                case 'samsung':
                                    $redirectRoute = route('phone_samsung');
                                    $productType = 'Điện thoại';
                                    break;
                                case 'google':
                                    $redirectRoute = route('phone_google');
                                    $productType = 'Điện thoại';
                                    break;
                                case 'xiaomi':
                                    $redirectRoute = route('phone_xiaomi');
                                    $productType = 'Điện thoại';
                                    break;
                                case 'asus':
                                    $redirectRoute = route('phone_asus');
                                    $productType = 'Điện thoại';
                                    break;
                            }
                        } elseif ($manufacturer->category_id == 2) {
                            // Nếu là danh mục máy tính bảng, chuyển hướng đến trang tablet
                            $redirectRoute = route('tablet');
                            $productType = 'Máy tính bảng';
                        }
                    @endphp
                    @if (!empty($redirectRoute))
                        <a href="{{ $redirectRoute }}" class="ws-btn">
                            Xem tất cả {{ count($list_product) }} {{ $productType }} {{ $manufacturer->name }}
                        </a>
                    @else
                        <span class="ws-btn">
                            Xem tất cả {{ count($list_product) }} {{ $productType }} {{ $manufacturer->name }}
                        </span>
                    @endif


                        {{-- <a href="{{$manufacturer->name}}" class="ws-btn">Xem tất cả
                            {{count($list_product)}}
                            @foreach($categories as $category)
                                @if($category->id == $manufacturer->category_id && $category->id ==1 )
                                    {{$category->name}}
                                @endif
                            @endforeach
                            {{$manufacturer->name}}
                        </a> --}}
                </div>
            </div>
        </div>
    </section>
@endforeach
{{-- sản phẩm mới --}}
{{-- <section id="box-product_new" class="box-product_new box-table">
    <div class="grid">
        <div class="box-inner">
            <div class="box-head">
                <div class="ws-name">Sản phẩm mới</div>
            </div>
            <div class="box-body">
                <div class="products">
                    @for($product = count($products)-1 ; $product > count($products)-config('constants.SHOW_PRODUCT')-1; $product--)
                    <div class="product" data-product_id="720">
                        <div class="img img-center">
                            <a href="{{ route('product_detail',$products[$product]->id)}}" title="">
                                <img alt="{{ route('product_detail',$products[$product]->id)}}" title="" width="220" height="220" class="lazyload" src="{{$products[$product]->main_img}}">
                            </a>
                        </div>
                        <div class="txt">
                            <!-- tên -->
                            <h2 class=pname>
                                <a href="{{ route('product_detail',$products[$product]->id)}}"> {{$products[$product]->title}} {{$products[$product]->memory}}</a>
                            </h2>
                            <!-- giá -->
                            <ul class="price-text price-html" data-stock="1">
                                <li class="price"> {{number_format($products[$product]->discount,0,'.','.') }}₫</li>
                            </ul>
                            @php
                            $feed_back = null;
                            foreach($feed_back_products as $row){
                            if($row->id == $products[$product]->id){
                            $feed_back = $row;
                            }
                            }
                            @endphp

                            @if($feed_back)
                            <!-- đánh giá -->
                            <div class="star-wrap">
                                <b>{{round($feed_back->star,1)}}</b>/5
                                <i class="fa fa-star"></i>
                                <div class="numvote">{{$feed_back->count}} đánh giá</div>
                            </div>
                            @else
                            <div class="star-wrap"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                            @endif
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            <div class="box-foot">
                <a href="{{route('phone')}}" class="ws-btn">Xem tất cả {{count($products)}} Sản phẩm</a></div>
        </div>
    </div>
</section> --}}
{{-- Blog new --}}
<section id="box-news" class="box-news box">
    <div class="grid">
        <div class="box-title">
            <div class="ws-name">Tin công nghệ</div>
        </div>
        <div class="box-content">
            <div class="posts">
                <div class="post news">
                    <div class="img">
                        <a href="" title="Google Pixel cập nhật tính năng và bảo mật tối ưu cuối T6/2023">
                            <img src="storage/images/ui5sQpRsFeahaHmdF49swWp1QrXNSlxeA9M9CeEv.jpg" alt="Google Pixel cập nhật tính năng và bảo mật tối ưu cuối T6/2023" width="290" height="170" class="img-cover">
                        </a>
                    </div>
                    <div class="txt-blog">
                        <h2>
                            <a href="">Google Pixel cập nhật tính năng và bảo mật tối ưu cuối T6/2023</a>
                        </h2>
                    </div>
                </div>
                <div class="post news">
                    <div class="img">
                        <a href="" title="Vì Sao iPhone Phải Cho Phép Người Dùng Tự Sửa Điện Thoại?">
                            <img src="storage/images/0gNjoS98qLAq9Kc4dWMAqKQ2vix2J9JthbPWxXXp.png" alt="Vì Sao iPhone Phải Cho Phép Người Dùng Tự Sửa Điện Thoại?" width="290" height="170" class="img-cover">
                        </a>
                    </div>
                    <div class="txt-blog">
                        <h2>
                            <a href="">Vì Sao iPhone Phải Cho Phép Người Dùng Tự Sửa Điện Thoại?</a>
                        </h2>
                    </div>
                </div>
             </div>
        </div>
        <div class="box-foot">
            <a href="" class="ws-btn viewall">Xem tất cả</a>
        </div>
    </div>
</section>
{{--  --}}
<section id="box-policy" class="box-policy box hidden-xs" data-layout="boxed">
    <div class="grid">
        <section class="advertise-policy">
            <div class="policy-item"><img src="https://mobileworld.com.vn/uploads/weblink/thumbs/logo-giaohangnhanh.webp" alt="Giao hàng nhanh" width="88" height="48">
                <div class="txt">Giao hàng nhanh</div>
            </div>
            <div class="policy-item"><img src="https://mobileworld.com.vn/uploads/weblink/thumbs/logo-tvcn.webp" alt="Tư vấn chuyên nghiệp" width="56" height="64">
                <div class="txt">Tư vấn chuyên nghiệp</div>
            </div>
            <div class="policy-item"><img src="https://mobileworld.com.vn/uploads/weblink/thumbs/logo-chinhhang.webp" alt="100% chính hãng" width="60" height="60">
                <div class="txt">100% chính hãng</div>
            </div>
            <div class="policy-item"><img src="https://mobileworld.com.vn/uploads/weblink/thumbs/logo-ttlh.webp" alt="Thanh toán linh hoạt" width="65" height="65">
                <div class="txt">Thanh toán linh hoạt</div>
            </div>
        </section>
    </div>
</section>
