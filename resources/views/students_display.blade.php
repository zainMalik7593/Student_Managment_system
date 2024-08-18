@php
    $layout = '';
	$loginStatus = session()->get('loginStatus');
    if ($loginStatus === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
		$editpath = url('/super');
    } elseif ($loginStatus === 'student') {
        $layout = 'frontend.layoutstudent.main';
		$editpath = '#';
    } elseif ($loginStatus === 'admin') {
        $layout = 'frontend.layoutadmin.main';
		$editpath = '#';
    }
@endphp

@extends($layout)
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />
    <link rel="stylesheet" href="{{ url('frontend/css/datatables.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/datatables.min.css') }}">
    <style>
        @media (max-width: 768px) {
            #table td, #table th {
                font-size: 12px;
                padding: 5px;
            }
        }

        @media (max-width: 576px) {
            #table td, #table th {
                font-size: 10px;
                padding: 3px;
            }
        }
    </style>
@endpush
@push('script')
    <script src="{{ url('frontend/js/datatables.min.js') }}"></script>
    <script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        let table = new DataTable('#table');
    </script>
@endpush
@section('main-content')
			<main class="content">
				<div class="container">
                    @if (isset($msg1))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $msg1 }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="container h-20 p-0">
                        <div class="row">
                            <div class="col-2">
                                <a href="{{ route('student_admission')}}">
                                    <button class="btn btn-dark text-start"><i class="fa fa-university align-middle"></i> Add</button>
                                </a>
                            </div>
                            <div class="col-10">
                                <h1 style="font-family: " class="mt-1 text-center m-0 p-0 fw-bolder  mb-5">Student Manager Portal,</h1>
                            </div>
                        </div>
                    </div>
                <div class="row mt-5">
                    <div class="col"  style="overflow-x: auto;">
                        <table class="table table-bordered table-striped text-center " id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="align-middle  m-0">Profile</th>
                                    <th class="align-middle  m-0">Name</th>
                                    <th class="align-middle  m-0">Father Name</th>
                                    <th class="align-middle  m-0">Email</th>
                                    <th class="align-middle  m-0">age</th>
                                    <th class="align-middle  m-0">Gender</th>
                                    <th class="align-middle  m-0">Course</th>
                                    <th class="align-middle  m-0">Phone No</th>
                                    <th class="align-middle  m-0">CNIC</th>
                                    <th class="align-middle  m-0">Timing</th>
                                    <th class="align-middle  m-0">Class</th>
                                    <th class="align-middle  m-0">Seat</th>
                                    <th class="align-middle  m-0">Address</th>
                                    <th class="align-middle  m-0">Login Gmail</th>
                                    <th class="align-middle  m-0">Login password</th>
                                    <th class="align-middle  m-0">Edit</th>
                                    <th class="align-middle  m-0">Profile Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request as $res)
                                <tr>
                                    <td class='align-middle'>
                                        @if ($res->image)
                                            <img src="{{ url("storage/uploads/$res->image") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                        @else
                                            @if ($res->gender == 'Male')
                                                <img src="{{ url("frontend/img/icons/boy.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                            @else
                                                <img src="{{ url("frontend/img/icons/girl.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                                
                                            @endif
                                        @endif
                                    </td>
                                    <td class='align-middle'>{{ $res->name }}</td>
                                    <td class='align-middle'>{{ $res->father_name }}</td>
                                    <td class='align-middle'>{{ $res->email }}</td>
                                    <td class='align-middle'>{{ $res->age }}</td>
                                    <td class='align-middle'>{{ $res->gender }}</td>
                                    <td class='align-middle'>{{ $res->course }}</td>
                                    <td class='align-middle'>{{ $res->phone_number }}</td>
                                    <td class='align-middle'>{{ $res->cnic }}</td>
                                    <td class='align-middle'>{{ $res->time }}</td>
                                    <td class='align-middle'>{{ $res->class }}</td>
                                    <td class='align-middle'>{{ $res->seatno }}</td>
                                    <td class='align-middle'>{{ $res->address }}</td>
                                    <td class='align-middle'>{{ $res->gmail_account }}</td>
                                    <td class='align-middle'>{{ $res->password }}</td>
                                    <td class='align-middle'>
                                        <a href="{{ route('updateform',['id' => $res->id]) }}">
                                            <span class="badge text-bg-primary">Edit</span>
                                        </a>
                                    </td>
                                    <td class='align-middle'>
                                        <a href="{{ route('profileDlt',['id' => $res->id]) }}">
                                            <span class="badge text-bg-danger">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</main>
            <script src="{{ url('frontend/js/app.js') }}"></script>
            <script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
@endsection
			