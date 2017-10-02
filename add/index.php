<!DOCTYPE html>
<html>
<head>
	<title>Sales Management</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


	<script type="text/javascript">
    	var url = "<?php $_SERVER['HTTP_HOST']; ?>/test_login";
    </script>
    <style type="text/css">
    	.modal-dialog, .modal-content{
		z-index:1051;
		}
    </style>

    <script src="http://www.grimlockpress.com/test_login/add/js/item-ajax.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        
		        <div class="pull-right">
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
								  Create Item
							</button>
		        </div>
		    </div>
		</div>

		<!-- Table  -->
		<div class="panel panel-primary">
			  <div class="panel-heading">Sales Management</div>
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
										<th>Action</th>
							    </tr>
							</thead>
							<tbody>
							</tbody>
						</table>

						<ul id="pagination" class="pagination-sm"></ul>
			  </div>
	  </div>

	    <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="/test_login/add/api/create.php" method="POST">

					      	<!-- <div class="form-group">
										<label class="control-label" for="date_1">Date:</label>
										<input type="date" id="myDate" name="date_1" class="form-control" data-error="Please enter Date." required />
										<div class="help-block with-errors"></div>
									</div> -->
									<input type="hidden" name="user_email" id="user_email" value=""/>
									<input type="hidden" name="user_id" id="user_id" value=""/>

									<div class="form-group">
										<label class="control-label" for="book_name">Book Name:</label>
										<input name="book_name" class="form-control" data-error="Please enter Book Name." required></input>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="Channel">Channel:</label>
										<input type="text" name="Channel" class="form-control" data-error="Please enter Channel." required />
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="precentage_commission">Precentage Commission:</label>
										<input type="number" step=any name="precentage_commission" class="form-control" data-error="Please enter Precentage Commission." required />
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="commission_amount">Commission Amount:</label>
										<input type="number" step=any name="commission_amount" class="form-control" data-error="Please enter Channel." required />
										<div class="help-block with-errors"></div>
									</div>


									<!-- <div class="form-group">
										<label class="control-label" for="running_total">Running Total:</label>
										<input type="number" name="running_total" class="form-control" data-error="Please enter Running Total." required />
										<div class="help-block with-errors"></div>
									</div> -->

									<div class="form-group" id="user_table">
		            		
		            	</div>

									<div class="form-group">
										<button type="submit" class="btn crud-submit btn-success" id="email-send">Submit</button>
									</div>
		      		</form>
		      </div>
		    </div>

		  </div>
		</div>

		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="/test_login/add/api/update.php" method="POST">
		      			<input type="hidden" name="id" class="edit-id">

			      			<div class="form-group">
										<label class="control-label" for="date_1">Date:</label>
										<input type="text" name="date_1" class="form-control" data-error="Please enter Date." required />
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="book_name">Book Name:</label>
										<input type="text" name="book_name" class="form-control" data-error="Please enter Book Name." required></input>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="Channel">Channel:</label>
										<input type="text" name="Channel" class="form-control" data-error="Please enter Channel." required></input>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="precentage_commission">Precentage Commission:</label>
										<input type="text" name="precentage_commission" class="form-control" data-error="Please enter Precentage Commission." required></input>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group">
										<label class="control-label" for="commission_amount">Commission Amount:</label>
										<input type="text" name="commission_amount" class="form-control" data-error="Please enter Commission Amount." required></input>
										<div class="help-block with-errors"></div>
									</div>

									<!-- <div class="form-group">
										<label class="control-label" for="running_total">Running Total:</label>
										<input type="number" name="running_total" class="form-control" data-error="Please enter Running Total." required></input>
										<div class="help-block with-errors"></div>
									</div> -->

								<div class="form-group">
									<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
								</div>

		      		</form>

		      </div>
		    </div>
		  </div>
		</div>

	</div>



	<script>
		function myFunction() {
		    var x = document.getElementById("myDate").value;
		  }
	</script>
</body>
</html>