@extends('admin.admin')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index" >Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
                            @foreach($danhmuc as $dm)
							<li><a href="danhmuc/{{$dm->id}}">{{$dm->name}}</a></li>
							@endforeach
							
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							
							

							<div class="row">
							@foreach($dm_sp as $item)
							@if($item->promotion_price == 0)
								<div class="col-sm-4" style="margin-top:1em;">
									<div class="single-item">
										<div class="single-item-header">
											<a href="chitietsp/{{$item->id}}"><img src="image/product/{{$item->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price">
												<span>{{number_format($item->unit_price)}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left"  href="themgiohang/{{$item->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsp/{{$item->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@else
								<div class="col-sm-4" style="margin-top:1em;">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="chitietsp/{{$item->id}}"><img src="image/product/{{$item->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($item->unit_price)}}</span>
												<span class="flash-sale">{{number_format($item->promotion_price)}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="themgiohang/{{$item->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsp/{{$item->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>



								@endif

								@endforeach
							</div>
							<div class="row" style="margin-left:10em;">{{$dm_sp->links()}}</div>
						</div> <!-- .beta-products-list -->

					

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@stop
