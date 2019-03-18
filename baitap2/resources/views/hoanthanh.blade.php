@extends('admin.admin')
	@section('title')
	Thông tin đặt hàng
	@stop	
	@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đơn hàng</h6>
				
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div class="container">
		<table id="hienthi_sp">
			<tr>
				<th> Email</th>
				<th>Họ tên</th>
				<th>Địa chỉ</th>
				<th>SĐT</th>
				<th>Thời gian mua hàng</th>
				<th>Tổng giá</th>
				<th> Tên Sản phẩm</th>
				<th>Giá sản phẩm </th>
				<th>Số lượng </th>
				<th>Image</th>
			</tr>
			@foreach($user as $item)
			<tr>
				<th>{{$item->email}}</th>
				<th>{{$item->fullname}}</th>
				<th>{{$item->diachi}}</th>
				<th>{{$item->phone}}</th>
				<th>{{$item->ngaytao}}</th>
				<th>{{$item->total}}</th>
				<th>{{$item->name}}</th>
				<th>{{$item->soluong}} </th>
				<th>{{$item->giaca}}</th>
				<th><img src="image/product/{{$item->image}}" height="50px" width="50px" alt=""></th>
			</tr>
		@endforeach
		</table>
</div>

	<div class="copyright" style='margin-top:2em;'>
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
	<!--customjs-->
	<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });   


</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';
				
// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
@stop