@php
    $layout = '';
    if (session()->get('loginStatus') === 'superAdmin') {
        $layout = 'frontend.layoutsuperAdmin.main';
    } elseif (session()->get('loginStatus') === 'student') {
        $layout = 'frontend.layoutstudent.main';
    }
@endphp

@extends($layout)
@section('main-content')
@push('link-special')
	<link rel="canonical" href="https://demo-basic.adminkit.io/maps-google.html" />
@endpush
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Google Maps</h1>
						<a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
							Get more Google Maps examples
						</a>
					</div>
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Default Map</h5>
									<h6 class="card-subtitle text-muted">Displays the default road map view.</h6>
								</div>
								<div class="card-body">
									<div class="content" id="default_map" style="height: 300px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Hybrid Map</h5>
									<h6 class="card-subtitle text-muted">Displays a mixture of normal and satellite views.</h6>
								</div>
								<div class="card-body">
									<div class="content" id="hybrid_map" style="height: 300px;"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
@endsection
@push('script')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-aWrwgr64q4b3TEZwQ0lkHI4lZK-moM4&callback=initMaps" async defer></script>
	<script>
		function initMaps() {
			var defaultMap = {
				zoom: 14,
				center: {
					lat: 40.712784,
					lng: -74.005941
				},
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			new google.maps.Map(document.getElementById("default_map"), defaultMap);
			var hybridMap = {
				zoom: 14,
				center: {
					lat: 40.712784,
					lng: -74.005941
				},
				mapTypeId: google.maps.MapTypeId.HYBRID
			};
			new google.maps.Map(document.getElementById("hybrid_map"), hybridMap);
		}
	</script>
@endpush