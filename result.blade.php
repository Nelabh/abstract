@extends('common')
@section('content')
<div id="home">
<div class="container">
<div class="row animate-in" data-anim-type="fade-in-up">
<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me">
	   <!-- @foreach ($response["records"] as $hello)
    <p>{{ $hello }}</p>
    @endforeach -->
    {{$response}}

	  </div>
</div>
</div>
</div>
@stop