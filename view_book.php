<?php include 'db_connect.php' ?>
<?php
if (isset($_GET['id'])) {
	$qry = $conn->query("SELECT * FROM cars where id= " . $_GET['id']);
	foreach ($qry->fetch_array() as $k => $val) {
		$$k = $val;
	}
	$pickup_qry = $conn->query("SELECT * FROM books where id = $id");
	$pickup = $pickup_qry->num_rows > 0 ? $pickup_qry->fetch_array()['pickup_datetime'] : '';
	$dropoff_qry = $conn->query("SELECT * FROM books where id = $id");
	$dropoff = $dropoff_qry->num_rows > 0 ? $dropoff_qry->fetch_array()['dropoff_datetime'] : '';
	$status_qry = $conn->query("SELECT * FROM books where id = $id");
	$status = $status_qry->num_rows > 0 ? $status_qry->fetch_array()['status'] : '';
	$cat_qry = $conn->query("SELECT * FROM categories where id = $category_id");
	$category = $cat_qry->num_rows > 0 ? $cat_qry->fetch_array()['name'] : '';
	$engine_qry = $conn->query("SELECT * FROM engine_types where id = $engine_id");
	$engine = $engine_qry->num_rows > 0 ? $engine_qry->fetch_array()['name'] : '';
	$trans_qry = $conn->query("SELECT * FROM transmission_types where id = $category_id");
	$transmission = $trans_qry->num_rows > 0 ? $trans_qry->fetch_array()['name'] : '';
}
?>
<style type="text/css">
	.avatar {
		max-width: calc(100%);
		max-height: 27vh;
		align-items: center;
		justify-content: center;
		padding: 5px;
	}

	.avatar img {
		max-width: calc(100%);
		max-height: 27vh;
	}

	p {
		margin: unset;
	}

	#uni_modal .modal-footer {
		display: none
	}

	#uni_modal .modal-footer.display {
		display: block
	}
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div>
			<center>
				<div class="avatar">
					<img src="assets/uploads/cars_img/<?php echo $img_path ?>" class="" alt="">
				</div>
			</center>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<p>Brand: <b>
						<?php echo $brand ?>
					</b></p>
				<p>Model: <b>
						<?php echo $model ?>
					</b></p>
				<p>Category: <b>
						<?php echo $category ?>
					</b></p>
				<p>Transmission: <b>
						<?php echo $transmission ?>
					</b></p>
				<p>Engine: <b>
						<?php echo $engine ?>
					</b></p>
			</div>
			<div class="col-md-6">
				<p>Pickup: <b>
						<?php echo $pickup ?>
					</b></p>
				<p>Drop-off: <b>
						<?php echo $dropoff ?>
					</b></p>
				<p>Price per day: <b>
						<?php echo number_format($price, 2) ?>
					</b></p>
				<p>Status: <b>
						<?php if ($status == 1): ?>
							<span class="badge badge-secondary">Pending</span>
						<?php elseif ($status == 2): ?>
							<span class="badge badge-primary">Confirmed</span>
						<?php else: ?>
							<span class="badge badge-danger">Canceled</span>
						<?php endif; ?>
					</b></p>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-lg-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>