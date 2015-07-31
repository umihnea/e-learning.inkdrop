<strong>search by username</strong>
<form method="post" action="">
<input type="text" name="search_username"></input>
<input type="submit" value="Search" name="search_submit"></input>
</form>

<?php if (isset($data['search_results'])) { ?>
<ol>
<?php foreach($data['search_results'] as $result) { ?>
<li><?=$result['first_name']?>&nbsp;<?=$result['last_name']?>&nbsp;(<i><?=$result['username']?></i>)</li>
</ol>
<?php } ?>
<?php } ?>

<?php if (isset($data['search_message'])) { ?>
<p style="color: red;"><?=$data['search_message'];?></p>
<?php } ?>

