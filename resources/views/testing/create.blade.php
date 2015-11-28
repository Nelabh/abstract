@extends('search.user-profile')
@section('content')
        <!-- PAGE WITH SIDEBAR -->
<section class="page-section with-sidebar">
    <div class="container">
        <div class="row">
            <!-- SIDEBAR -->
            <aside class="col-md-3 sidebar" id="sidebar">
                @include('partials.home-sidebar');
            </aside>
            <!-- /SIDEBAR -->
            <!-- CONTENT -->
<a href="{{route('products.index')}}" id="blue-btn" style="float:right;background: #0F51A3;color: #fff;" class="btn btn-default">Back</a>
            <div class="col-md-9 content" id="content">
                <!-- Products grid -->
                <div class="col-md-offset-1 col-md-8">
                    <div class="row products grid">
                        @include('partials.flash')
                        @include('partials.errors')
                        {!! Form::open(['route'=>'products.store','role'=>'form','enctype'=>'multipart/form-data']) !!}
                        @include('products.form')
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /CONTENT -->
            </div>

        </div>
    </div>
</section>
<!-- /PAGE WITH SIDEBAR -->
@endsection