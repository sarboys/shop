@extends('layout.main')
@section('title',$cat->name)
@section('custom_js')
    <script src="/js/categories.js"></script>
@endsection
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection
@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(images/categories.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$cat->name}}<span>.</span></div>
                                <div class="home_text"><p>{{$cat->description}}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                                <li class="product_sorting_btnT"><span>Default</span></li>
                                                <li class="product_sorting_btnT" data-order="price_low_high"><span>Price Low-High</span></li>
                                                <li class="product_sorting_btnT" data-order="price_high_low"><span>Price High-Low</span></li>
                                                <li class="product_sorting_btnT" data-order="name_az"><span>Name A-Z</span></li>
                                                <li class="product_sorting_btnT" data-order="name_za"><span>Name Z-A</span></li>
                                            </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        @foreach($products as $product)
                            @php
                                if(count($product->images)>0) {
	                                $image = $product->images[0]['img'];
                                } else {
	                                $image = 'no_image.png';
                                }
                            @endphp
                            <div class="product">
                                <div class="product_image"><img src="images/{{$image}}" alt="{{$product->name}}"></div>
                                <div class="product_extra product_new">
                                    <a href="{{route('category', $product->category['alias'])}}">
                                        {{$product->category['name']}}
                                    </a>
                                </div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{route('product',[$cat->alias,$product->id])}}">{{$product->name}}</a></div>
                                    @if($product->new_price != null)
                                        <div class="product_price" style="text-decoration: line-through;">${{$product->price}}</div>
                                        <div class="product_price">${{$product->new_price}}</div>
                                    @else
                                        <div class="product_price">${{$product->price}}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="product_pagination">
                        {{$products->appends(request()->query())->links()}}
                        <ul>
                            <li class="active"><a href="#">01.</a></li>
                            <li><a href="#">02.</a></li>
                            <li><a href="#">03.</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="/images/icon_1.svg" alt=""></div>
                        <div class="icon_box_title">Free Shipping Worldwide</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="/images/icon_2.svg" alt=""></div>
                        <div class="icon_box_title">Free Returns</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="/images/icon_3.svg" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Subscribe to our newsletter</div>
                        <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
                        <div class="newsletter_form_container">
                            <form action="#" id="newsletter_form" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required">
                                <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.product_sorting_btnT').on('click',function () {
                let orderBy = $(this).data('order');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{route('category',$cat->alias)}}",
                    type:'get',
                    data:{
                        orderBy :orderBy
                    },
                    success:function (data) {
                        $('.product_grid').empty();
                        $('.product_grid').html(data);
                    }
                })
            });
        });
    </script>
@endsection
