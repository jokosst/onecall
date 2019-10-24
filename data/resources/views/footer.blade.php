	
	<script src="{{ asset('assets/js/lib/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/popper/popper.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/tether/tether.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/plugins.js')}}"></script>
	<script src="{{ asset('assets/js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/datatables-net/datatables.min.js')}}"></script>
	<script src="{{ asset('assets/js/lib/charts-c3js/c3.min.js')}}"></script>
<script src="{{ asset('assets/js/lib/charts-c3js/c3js-init.js')}}"></script>
<script src="{{ asset('assets/js/lib/d3/d3.min.js')}}"></script>


	<!-- <script src="{{ asset('assets/js/lib/bootstrap-table/bootstrap-table.js')}}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap-table/bootstrap-table-fixed-columns.js')}}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap-table/bootstrap-table-fixed-columns-init.js')}}"></script> -->
	<script>
		$(function() {
			var table = $('#example').DataTable({
				scrollX:        true,
				scrollCollapse: true,
				paging:         true,
				fixedColumns:   false
			});
			var table = $('#example3').DataTable({
				scrollX:        true,
				scrollCollapse: true,
				paging:         true,
				pageLength: 	100,
				fixedColumns:   false
			});

			setTimeout(function() {
				table.draw();
			}, 50);

			$('#example2').DataTable({
				responsive: true
			});

		});

		 $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
		
 
	</script>

	

<script src="{{ asset('assets/js/app.js')}}"></script>
</body>
</html>