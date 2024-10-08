<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="frontend/img/icons/simsat.photo.png" />
	<title>Login Page | Simsat</title>
	<link href="frontend/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome</h1>
							<p class="lead">
								Login to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="frontend/img/icons/boy.png" alt="Charles Hall" class="img-fluid rounded-circle" width="112" height="132" />
									</div>
									<form action="{{ url('/login') }}" method="POST">
										@csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" value="@if (isset($oldemail)){{ $oldemail }}@endif" placeholder="Enter your email" />
											<span class="text-danger">
												@if (isset($errEmail))
													{{ $errEmail }}
												@else
													@error('email')
														{{ $message }}
													@enderror
												@endif
											</span>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<span class="text-danger">
												@if (isset($err))
													{{ $err }}
												@else
													@error('password')
														{{ $message }}
													@enderror
												@endif
											</span>
											<br>
											<small>
											<a href="#" class="text-primary">Forgot password?</a>
										</small>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="frontend/js/app.js"></script>

</body>

</html>