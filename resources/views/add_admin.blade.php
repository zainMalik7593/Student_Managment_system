@php
    $layout = '';
    if (session()->get('loginStatus') === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
    }
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>Create Admin | Simsat</title>
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
							<h1 class="h1 fw-bolder">Admin Registration Portal,</h1>
							<p class="lead">
								This shorter version retains the key points and makes it concise for a quick read.
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-1">
									<div class="text-center mb-4">
										<img src="{{ url('frontend/img/icons/profile.png') }}" alt="Admin" class="img-fluid rounded-circle" width="112" height="132" />
									</div>
									<form action="{{ url('/admin/add') }}" enctype="multipart/form-data" method="POST">
										@csrf
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Name</label>
												<input class="form-control form-control-sm" type="text" name="name" placeholder="Enter your Name" value="{{ old('name') }}"/>
												<span class="text-danger">
													@error('name')
														{{ $message }}
													@enderror
												</span>

											</div>
											<div class="col-md-6">
												<label class="form-label">Father Name</label>
												<input class="form-control form-control-sm" type="text" name="father" placeholder="Enter your Father Name" value="{{ old('father') }}"/>
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
												<input class="form-control form-control-sm" type="number" name="age" placeholder="Enter your email" value="{{ old('age') }}"/>
												<span class="text-danger">
													@error('age')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">CNIC</label>
												<input class="form-control form-control-sm" type="text" name="CNIC" placeholder="Enter CNIC Num Without special Char" value="{{ old('CNIC') }}"/>
												<span class="text-danger">
													@error('CNIC')
														{{ $message }}
													@enderror
												</span>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Email</label>
												<input class="form-control form-control-sm" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"/>
												<span class="text-danger">
													@error('email')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">Phone Number</label>
												<input class="form-control form-control-sm" type="text" name="PhoneNum" placeholder="Enter your Phone Number" value="{{ old('PhoneNum') }}"/>
												<span class="text-danger">
													@error('PhoneNum')
														{{ $message }}
													@enderror
												</span>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Image</label>
												<input class="form-control form-control-sm" type="file" name="image" value="{{ old('image') }}"/>
												<span class="text-danger">
													@error('image')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">DOB</label>
												<input name="dob" class="form-control form-control-sm" type="date" id="dob"value="{{ old('dob') }}">
												<span class="text-danger">
													@error('dob')
														{{ $message }}
													@enderror
												</span>
											</div>
											
										</div>

										<div class="row mb-3">
											<label class="form-label">Address</label>
											<div class="col-md-6">
												<textarea name="address" id="address" cols="14" rows="5">{{ old('address') }}</textarea>
												<span class="text-danger">
													@error('address')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6 ">
												<label class="form-label-sm">Gender</label>
												<div class="form-check mt-3">
													<input class="form-check-input" id="male" type="radio" value="male" name="gender" />
													<label class="form-check" for="male">Male</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" id="female" type="radio" value="female" name="gender" />
													<label class="form-check" for="female">Female</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" id="other" type="radio" value="other" name="gender" />
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
	<script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ url('frontend/js/app.js') }}"></script>
</div>
							
@endsection