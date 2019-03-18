@extends('admin.admin')
@section('content')
	<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
								@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/{{$sl->image}}" data-src="image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row" id="danhsach_tb">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{Count($new_sp)}} Sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row" id="danhsach_sp">
							<!-- //sp de day -->
							@foreach($new_sp as $item)
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
											<a class="add-to-cart pull-left" href="themgiohang/{{$item->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chitietsp/{{$item->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>



								@endif

								@endforeach
									<!-- end sp -->
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list" >
							<h4>Top Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{Count($top_sp)}} Sản phẩm </p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($top_sp as $item)
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
						
								
								
						
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@stop
	