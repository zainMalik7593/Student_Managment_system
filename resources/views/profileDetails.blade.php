@php
    $layout = '';
	$loginStatus = session()->get('loginStatus');
    if ($loginStatus === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
    } elseif ($loginStatus === 'student') {
        $layout = 'frontend.layoutstudent.main';
    } elseif ($loginStatus === 'admin') {
        $layout = 'frontend.layoutadmin.main';
    }
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />
@endpush
@section('main-content')
			<main class="content">
				@if (isset($msg1))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ $msg1 }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@endif
				<div class="container-fluid d-flex justify-content-center align-items-center">
					<div class="col-md-6 col-xl-4">
						<div class="card mb-3">
							<div class="card-header text-center">
								<h2 class="card-title fs-1 text-primary mb-0">
									@if ($loginStatus == 'superAdmin')
									Super Admin
									@elseif ($loginStatus == 'admin')
									Admin Profile
									@elseif ($loginStatus == 'student')
									Student Profile
									@endif
								</h2>
							</div>
							<div class="card-body text-center">
								<img 
								@if ($loginStatus == 'superAdmin')
									@if ($image != null)
										src="storage/uploads/{{ $image }}"
									@else
										src="frontend/img/icons/admin-icon.png"
									@endif
								@elseif ($loginStatus == 'admin')
									@if ($image != null)
										src="storage/uploads/{{ $image }}"
									@else
										src="frontend/img/icons/profile.png"
									@endif
								@elseif ($loginStatus == 'student')
									@if ($image != null)
										src="storage/uploads/{{ $image }}"
									@else
										src="frontend/img/icons/boy.png"
									@endif
								@endif
									alt="profile picture" class="img-fluid rounded-circle mb-2" width="150" height="150" />
									<h4 class="card-title text-dark mb-0">{{ $email }}</h4>
							</div>
							<hr class="my-0" />
							<div class="card-body text-center">
								<h5 class="text-primary">{!! '--{ Your Detail }--' !!}</h5>
								<ul class="list-unstyled mb-0">
								@if ($loginStatus == 'admin')
									<li class="mb-1"><span class="fw-bold text-dark">Name :</span> {{ $name }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Father Name :</span> {{ $father_name }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Age :</span> {{ $age }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Gender :</span> {{ $gender }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Date Of Birth :</span> {{ $dob }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Phone # No :</span> {{ $phone_number }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">CNIC :</span> {{ $cnic }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Address :</span> <br> {{ $address }}</li>
								@elseif ($loginStatus == 'student')
									<li class="mb-1"><span class="fw-bold text-dark">Status :</span> {{ $status }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Gr # No :</span> {{ $grno }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Name :</span> {{ $name }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Father Name :</span> {{ $father_name }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Date Of Birth :</span> {{ $dob }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Phone # No :</span> {{ $phone_number }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">CNIC :</span> {{ $cnic }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Gender :</span> {{ $gender }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Age :</span> {{ $age }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Timing :</span> {{ $time }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Class :</span> {{ $class }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Seat :</span> {{ $seat }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Course :</span> <br> {{ $course }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Address :</span> <br> {{ $address }}</li>
								@elseif ($loginStatus == 'superAdmin')
									<li class="mb-1"><span class="fw-bold text-dark">Name :</span> {{ $name }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Father Name :</span> {{ $father_name }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Gender :</span> {{ $gender }}</li>
									<li class="mb-1"><span class="fw-bold text-dark">Age :</span> {{ $age }}</li>
								@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
				
			</main>
			<script src="{{ url('frontend/js/app.js') }}"></script>
			<script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
@endsection
			