    
    
<script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/jquery-knob/jquery.knob.js"></script>
{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/input-tags/js/tagsinput.js"></script> 
<script>
    @if (Session::has('errormessage'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('errormessage') }}");
    @endif
    @if (Session::has('successmessage'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('successmessage') }}");
    @endif
    $(function() {
        $(".knob").knob();
    });
</script>
<script src="{{ asset('backend') }}/assets/js/index.js"></script>
<!--app JS-->
<script src="{{ asset('backend') }}/assets/js/app.js"></script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
      selector: '#long_des'
    });
    function preImage(inputVal){
        if (inputVal.files && inputVal.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageView').attr('src',e.target.result);
            }
            reader.readAsDataURL(inputVal.files[0]);
        }
    }
</script>
