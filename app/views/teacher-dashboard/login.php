	<!-- Form -->

	<div class="container">
		<div id="collumn" class="col-md-6">
			<div class="panel panel-primary" id="log-in">
				<div class="panel-heading">
					<h4>Log In</h4>
				</div>
        <div style="padding: 20px;color: red;">
          <?php if (isset($data['login_error'])) { ?>
          <?php foreach ($data['login_error'] as $error) { ?>
            <p><?=$error?></p>
          <?php } ?>
          <?php } ?>
        </div>
			 <form class="form-horizontal" role="form" id="form" action="" method="post">
    			<div class="form-group">
      				<label class="control-label col-sm-2" for="username">Username:</label>
      				<div class="col-sm-10">
        				<input name="login_username" type="username" class="form-control" id="username"placeholder="Enter Username">
      				</div>
   				</div>
    			<div class="form-group">
      				<label class="control-label col-sm-2" for="pwd">Password:</label>
      				<div class="col-sm-10">          
        				<input name="login_password" type="password" class="form-control" id="pwd" placeholder="Enter password">
      				</div>
    			</div>
    			<div class="form-group">        
      				<div class="col-sm-offset-2 col-sm-10">
        				<div class="checkbox">
          					<label><input name="login_remember_me" type="checkbox"> Remember me</label>
        				</div>
      				</div>
    			</div>
    			<div class="form-group">        
      				<div class="col-sm-offset-2 col-sm-10">
       					<input type="submit" name="submit" class="btn btn-success" value="Log In">
      				</div>
    			</div>
  			</form>
  			<div class="panel-footer">
  				<h5 style="color: rgba(180, 180, 180, 1);">Copyright of InkDrop&copy;</h5>
  			</div>
		  </div>
	</div>

<script type="text/javascript">
		function animate(){
			var collumn = document.getElementById("collumn");
			collumn.style.marginTop = 0;
			collumn.style.opacity = 1;
		}
		setTimeout(animate, 200);
</script>
</body>
</html>