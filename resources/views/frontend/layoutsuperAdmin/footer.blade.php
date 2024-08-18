<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="#" target="_blank"><strong>Simsat Computer Academy</strong></a> &copy;
                </p>
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Terms</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="{{url('frontend/js/app.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.js')}}"></script>
<script src="{{url('frontend/js/jquery-3.7.1.min.js')}}"></script>
<script>
    let togle = true;
    
        $('.js-sidebar-toggle').on('click',function () {
            if (togle) {
                $('#sidebar').addClass('collapsed');
                togle = false;
            } else {
                $('#sidebar').removeClass('collapsed');
                togle = true;
            }
        })
    
    
</script>
@stack('script')
</body>
</html>