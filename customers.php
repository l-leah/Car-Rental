<?php include('db_connect.php'); ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Customers</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
									<th class="text-center">Email Address</th>
									<th class="text-center">Contact</th>
									<th class="text-center">Home Address</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;

								$tt = array();
								$tt[] = '';
								$qry = $conn->query("SELECT * FROM transmission_types ");
								while ($row = $qry->fetch_assoc()) {
									$tt[$row['id']] = $row['name'];
								}
								$et = array();
								$et[] = '';
								$qry = $conn->query("SELECT * FROM engine_types ");
								while ($row = $qry->fetch_assoc()) {
									$et[$row['id']] = $row['name'];
								}
								$books = $conn->query("SELECT b.*,c.model,c.brand,c.transmission_id,c.engine_id FROM books b inner join cars c on c.id = b.car_id ");
								while ($row = $books->fetch_assoc()):

									?>
									<tr>
										<td class="text-center">
											<?php echo $i++ ?>
										</td>
										<td class="">
											<p> <b>
													<?php echo ucwords($row['name']) ?>
												</b></p>
										</td>
										<td class="">
											<p> <b>
													<?php echo ($row['email']) ?>
												</b></p>
										</td>
										<td class="">
											<p> <b>
													<?php echo ucwords($row['contact']) ?>
												</b></p>
										</td>
										<td class="">
											<p> <b>
													<?php echo ucwords($row['address']) ?>
												</b></p>
										</td>

										<td class="text-center">
											<button class="btn btn-sm btn-primary edit_book" type="button"
												data-id="<?php echo $row['id'] ?>">Edit</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
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

	img {
		max-width: 100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function () {
		$('table').dataTable()
	})

	$('.view_book').click(function () {
		uni_modal("Customer Details", "view_book.php?id=" + $(this).attr('data-id'), 'mid-large')

	})
	$('#new_book').click(function () {
		uni_modal("New Book", "manage_booking.php", "mid-large")

	})
	$('.edit_book').click(function () {
		uni_modal("Manage Book Details", "manage_customers.php?id=" + $(this).attr('data-id'), "mid-large")

	})
	$('.delete_book').click(function () {
		_conf("Are you sure to delete this book?", "delete_book", [$(this).attr('data-id')])
	})

	function delete_book($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_book',
			method: 'POST',
			data: { id: $id },
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>