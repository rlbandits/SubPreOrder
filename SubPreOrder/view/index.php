<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/SubPreOrder/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="/SubPreOrder/assets/js/jquery/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="/SubPreOrder/assets/js/jquery/bootstrap-3.3.7.min.js"></script>
		
		<script type="text/javascript" src="/SubPreOrder/assets/js/process.js"></script>
		<script type="text/javascript" src="/SubPreOrder/assets/js/panels.js"></script>

		<link rel="stylesheet" href="/SubPreOrder/assets/css/styles.css">
	</head>
	<body>
		<div class="loading"></div>
		<div class="container">

			<!-- MODALS -->
			<div class="modal fade" id="confirmDelete" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Cancel Order?!</h4>
				        </div>
				        <div class="modal-body">
				        	Would you like to cancel your order?
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
    						<button type="button" class="btn btn-primary">Yes</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Order Summary</h4>
				        </div>
				        <div class="modal-body">

				        </div>
				        <div class="modal-footer" id="modal-footer1">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Edit Order</button>
    						<button type="button" class="btn btn-primary">Proceed</button>
				        </div>
				        <div class="modal-footer" id="modal-footer2">
				        	<input type="hidden" id="fetchedCode">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
    						<button type="button" class="btn btn-primary">Cancel order</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="confirmOrder" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">YEAH!!!</h4>
				        </div>
				        <div class="modal-body">
				        	
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="findOrder" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Please enter order code</h4>
				        </div>
				        <div class="modal-body">
				        	<input type="text" id="orderCode"/>
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">Find</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="emptyChecker0" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Wooops!</h4>
				        </div>
				        <div class="modal-body">
				        	No bread, No Go! Go choose what kind of bread you like!
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="emptyChecker1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Wooops!</h4>
				        </div>
				        <div class="modal-body">
				        	Don't want any sauce to go with that?
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Oh yeah! I forgot!</button>
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">Nope!</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="emptyChecker2" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Wooops!</h4>
				        </div>
				        <div class="modal-body">
				        	Choose your sandwich will ya?!
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="emptyChecker3" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Wooops!</h4>
				        </div>
				        <div class="modal-body">
				        	NO CHEESE?!
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Oh yeah! I forgot!</button>
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">No cheese!</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<div class="modal fade" id="emptyChecker4" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Wooops!</h4>
				        </div>
				        <div class="modal-body">
				        	NO VEGGIES?!
				        </div>
				        <div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Oh yeah! I forgot!</button>
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">No veggy!</button>
				        </div>
			    	</div>
			    </div>
			</div>

			<!-- BODY CONTENTS -->
			<div class="info">
				<div class="infoContent">
					Name: 
					<input type="text" class="reqd" id="uName" name="uName" data-toggle="tooltip" data-placement="top" title="This feild is required!"/>
				</div>
				<div class="infoContent">
					eMail: 
					<input type="eMail" class="reqd" id="eMail" name="eMail" data-toggle="tooltip" data-placement="top" title="This feild is required!"/>
				</div>
			</div>
			
			<div class="panelContainer">
				<div class="panels col-sm-2" id="panel0">

				</div>
				<div class="panels col-sm-2" id="panel1">

				</div>
				<div class="panels col-sm-3" id="panel2">

				</div>
				<div class="panels col-sm-2" id="panel3">

				</div>
				<div class="panels col-sm-3" id="panel4">
				</div>
			</div>

			<button id="submit" class="btn btn-info btn-lg" data-toggle="modal" >Submit</button>
			<button id="cancel" class="btn btn-info btn-lg" data-toggle="modal" data-target="#findOrder">Find my order</button>

		</div>
	</body>
</html>