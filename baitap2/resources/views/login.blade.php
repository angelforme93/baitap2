@extends('admin.admin')
@section('title')
	Login
@stop
@section('content')	

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form method="post" action="checklogin" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				@if (count($errors) > 0)
								<div class="alert alert-danger c-loi-login" style="width:50%;margin:0 auto;opacity:0;">
									<ul>
										@foreach ($errors->all() as $error)
										{{ $error }}<br>
										@endforeach
									</ul>
								</div>
					@endif
					@if(session('thongbao'))
									<div class="alert alert-danger c-loi-login" style="width:50%;margin:0 auto;opacity:0;">

										{{session('thongbao')}} 
										<br>
										
									</div>
									@endif
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" required name="email">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" id="phone" required style="border: 1px solid #e1e1e1;height: 37px;padding: 0 12px;">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary" >Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
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
	<!--customjs-->
@stop