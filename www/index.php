<?php
// Turn off all error reporting
//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Rating system</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->	
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modal.js"></script>
<script src="js/star-rating.js" type="text/javascript"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
	<div class="col-md-4">
	
		<br><br><br><br><br>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Submit review</button>
		<br><br>
		<div id="message"></div>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Review System</h4>
					</div>
					
					<div class="modal-body">
						<form method="POST" id="dataform" action="" autocomplete="true">
							<label>Leave your Feedback</label>
							<input id="star" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="md">
							<label>Comments:</label>
							<textarea id="comment" class="form-control" placeholder="Please enter comments here about your experience with this teacher." rows="6"></textarea>
					</div>
					<div class="modal-footer">
							<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" id="submit_rate" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-4"></div>
  </div>
</div>
</body>
<script>
$(document).ready(function(){ 

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
});

$('#submit_rate').click(function(){
	var data = $('#dataform').serialize();
	var check=$.ajax({
	type:"post",
	url:"submit_rating.php",
	data:data,
	contentType:"application/x-www-form-urlencoded",
	success: function(responseData, textStatus , jqXHR){$('#message').html(responseData);},
	error:function(textStatus, errorThrown){console.log(errorThrown);}
 });
 return false;
 });
});
</script>

</html>