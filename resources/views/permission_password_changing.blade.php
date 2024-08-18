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
    <script src="{{ url('frontend/js/app.js') }}"></script>
    <script src="{{ url('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        let table1 = new DataTable('#table1');
        let table2 = new DataTable('#table2');
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
                    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif" class="mt-1 text-center fw-bolder mb-5">Manage Passwords Permissions</h1>
                <div class="row mb-5 mt-5">
                    <div class="col"  style="overflow-x: auto;">
                        <table class="table table-bordered table-striped text-center " id="table1">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="align-middle  m-0">User_id</th>
                                    <th class="align-middle  m-0">Email</th>
                                    <th class="align-middle  m-0">Password</th>
                                    <th class="align-middle  m-0">New Password</th>
                                    <th class="align-middle  m-0">User Type</th>
                                    <th class="align-middle  m-0">Request_Status</th>
                                    <th class="align-middle  m-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestPassword as $res)
                                <tr>
                                    <td class='align-middle'>{{ $res->changeid }}</td>
                                    <td class='align-middle'>{{ $res->email }}</td>
                                    <td class='align-middle'>{{ $res->old_password }}</td>
                                    <td class='align-middle'>{{ $res->new_password }}</td>
                                    <td class='align-middle'>{{ $res->user_type }}</td>
                                    <td class='align-middle'>{{ $res->request_status }}</td>
                                    <td class='align-middle'>
                                        <a href='{{ route('pass_permit_accept',['id' => $res->id]) }}'>
                                            <span class="badge text-bg-primary">Accept</span>
                                        </a>
                                        <br>
                                        <a href='{{ route('pass_permit_reject',['id' => $res->id]) }}'>
                                            <span class="badge text-bg-danger">Reject</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif" class="mt-5 text-center fw-bolder mb-5">Manage Profile Permissions</h1>
                <div class="row mt-5">
                    <div class="col"  style="overflow-x: auto;">
                        <table class="table table-bordered table-striped text-center " id="table2">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="align-middle">From Profile</th>
                                    <th class="align-middle">To Profile</th>
                                    <th class="align-middle">From Name</th>
                                    <th class="align-middle">To Name</th>
                                    <th class="align-middle">From Father</th>
                                    <th class="align-middle">To Father</th>
                                    <th class="align-middle">From Email</th>
                                    <th class="align-middle">To Email</th>
                                    <th class="align-middle">From Age</th>
                                    <th class="align-middle">To Age</th>
                                    <th class="align-middle">From CNIC</th>
                                    <th class="align-middle">To CNIC</th>
                                    <th class="align-middle">From Phone no</th>
                                    <th class="align-middle">To Phone no</th>
                                    <th class="align-middle">From DOB</th>
                                    <th class="align-middle">To DOB</th>
                                    <th class="align-middle">From Address</th>
                                    <th class="align-middle">To Address</th>
                                    <th class="align-middle">Request_Status</th>
                                    <th class="align-middle">User Type</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestProfile as $res)
                                <tr>
                                    <td class='align-middle'>
                                        @if ($res->from_img)
                                            <img src="{{ url("storage/uploads/$res->from_img") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                        @else
                                            @if ($res->usertype == 'student')
                                                @if ($res->gender == 'Male')
                                                    <img src="{{ url("frontend/img/icons/boy.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                                @else
                                                    <img src="{{ url("frontend/img/icons/girl.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                                @endif
                                            @else
                                                @if ($res->gender == 'Male')
                                                    <img src="{{ url("frontend/img/icons/profile.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                                @else
                                                    <img src="{{ url("frontend/img/icons/girl-profile.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                                @endif
                                            @endif
                                           
                                        @endif
                                    </td>
                                    <td class='align-middle'>
                                        @if ($res->to_img)
                                            <img src="{{ url("storage/uploads/$res->to_img") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                        @else
                                            @if ($res->gender == 'Male')
                                                <img src="{{ url("frontend/img/icons/boy.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                            @else
                                                <img src="{{ url("frontend/img/icons/girl.png") }}" class="rounded-circle me-2" height="45" width="45" alt="">
                                            @endif
                                        @endif
                                    </td>
                                    <td class='align-middle'>{{ $res->from_name }}</td>
                                    <td class='align-middle'>{{ $res->to_name }}</td>
                                    <td class='align-middle'>{{ $res->from_father }}</td>
                                    <td class='align-middle'>{{ $res->to_father }}</td>
                                    <td class='align-middle'>{{ $res->from_email }}</td>
                                    <td class='align-middle'>{{ $res->to_email }}</td>
                                    <td class='align-middle'>{{ $res->from_age }}</td>
                                    <td class='align-middle'>{{ $res->to_age }}</td>
                                    <td class='align-middle'>{{ $res->from_cnic }}</td>
                                    <td class='align-middle'>{{ $res->to_cnic }}</td>
                                    <td class='align-middle'>{{ $res->from_phoneNo }}</td>
                                    <td class='align-middle'>{{ $res->to_phoneNo }}</td>
                                    <td class='align-middle'>{{ $res->from_dob }}</td>
                                    <td class='align-middle'>{{ $res->to_dob }}</td>
                                    <td class='align-middle'>{{ $res->from_address }}</td>
                                    <td class='align-middle'>{{ $res->to_address }}</td>
                                    <td class='align-middle'>{{ $res->usertype }}</td>
                                    <td class='align-middle'>{{ $res->request_status }}</td>
                                    <td class='align-middle'>
                                        <a href='{{ route('profile_permit_accept',['id' => $res->id]) }}'>
                                            <span class="badge text-bg-primary">Accept</span>
                                        </a>
                                        <br>
                                        <a href='{{ route('profile_permit_reject',['id' => $res->id]) }}'>
                                            <span class="badge text-bg-danger">Reject</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</main>
@endsection
			