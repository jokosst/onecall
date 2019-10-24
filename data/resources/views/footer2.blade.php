	<script src="{{ asset('assets/js/lib/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/popper/popper.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/tether/tether.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/plugins.js')}}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/lib/moment/moment-with-locales.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/lib/flatpickr/flatpickr.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
	<script src="{{ asset('assets/js/lib/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/prism/prism.js')}}"></script>
	<script src="{{ asset('assets/js/lib/datatables-net/datatables.min.js')}}"></script>
	<script>
		$(function() {
			var table = $('#example').DataTable({
				scrollX:        false,
				scrollCollapse: true,
				paging:         true,
				fixedColumns:   false,

			});
			

			$('.flatpickr').flatpickr();
		});
		
		
	</script>

<script src="{{ asset('assets/js/app.js')}}"></script>
</body>
</html>