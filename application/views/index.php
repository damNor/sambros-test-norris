<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Company Module</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Hilon</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active">
		        <a href="#">Company <span class="sr-only">(current)</span></a>
		        </li>
		        <li><a href="#">PIC</a></li>
		      </ul>
		      
		       
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	<!-- navbar -->
	<div class="container">
		 
	</div>
	 

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	 <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var base_url = "<?php echo $base_url; ?>";
		
		$(document).ready(function()
		{
				$.getJSON('http://localhost/codeIgniter-3_1_10/home/get',function( data ) {
					var items = [];
					$.each( data, function( key, value ) 
					{
						console.log(value);
						items.push("<li id='"+key+"' >" + value.title+ "&nbsp;|&nbsp;"+value.date_added+"" + value.file_name+" &nbsp;|&nbsp;"+value.date_added+"</li>");
					});
					$("<ul/>", {
						"class":"list-files",
						html: items.join( "" )
					}).appendTo("#uploaded-files")
				});

					$('#fileUploadForm').submit(function(event){
				event.preventDefault();

				var form = $('#fileUploadForm')[0];
				console.log(form);

				var data = new FormData(this);
				console.log(data);

				// data.append("CustomField", "This is some extra data, testing");

				$("#btnSubmit").prop("disabled", true);

				$.ajax({
					// enctype: 'multipart/form-data',
					url:  'http://localhost/codeIgniter-3_1_10/upload',
					type: "POST",
					data:new FormData(this),
		            processData:false,
		            contentType:false,
		            cache:false,
		            async:false,
					timeout: 600000,
					success: function(data)
					{
						$("#result").text(data.message);
						console.log("Success : ", data);
						$("#btnSubmit").prop("disabled", false);

						$.getJSON('http://localhost/codeIgniter-3_1_10/home/get_last',function( data ) 
						{
							var items = [];
							$.each( data, function( key, value ) 
							{
								console.log(value);
								items.push("<li id='"+key+"' >" + value.title+ "&nbsp;|&nbsp;"+value.file_name+" &nbsp;|&nbsp;"+value.date_added+"</li>");
							});
							$("<ul/>", {
								"class":"list-files",
								html: items.join( "" )
							}).appendTo("#uploaded-files")
						});
					},
					error: function(e)
					{
						$("#result").text(e.responseText);
						console.log("ERROR : ",e);
						// $("#btnSubmit").prop("disabled",true);
					}
				});
			});

		});
		
	
	</script>
</body>
</html>