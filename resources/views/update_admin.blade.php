@php
    $layout = '';
    if (session()->get('loginStatus') === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
		$usertype = 'superAdmin';
    }
	 elseif (session()->get('loginStatus') === 'admin') {
        $layout = 'frontend.layoutadmin.main';
		$usertype = 'admin';
    }
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>Blank Page | Simsat</title>
@endpush
@section('main-content')
<div class="card-body">
	@if (isset($msg1))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ $msg1 }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif (isset($msg2))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{ $msg2 }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif

	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-65">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-2">
							<h1 class="h1 fw-bolder">Admin Registration Form,</h1>
							<p class="lead">
								Join our IT center by completing the enrollment form and start your journey in technology today!
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center mb-4">
										<img src="{{ url('frontend/img/icons/boy.png') }}" alt="photo" class="img-fluid rounded-circle" width="112" height="132" />
									</div>
									<form 
									@if ($usertype == 'superAdmin')
										action="{{ url('/admin/update') }}" 
									@else
										action="{{ url('/personalInfoChange') }}" 
									@endif
									enctype="multipart/form-data" method="POST">
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
													@if (isset($father))
													value="{{ $father }}"
													@endif
												@endif
												/>
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
												@endif
												/>
												<span class="text-danger">
													@error('age')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">CNIC</label>
												<input class="form-control form-control-sm" type="text" name="CNIC" placeholder="Enter CNIC Num Without special Char" 
												@if ( old('CNIC') )
													value="{{ old('CNIC') }}"
												@else
													@if (isset($cnic))
														value="{{ $cnic }}"
													@endif
												@endif 
												/>
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
											<div class="col-md-6">
												<label class="form-label">Phone Number</label>
												<input class="form-control form-control-sm" type="text" name="PhoneNum" placeholder="Enter your Phone Number" 
												@if ( old('PhoneNum') )
													value="{{ old('PhoneNum') }}"
												@else
													@if (isset($PhoneNum))
														value="{{ $PhoneNum }}"
													@endif
												@endif />
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
												<input name="dob" class="form-control form-control-sm" type="date" id="dob" 
												@if ( old('dob') )
													value="{{ old('dob') }}"
												@else
													@if (isset($dob))
														value="{{ $dob }}"
													@endif
												@endif />
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
												<textarea name="address" id="address" cols="14" rows="5">
													@if ( old('address') )
														{{ old('address') }}
													@else
														@if (isset($address))
															{{$address}}
														@endif
													@endif
												</textarea>
												<span class="text-danger">
													@error('address')
														{{$message}}
													@enderror
												</span>
											</div>
										</div>
										<input class="form-control form-control-sm" type="hidden" name="id" placeholder="Enter your email"
										@if (isset($id))
											value="{{ $id }}"
										@else
											value="{{ session()->get('id') }}"
										@endif />
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
</div>
	<script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ url('frontend/js/app.js') }}"></script>
@endsection
{{-- <div class="col-md-6">
	<label class="form-label">Course</label>
	<select name="course" class="course form-control form-control-sm">
		<option value="" selected disabled>select your course</option>
		<option value="pcit" >PCIT</option>
		<option value="cit" >CIT</option>
		<option value="ms_office" >MS.Office</option>
		<option value="graphic_designing" >Graphic Designing</option>
		<option value="advance_graphic_designing" >Advance Graphic Designing</option>
		<option value="pro_web" >Pro Web</option>
		<option value="web_designing" >Web Designing</option>
		<option value="web_development" >Web Development</option>
		<span class="text-danger">
			@error('course')
				{{ $message }}
			@enderror
		</span>
	</select>
</div> --}}