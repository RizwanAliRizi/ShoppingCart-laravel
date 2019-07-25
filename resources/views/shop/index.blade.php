@extends('layouts.master')

@section('title')
Laravel Shopping Cart
@endsection

@section('content')
<div class="row">
	@foreach($products->chunk(3) as $ChunkProduct)
		@foreach($ChunkProduct as $product)
	 <div class="col-sm-6 col-md-4">
	 <div class="thumbnail">
		<img src="{{$product->imagePath}}" alt=".." class="img-responsive">
		<div class="caption">
			<h3>{{$product->title}} </h3>
			<p> {{$product->description}}</p>
		</div>
		<div class="pull-left price">${{$product->price}}</div>
		<div class="clearfix"><a href="{{route('product.addToCart',$product->id)}}" class="btn btn-success pull-right" role="button">Add to Cart</a></div>
		

	</div>
</div>
		@endforeach
	@endforeach
 

@endsection