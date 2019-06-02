@extends('frontend/master')
@section('title', 'Categories')
@section('content')
<div id="wrap-inner">
	<div class="products">
		<h3>{{ $catename->cate_name }}</h3>
		<div class="product-list row">
			@foreach($items as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img height="150px" src="{{ asset('lib/storage/app/avatar/'.$item->prod_img) }}" class="img-thumbnail"></a>
				<p><a href="#">{{ $item->prod_name }}</a></p>
				<p class="price">{{ number_format($item->prod_price,0,',','.') }}</p>	  
				<div class="marsk">
					<a href="{{ asset('detail/'.$item->product_id.'/'.$item->prod_slug.'.html') }}">Xem chi tiết</a>
				</div>
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div id="pagination">
		{{$items->links()}}
	</div>
</div>
@endsection