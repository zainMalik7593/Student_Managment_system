@php
    $layout = '';
    if (session()->get('loginStatus') === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
    } elseif (session()->get('loginStatus') === 'student') {
        $layout = 'frontend.layoutstudent.main';
    }
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
	<title>Admission Form | Simsat</title>
@endpush
@section('main-content')
<div class="card-body">
	@if (isset($msg1))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ $msg1 }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif (isset($msg2))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
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
							<h1 class="h1 fw-bolder">Student Registration Form,</h1>
							<p class="lead">
								Join our IT center by completing the enrollment form and start your journey in technology today!
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center mb-4">
										<img src="{{ url('frontend/img/icons/boy.png') }}" alt="Charles Hall" class="img-fluid rounded-circle" width="112" height="132" />
									</div>
									<form action="{{ url('/student/admission') }}" enctype="multipart/form-data" method="POST">
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
											<div class="col-md-6">
												<label class="form-label">CNIC</label>
												<input class="form-control form-control-sm" type="text" name="CNIC" placeholder="Enter CNIC Num Without special Char" value="{{ old('CNIC') }}"/>
												<span class="text-danger">
													@error('CNIC')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">Time</label>
												<select name="time" class="time form-control form-control-sm">
													<option value="" selected disabled>select your time</option>
												</select>
												<span class="text-danger">
													@error('name')
														{{ $message }}
													@enderror
												</span>
											</div>
											
										</div>
										<div class="row mb-3">
											<div class="col-md-6">
												<label class="form-label">Class</label>
												<select name="class" class="class form-control form-control-sm">
													<option value="" disabled selected>select your class</option>
												</select>
												<span class="text-danger">
													@error('name')
														{{ $message }}
													@enderror
												</span>
											</div>
											<div class="col-md-6">
												<label class="form-label">Seat</label>
												<select name="seat" class="seat form-control form-control-sm">
													<option value="" selected disabled>select your seat</option>
												</select>
												<span class="text-danger">
													@error('name')
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
													<input class="form-check-input" id="male" type="radio" value="Male" name="gender" />
													<label class="form-check" for="male">Male</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" id="female" type="radio" value="Female" name="gender" />
													<label class="form-check" for="female">Female</label>
												</div>
												<div class="form-check">
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
	<script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ url('frontend/js/app.js') }}"></script>
	<script>
		$('.time').on('focus',function () {
			const baseUrl = "{{ url('/') }}";
			const apiUrl = `${baseUrl}/api/user/unreserved_seats`;
			fetch(apiUrl)
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok ' + response.statusText);
				}
				return response.json();
			})
			.then(data => {
				const usersArray = Object.values(data);
				const userSelect = document.querySelector('.time');
				userSelect.innerHTML = '';
				const option = document.createElement('option');
					option.value = '';
					option.textContent = 'select your time';
					userSelect.appendChild(option);
				usersArray.forEach(user => {
					const option = document.createElement('option');
					option.value = user.timeid;
					option.textContent = user.time.time;
					userSelect.appendChild(option);
				});
			})
			.catch(error => {
				console.error('There has been a problem with your fetch operation:', error);
			});
		})
		$('.time').on('change',function () {
			const time = this.value;
			const baseUrl = "{{ url('/') }}";
			const apiUrl = `${baseUrl}/api/user/unreserved_seats/${time}`;
			fetch(apiUrl)
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok ' + response.statusText);
				}
				return response.json();
			})
			.then(data => {
				const usersArray = Object.values(data);
				const userSelect = document.querySelector('.class');
				userSelect.innerHTML = '';
				const option = document.createElement('option');
					option.value = '';
					option.textContent = 'select your class';
					userSelect.appendChild(option);
				usersArray.forEach(user => {
					const option = document.createElement('option');
					option.value = user.classid;
					option.textContent = 'Room   #   '+ user.class.class;
					userSelect.appendChild(option);
				});
			})
			.catch(error => {
				console.error('There has been a problem with your fetch operation:', error);
			});
		})
		$('.class').on('change',function () {
			const Class = this.value;
			const time = document.querySelector('.time').value;
			const baseUrl = "{{ url('/') }}";
			const apiUrl = `${baseUrl}/api/user/unreserved_seats/${time}/${Class}`;
			fetch(apiUrl)
			.then(response => {

				if (!response.ok) {
					throw new Error('Network response was not ok ' + response.statusText);
				}
				return response.json();
			})
			.then(data => {
				const usersArray = Object.values(data);
				const userSelect = document.querySelector('.seat');
				userSelect.innerHTML = '';
				const option = document.createElement('option');
					option.value = '';
					option.textContent = 'select your seat';
					userSelect.appendChild(option);
				usersArray.forEach(user => {
					const option = document.createElement('option');
					option.value = user.seatid;
					option.textContent = user.seat.seatno;
					userSelect.appendChild(option);
				});
			})
			.catch(error => {
				console.error('There has been a problem with your fetch operation:', error);
			});
		})
	</script>
</div>
							
@endsection