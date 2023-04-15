$(function() {
	"use strict";
	
	
	    $(document).ready(function() {
			$('#example').DataTable();
			$('#example3').DataTable();
			$('#example4').DataTable();
			$('#example5').DataTable();

			 $('.without_paginataion_table').dataTable({
				"bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
				"paging": false,//Dont want paging                
				"bPaginate": false,//Dont want paging      
			});
		 
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	
	
	});