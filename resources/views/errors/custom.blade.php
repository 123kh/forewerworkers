<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/errors-500-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Dec 2022 12:04:51 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header-colors.css') }}" />

    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <title>Forewer Workers</title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		
		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="card">
					<div class="row g-0">
						<div class="col-xl-5">
							<div class="card-body p-4">
								<h1 class="display-1"><span class="text-warning">5</span><span class="text-danger">0</span><span class="text-primary">0</span></h1>
								<h2 class="font-weight-bold display-4">Sorry, unexpected error</h2>
								<p>Looks like something error occured!
									<br>Contact to developer team for the support!</p>
								<div class="mt-5">	
                                    <a href="{{route('login')}}" class="btn btn-lg btn-primary px-md-5 radius-30">Go Home</a>
									
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<img src="{{ asset('images/errors-images/505-error.png')}}" class="img-fluid" alt="">
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
</body>


</html>