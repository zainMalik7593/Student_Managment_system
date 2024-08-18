@php
    $layout = '';
    if (session()->get('loginStatus') === 'admin') {
		$userType = 'admin';
        $layout = 'frontend.layoutadmin.main';
        if ($image) {
            $src = "storage/uploads/$image";
        }else {
			if ($gender == 'Female' || $gender == 'Other') {
				$src = 'frontend/img/icons/girl-profile.png';	
			} else {
				$src = 'frontend/img/icons/profile.png';
			}
        }
    } elseif (session()->get('loginStatus') === 'student') {
		$userType = 'student';
        $layout = 'frontend.layoutstudent.main';
		if ($image) {
            $src = "storage/uploads/$image";
        }else {
			if ($gender == 'Female' || $gender == 'Other') {
				$src = 'frontend/img/icons/girl.png';	
			} else {
				$src = 'frontend/img/icons/boy.png';
			}
        }
    } elseif (session()->get('loginStatus') === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
        $src = 'frontend/img/icons/admin-icon.png';
		$userType = 'superAdmin';
    }
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>Change Password | Simsat</title>
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
							<h1 class="h1 fw-bolder">Change Your Password,</h1>
							<p class="lead">
								To maintain account security, change your password regularly. Provide your current password and set a new one.
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-1">
									<div class="text-center mb-4">
                                        <h4 class="fw-bolder">{{ $email }}</h4>
										<img src="{{ $src }}" alt="Admin" class="img-fluid rounded-circle" width="112" height="132" />
									</div>
									<form action="
									@if ($userType == 'superAdmin')
										{{ url('/Change_password') }}
									@else
										{{ url('/passwordChange') }}
									@endif
									 " enctype="multipart/form-data" method="POST">
										@csrf
										<div class="row mb-3">
											<div class="col-md-12">
												<label class="form-label">Enter Your Old Password</label>
												<input class="form-control form-control-sm" type="text" name="old_password" placeholder="Enter your Old Password" value="{{ old('old_password') }}"/>
												<span class="text-danger">
													@if (isset($oldpass))
                                                        {{ $oldpass }}
                                                    @else
                                                        @error('old_password')
                                                            {{ $message }}
                                                        @enderror
                                                    @endif
												</span>

											</div>
										</div>
										<div class="row mb-3">
											<div class="col-md-12">
												<label class="form-label">New Password</label>
												<input class="form-control form-control-sm" type="text" name="password" placeholder="Enter your New password" value="{{ old('password') }}"/>
												<span class="text-danger">
													@error('password')
														{{ $message }}
													@enderror
												</span>

											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-md-12">
												<label class="form-label">Confirm Password</label>
												<input class="form-control form-control-sm" type="text" name="password_confirmation" placeholder="Confirm password " value="{{ old('password_confirmation') }}"/>
												<span class="text-danger">
													@error('password_confirmation')
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