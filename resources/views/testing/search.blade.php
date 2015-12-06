<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Welcome to VKULP</title>
    @include('search.partials.styles')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body class="style-2">
<!-- LOADER -->
{{--<div id="loader-wrapper">--}}
{{--<div class="bubbles">--}}
{{--<div class="title">loading</div>--}}
{{--<span></span>--}}
{{--<span id="bubble2"></span>--}}
{{--<span id="bubble3"></span>--}}
{{--</div>--}}
{{--</div>--}}

<div id="content-block">

    <div class="content-center fixed-header-margin">
        <!-- HEADER -->
        <div class="header-wrapper style-2">
            @include('search.partials.header')
            <div class="clear"></div>
        </div>

        <div class="content-push">

            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-navigation">
                        <div class="title">Product Categories<i class="fa fa-angle-down"></i></div>
                        @include('search.partials.categories')
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-9">
                    <div class="information-blocks">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    @if(!empty($main_cat))
                                        <li>
                                            <a href="{{url('/category').'/'.$main_cat->slug}}">{{$main_cat->name}}</a>
                                        </li>
                                    @endif
                                    @if(!empty($sub_cat))
                                        <li>
                                            <a href="{{url('/sub-category').'/'.$sub_cat->slug}}">{{$sub_cat->name}}</a>
                                        </li>
                                    @endif
                                    @if(!empty($category))
                                        <li>{{$category->name}}</li>
                                    @endif
                                    @if(!empty($keyword))
                                        {{--<li><a href="" Products</li>--}}
                                        <li class="active">{{$keyword}}</li>
                                    @endif
                                    {{--right--}}
                                    <ul class="own-crumbs pull-right">
                                        @if(!empty($nature))
                                            <li class="pull-right">{{$nature}}</li>
                                        @endif
                                        @if(!empty($filter))
                                            <li class="pull-right">{{str_replace('_',' ',$filter)}}</li>
                                        @endif
                                        @if(!empty($min))
                                            <li class="pull-right">{{$min}}</li>
                                        @endif
                                        @if(!empty($max))
                                            <li class="pull-right">
                                                {{$max}}
                                            </li>
                                        @endif
                                    </ul>
                                    @if(isset($searchArray))
                                        <input type="hidden" id="searchParam" value="{{ $searchArray }}"/>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 30px;">
                                <div class="pull-left">
                                    <a href="{{url('/compare/compare')}}" class="btn btn-default"> <i
                                                class="fa fa-retweet"></i> <strong>{{Cart::count()}}</strong>
                                        Compare</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{url('/vendor')}}" class="btn btn-default">Vendor View</a>
                                    <a href="{{url('/search')}}" class="btn btn-default">Product View</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @include('partials.flash')
                            </div>
                        </div>
                    </div>
                    <div class="row shop-grid grid-view">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-4 shop-grid-item">
                                <div class="product-slide-entry shift-image" style="border: 1px solid lightgrey;">
                                    <div class="product-image">
                                        <div class="img">
                                        @if(filter_var($product->image,FILTER_VALIDATE_URL))
                                            <img src="{{$product->image}}" height="100">
                                        @elseif($product->image)
                                            <img src="{{url('home-theme/img/products').'/'.$product->image}}" height="100">
                                        @else
                                            <img src="http://www.placehold.it/100x100" height="100">
                                        @endif
                                        </div>
                                        <div class="img">
                                        @if(filter_var($product->image,FILTER_VALIDATE_URL))
                                            <img src="{{$product->image}}" height="100">
                                        @elseif($product->image)
                                            <img src="{{url('home-theme/img/products').'/'.$product->image}}" height="100">
                                        @else
                                            <img src="http://www.placehold.it/100x100" height="100">
                                        @endif
                                        </div>
                                        {{--<img src="{{$product->image}}" alt="{{$product->name}}"/>--}}
                                        {{--<img src="{{$product->image}}" alt="{{$product->name}}"/>--}}
                                        <div class="bottom-line left-attached">
                                            <a href="{{url('compare/add').'/'.$product->id}}"
                                               class="bottom-line-a square"><i class="fa fa-retweet fa-2x"></i></a>
                                        </div>
                                    </div>
                                    <a class="title text-center ellipsis" href="#">{{$product->name}}</a>

                                    <div class="price text-center" style="padding-bottom: 0;">
                                        <div class="current btn btn-default" style="width: 100%; border-radius: 0;"><a
                                                    href="{{url('/profile').'/'.$product->user->username}}">Contact
                                                Supplier</a></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        @endforeach
                        {{--<div class="page-selector">--}}
                        {{--<div class="description">Showing: 1-3 of 16</div>--}}
                        <div class="pages-box pull-right" style="padding-bottom: 50px;">
                            {!! $products->appends( Input::query() )->render() !!}
                        </div>
                        {{--</div>--}}
                    </div>
                </div>
                <!-- FOOTER -->
            </div>
        </div>

    </div>
    <div class="clear"></div>
    @include('search.partials.footer')
</div>

<div class="search-box popup">
    {!! Form::open(['method'=>'get','id'=>'searchForm','url'=>'/search']) !!}
    <div class="search-button">
        <i class="fa fa-search"></i>
        {!! Form::submit() !!}
    </div>
    <div class="search-drop-down">
        <div class="title"><span>All categories</span><i class="fa fa-angle-down"></i></div>
        <div class="list">
            <div class="overflow">
                @foreach($cat as $category)
                    <div class="category-entry">{{$category->name}}</div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="search-field">
        <?php $keyword = Input::has('keyword') ? Input::get('keyword') : null; ?>
        {!! Form::text('keyword',$keyword,['placeholder'=>'Search for product']) !!}
    </div>
    {!! Form::close() !!}
</div>

@include('search.partials.scripts')
</body>
</html>