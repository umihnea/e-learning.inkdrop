<div class="container">
			<?php if (isset($data['add_error'])) { ?>
				<p style="color: red; padding: 10px;"><?=$data['add_error']?></p>
			<?php } ?>
			<?php if (isset($data['del_error'])) { ?>
				<p style="color: red; padding: 10px;"><?=$data['del_error']?></p>
			<?php } ?>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Add people</h3>
					</div>
				<!-- ADD TABLE -->
					<table class="table table-hover">
						<thead>
							<th>Username</th>
							<th>First Name</th>
							<th>Last name</th>
							<th></th>
						</thead>
						<tbody>
							<tr>
							<?php if (isset($data['search_message'])) { ?>
								<td colspan="5">									
									<span style="color: red;"><?=$data['search_message']?></span>
								</td>
							<?php } ?>
							<?php if (!isset($data['search_message']) && !isset($data['search_results'])) { ?>
								<td colspan="5">									
									search an username below
								</td>
							<?php } ?>
							</tr>
							<?php if (isset($data['search_results'])) { ?>
							<?php foreach ($data['search_results'] as $result) { ?>
								<tr>
									<td><h5><?=$result['username']?></h5></td>
									<td><h5><?=$result['first_name']?></h5></td>
									<td><h5><?=$result['last_name']?></h5></td>
									<td>
										<form action="" method="post">
											<input name="id" type="hidden" value="<?=$result['id']?>">
											<input name="add" type="submit" value="Add" class="btn btn-sm btn-success">
										</form>
									</td>
								</tr>
							<?php } ?>
							<?php } ?>
						</tbody>
					</table>

					<!-- ADD TABLE END -->
				</div>
						<form id="search-form" method="post" action="" class="search-form">
						<div class="form-group has-feedback">
	            				<label for="search" class="sr-only">Search</label>
					           	<input type="text" class="form-control" name="search_username" id="search" placeholder="hit enter to search">
	              				<input name="search_submit" type="submit" class="btn btn-sm btn-success" style="margin-top: 10px" value="Search">
	            			</div>
	            		</form>
			</div>
			<div class="col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3>People in group</h3>
					</div>
					<!-- REMOVE TABLE -->
					<table class="table table-hover">
						<thead>
							<th>Username</th>
							<th>First Name</th>
							<th>Last name</th>
							<th></th>
						</thead>
						<tbody>
						<?php if (isset($data['member_list'])) { ?>
						<?php foreach ($data['member_list'] as $member) { ?>
							<tr>
								<td>
									<h5><?=$member['username']?></h5>
								</td>
								<td>
									<h5><?=$member['first_name']?></h5>
								</td>
								<td>
									<h5><?=$member['last_name']?></h5>
								</td>
								<td>
									<form action="" method="post">
										<input name="id" type="hidden" value="<?=$member['id']?>">
										<input name="del" type="submit" value="Remove" class="btn btn-sm btn-danger">
									</form>
								</td>
							</tr>
						<?php } ?>
						<?php } ?>
						</tbody>
					</table>

					<!-- REMOVE TABLE END -->
					<div class="panel-footer">
						<h5>Copyright InkDrop.inc &copy;</h5>
	            	</div>
				</div>
			</div>
		</div>
		<center><a href="<?=DIR.'teacher/submit-group'?>"><button class="btn btn-lg btn-info">Finish</button></a></center>
	</body>
</html>