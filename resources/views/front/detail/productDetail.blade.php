@extends('front.layout.master')
@section('title', 'Shop')
@section('body')
<main>
    <div class="container margin_30">
        <div class="countdown_inner">-{{ round(($product->price_old - $product->price_new) / $product->price_old * 100) }}% This offer ends in <div class="countdown">{{ $product->created_at }}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            @foreach ($image as $item)
                            <div class="item-box">
                                <img src="../assetss/img/imageProducts/{{ $item->image }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            @foreach ($image as $item)
                            <div class="item active">
                                <img src="../assetss/img/imageProducts/{{ $item->image }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        @if ($product)
                            @if ($categoryy)
                                <li><a href="#">Home</a></li>
                                <li><a href="#">{{ $categoryy->name_cate }}</a></li>
                                <li>{{ $product->name }}</li>
                            @else
                                <li><a href="#">Home</a></li>
                                <li>Danh mục không tồn tại</li>
                                <li>{{ $product->name }}</li>
                        @endif
                        @else
                            <li><a href="#">Home</a></li>
                            <li>Sản phẩm không tồn tại</li>
                        @endif

                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1>{{ $product->name }}</h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                    <p><small>SKU: MTKRY-001</small><br>{{ $product->description }}</p>
                    <div class="prod_options">
                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                <ul>
                                    <li><a href="#0" class="color color_1 active" data-color="color_1"></a></li>
                                    <li><a href="#0" class="color color_2" data-color="color_2"></a></li>
                                    <li><a href="#0" class="color color_3" data-color="color_3"></a></li>
                                    <li><a href="#0" class="color color_4" data-color="color_4"></a></li>
                                </ul>
                                <input type="hidden" name="color" id="selected-color" value="color_1">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide" name="size" id="selected-size">
                                        <option value="S" selected>Small (S)</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main"><span class="new_price">${{ $product->price_new }}</span><span class="percentage">-{{ round(($product->price_old - $product->price_new) / $product->price_old * 100) }}%</span> <span class="old_price">${{ $product->price_old }}</span></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><a href="{{ route('home.cart.cartProduct', $product->id) }}" class="btn_1">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <h3>Details</h3>
                                    <p>Lorem ipsum dolor sit amet, in eleifend <strong>inimicus elaboraret</strong> his, harum efficiendi mel ne. Sale percipit vituperata ex mel, sea ne essent aeterno sanctus, nam ea laoreet civibus electram. Ea vis eius explicari. Quot iuvaret ad has.</p>
                                    <p>Vis ei ipsum conclusionemque. Te enim suscipit recusabo mea, ne vis mazim aliquando, everti insolens at sit. Cu vel modo unum quaestio, in vide dicta has. Ut his laudem explicari adversarium, nisl <strong>laboramus hendrerit</strong> te his, alia lobortis vis ea.</p>
                                    <p>Perfecto eleifend sea no, cu audire voluptatibus eam. An alii praesent sit, nobis numquam principes ea eos, cu autem constituto suscipiantur eam. Ex graeci elaboraret pro. Mei te omnis tantas, nobis viderer vivendo ex has.</p>
                                </div>
                                <div class="col-lg-5">
                                    <h3>Specifications</h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Color</strong></td>
                                                    <td>Blue, Purple</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Size</strong></td>
                                                    <td>150x100x100</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Weight</strong></td>
                                                    <td>0.6kg</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Manifacturer</strong></td>
                                                    <td>Manifacturer</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Reviews
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body d-flex">

                            {{-- để comment --}}
                            <div class="row justify-content-between">
                                <div class="col-lg-12">
                                    <div class="review_content">
                                        <section style="background-color: #eee;">
                                            <div class="container my-5 py-5">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-md-12 col-lg-10 col-xl-8">
                                                        <div class="card">
                                                            @foreach ($retingComment as $comment)
                                                            <div class="card-body mt-3">
                                                                <div class="d-flex flex-start align-items-center">
                                                                    <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60" height="60" />
                                                                    <div>

                                                                        <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
                                                                        <?php
                                                                        $date = \Carbon\Carbon::parse($comment->created_at);
                                                                        $dayNow = $date->diffInDays(\Carbon\Carbon::now());
                                                                        ?>
                                                                        <p class="text-muted small mb-0">
                                                                            Shared publicly - {{ $dayNow }} Ngày trước
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ratingStar">
                                                                    <div class="rate">
                                                                        @for($i = 1; $i <= 5; $i++) @if($i <=$comment->vote_star)
                                                                            <i class="fa-solid fa-star userStar"></i>
                                                                            @else
                                                                            <i class="fa-solid fa-star noStar"></i>
                                                                            @endif

                                                                            @endfor
                                                                    </div>
                                                                    <p class="mt-3 mb-4 pb-2">
                                                                        {{ $comment->comment }}
                                                                    </p>
                                                                </div>


                                                                <div class="small d-flex justify-content-start">
                                                                    <a href="#!" class="d-flex align-items-center me-3">
                                                                        <i class="far fa-thumbs-up me-2"></i>
                                                                        <p class="mb-0">Like</p>
                                                                    </a>
                                                                    <a href="#!" class="d-flex align-items-center me-3">
                                                                        <i class="far fa-comment-dots me-2"></i>
                                                                        <p class="mb-0">Comment</p>
                                                                    </a>
                                                                    <a href="#!" class="d-flex align-items-center me-3">
                                                                        <i class="fas fa-share me-2"></i>
                                                                        <p class="mb-0">Share</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>

                            {{-- để pots comment lên server --}}
                            <div class="row justify-content-between">
                                <div class="col-lg-4 tuancay">
                                    @if(Auth::check())
                                    <div class="review_content">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                                <div class="d-flex flex-start w-100">
                                                    <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" />
                                                    <div data-mdb-input-init class="form-outline w-100">
                                                        <textarea class="textarea" id="textAreaExample" rows="5" cols="70" style="background: #fff;" name="comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Post comment</button>
                                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm">Cancel</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    @else
                                    <a href="{{ route('login') }}"><button class="btn btn-success">login</button></a>
                                    @endif
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Related</h2>
            <span>Products</span>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($productRelated as $item)
            <div class="item">
                <div class="grid_item">
                    <span class="ribbon new">-{{ round(($item->price_old - $item->price_new) / $item->price_old * 100) }}% </span>
                    <figure>
                        <div class="tuanhandsomee">
                            <a href="{{ route('home.detail.detailPro', $item->id) }}">
                                <img class="owl-lazy" src="../assetss/img/product/{{ $item->image }}" data-src="../assetss/img/product/{{ $item->image }}" alt="">
                            </a>
                        </div>

                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="{{ route('home.detail.detailPro', $item->id) }}">
                        <h3>{{ $item->name }}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$110.00</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="{{ route('home.cart.cartProduct', $item->id) }}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            @endforeach


        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Free Shipping</h3>
                            <p>For all oders over $99</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Secure Payment</h3>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>24/7 Support</h3>
                            <p>Online top support</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--/feat-->

</main>

@endsection