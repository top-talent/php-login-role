<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<script type="text/javascript">

    	var url = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/test_login";
    </script>
    <style type="text/css">
    	.modal-dialog, .modal-content{
		z-index:1051;
		}
    </style>
    <script src="js/item-ajax.js"></script>
</head>
<body>
	<div class="container" style="margin-top:50px;">
		<!-- Table  -->
		<div class="panel panel-primary">
			  <div class="panel-heading">User Management</div>
			  <div class="panel-body">
						<table class="table table-bordered">
							<thead>
							    <tr>
										<th>Date</th>
										<th>User Name</th>
										<th>Book Name</th>
										<th>Channel</th>
										<th>Percentage Commision</th>
										<th>Amount Commision</th>
										<th>Running Total</th>
							    </tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<ul id="pagination" class="pagination-sm"></ul>
			  </div>
	  </div>
		<div class="row">
		    <div class="col-lg-12 margin-tb">					  
		        <div class="pull-right">	
							<button type="button" class="btn btn-success payme" data-toggle="modal" data-target="#payme">
								  Pay Me
							</button>
		        </div>
		    </div>
		</div>
	</div>
	<script>
	// 	function myFunction() {
	// 	    var x = document.getElementById("myDate").value;
	// 	  }
	</script>
</body>
</html>