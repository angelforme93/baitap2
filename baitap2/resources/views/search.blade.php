@extends('admin.admin')
@section('title')
Sản phẩm
@stop
@section('content')

	
	<div class="rev-slider">
	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
					

							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							
							
							<div class="row">
							@foreach($data as $item)
							@if($item->promotion_price == 0)
								<div class="col-sm-3" style="margin-top:1em;">
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
											<a class="add-to-cart pull-left" href="themgiohang/{{$item->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsp/{{$item->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@else
								<div class="col-sm-3" style="margin-top:1em;">
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
											<a class="add-to-cart pull-left" href="themgiohang/{{$item->id}}" ><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsp/{{$item->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>



								@endif

								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2014</p>
			<p class="pull-right pay-options">
				<a href="#"><img src="assets/dest/images/pay/master.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<!-- include js files -->
	<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/dest/js/waypoints.min.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	@stop
