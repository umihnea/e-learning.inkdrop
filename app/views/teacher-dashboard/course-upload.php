<script src="<?=DIR?>app/files/tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "#mytextarea"
	});
</script>
<body>
    <div class="container">
        <div class="col-md-7 col-sm-7 col-lg-7" id="inform">
            <form id="form" method="post" action="" name="form">
                <h4>Course name:</h4><input name="upload_name" class="form-control" type="text"><br>

                <h4>Course description:</h4>
                <textarea name="upload_desc" id="mytextarea">
				    Description Here
				</textarea><br>

                <div id="dropzone">
                    <h4>Choose .PDF file to upload</h4>
                    <input name="upload_file" class="form-control" id="file-input" type="file">
                </div>
                <hr>
                <input name="upload_submit" class="btn btn-lg btn-success" type="submit" value="Upload your course">
            </form>
        </div>
    </div>
</body>
</html>