@php
    $layout = '';
        $layout = 'frontend.layoutsuperAdmin.main';
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>Profile Update | Simsat</title>
@endpush
@section('main-content')
<div class="card-body">
	@if (isset($msg1))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ $msg1 }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif

	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-65">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-2">
							<h1 class="h1 fw-bolder">Super Admin Updation Portal,</h1>
							<p class="lead">
								This shorter version retains the key points and makes it concise for a quick read.
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-1">
									<div class="text-center mb-4">
										<img 
										@if (session()->get('loginStatus') == 'superAdmin')
											@if (isset($image))
											src="storage/uploads/{{ $image }}"
											@else
											src="frontend/img/icons/admin-icon.png"
											@endif
										@endif
										 alt="Charles Hall" class="img-fluid rounded-circle" width="112" height="132" />
									</div>
									<form action="{{ url('/super') }}" enctype="multipart/form-data" method="POST">
										@csrf
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Name</label>
												<input class="form-control form-control-sm" type="text" name="name" placeholder="Enter your Name" 
												@if ( old('name') )
													value="{{ old('name') }}"
												@else
													@if (isset($name))
														value="{{ $name }}"
													@endif
												@endif />
												<span class="text-danger">
													@error('name')
														{{ $message }}
													@enderror
												</span>

											</div>
											<div class="col-md-6">
												<label class="form-label">Father Name</label>
												<input class="form-control form-control-sm" type="text" name="father" placeholder="Enter your Father Name" 
												@if ( old('father') )
													value="{{ old('father') }}"
												@else
													@if (isset($father_name))
													value="{{ $father_name }}"
													@endif
												@endif />
												<span class="text-danger">
													@error('father')
														{{ $message }}
													@enderror
												</span>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Age</label>
												<input class="form-control form-control-sm" type="number" name="age" placeholder="Enter your email"
												@if ( old('age') )
													value="{{ old('age') }}"
												@else
													@if (isset($age))
													value="{{ $age }}"
													@endif
												@endif />
												<span class="text-danger">
													@error('age')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">Email</label>
												<input class="form-control form-control-sm" type="email" name="email" placeholder="Enter your email" 
												@if ( old('email') )
													value="{{ old('email') }}"
												@else
													@if (isset($email))
													value="{{ $email }}"
													@endif
												@endif />
												<span class="text-danger">
													@error('email')
														{{ $message }}
													@enderror
												</span>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Image</label>
												<input class="form-control form-control-sm" type="file" name="image"/>
												<span class="text-danger">
													@error('image')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6 ">
												<label class="form-label-sm">Gender</label>
												<div class="form-check">
													<input class="form-check-input" id="male" type="radio" value="Male" name="gender" />
													<label class="form-check" for="male">Male</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" id="female" type="radio" value="Female" name="gender" />
													<label class="form-check" for="female">Female</label>
												</div>
												<div class="form-check ">
													<input class="form-check-input" id="other" type="radio" value="Other" name="gender" />
													<label class="form-check" for="other">Other</label>
												</div>
												<span class="text-danger">
													@error('gender')
														{{ $message }}
													@enderror
												</span>
											</div>
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
	<script src="{{ url('frontend/js/app.js') }}"></script>
    <script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
</div>
							
@endsection