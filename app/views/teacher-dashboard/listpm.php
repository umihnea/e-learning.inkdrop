<!doctype html>
<html lang="em">
	<head>
		<title>InkDrop Inbox</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  	<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    	<link rel="stylesheet" type="text/css" href="css/DasreMailCSS.css">
	</head>
	<body>

	<!-- Page content -->

	<!-- Messages Container-->

	<div class="container">
	<ul class="nav nav-tabs">
		    <li class="active"><a href="#">Inbox</a></li>
  			<li><a href="DasreMailOutbox.html">Outbox</a></li>
		</ul>
	</div>
	<div class="container" id="messages-container">
		
		<table class="table table-hover" id="messages-list">
		    <thead id="mes-header">
			    <tr>
			        <th>Name</th>
			        <th>Subject</th>
			        <th>Date</th>
			        <th></th>
			    </tr>
			</thead>
		    <tbody>

			    <tr class="message new">
				    <td>Eduard</td>
			        <td>I love bootstrap</td>
			        <td>27/07/2015</td>
			        <td id="view"><span class="glyphicon glyphicon-eye-open" ></span></td>
		      	</tr>
		    </tbody>
		</table>
	
	<!-- Mailing buttons -->

	</div>
	<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
		<a href="DasreCompose.html" class="btn btn-md btn-success">Compose</a>
		<a href="#" class="btn btn-md btn-info">Manage</a>
	</div>

    	

			<script src="js/sidebarfunctionality.js"></script>
	</body>
</html>