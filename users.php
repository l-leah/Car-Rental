<?php include('db_connect.php'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right"
					href="javascript:void(0)" id="new_user">
					<i class="fa fa-plus"></i> New Entry
				</a></span>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Username</th>
							<th class="text-center">Type</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$type = array("", "Admin", "Staff", "Alumnus/Alumna");
						$users = $conn->query("SELECT * FROM users order by name asc");
						while ($row = $users->fetch_assoc()):
							?>
							<tr>
								<td class="text-center">
									<?php echo $i++ ?>
								</td>
								<td>
									<?php echo ucwords($row['name']) ?>
								</td>
								<td>
									<?php echo $row['username'] ?>
								</td>
								<td>
									<?php echo $type[$row['type']] ?>
								</td>
								<td class="text-center">
									<button class="btn btn-sm btn-primary edit_user" type="button"
										data-id="<?php echo $row['id'] ?>">Edit</button>
									<button class="btn btn-sm btn-danger delete_user" type="button"
										data-id="<?php echo $row['id'] ?>">Delete</button>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td {
		vertical-align: middle !important;
	}

	td p {
		margin: unset
	}
</style>
<script>
	$('table').dataTable();
	$('#new_user').click(function () {
		uni_modal('New User', 'manage_user.php', "mid-large")
	})
	$('.edit_user').click(function () {
		uni_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'), "mid-large")
	})
	$('.delete_user').click(function () {
		_conf("Are you sure to delete this Admin?", "delete_user", [$(this).attr('data-id')])
	})
	function delete_user($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_user',
			method: 'POST',
			data: { id: $id },
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data Successfully Deleted.", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)
				}
			}
		})
	}
</script>