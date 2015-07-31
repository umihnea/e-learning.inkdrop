<script type="text/javascript">
tinymce.init({
	selector: "#mytextarea"
});
</script>
<div class="container">
		<div class="panel panel-default" style="margin-bottom: -3px;">
			<div class="panel-heading" style="background-color: rgba(100, 100, 100, 1); color: white;">
				Compose new message <span class="glyphicon glyphicon-envelope"></span>
			</div>
		</div>
		<form role="form" id="tiny-form">
    		<input type="text" name="reciever" placeholder="To:" class="form-control" required="required" style="border-radius: 0;">
    		<input type="text" name="subject" placeholder="Subject:" class="form-control" required="required" style="border-radius: 0;">
	        <textarea id="mytextarea">Your message here</textarea>
	        <input type="submit" value="Send" class="btn btn-md btn-success" style="float: right; margin: 5px;">
    	</form>
		<a href="#" class="btn btn-md btn-warning" style="float: right; margin: 5px;" id="delete">Inbox</a>
</div>
</body>
</html>