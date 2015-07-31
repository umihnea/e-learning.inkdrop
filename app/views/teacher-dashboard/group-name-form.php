<script type="text/javascript" src="<?=DIR . 'app/files/'?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "#mytextarea"
	});
</script>

<div class="container" id="panels-container">
	<div class="container" id="form-container">
		<form method="post" action="">
			<div class="col-md-12">
				<?php if (isset($data['error'])) { ?>
				<?php foreach ($data['error'] as $error) { ?>
				<p style="color:red; padding: 10px;"><?=$error?></p>
				<?php } ?>
				<?php } ?>
				<label>Group Name:</label>
				<input name="group_name" type="text" placeholder="Group name" class="form-control"><br>
				<label>Group Description:</label>
				<textarea name="group_descr" id="mytextarea">Your description here</textarea><br>
				<center><input name="group_submit" type="submit" value="Create Group" class="btn btn-lg btn-info"></center>
			</div>
		</form>
	</div>
</div>