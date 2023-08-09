<style>
	.collapse a {
		text-indent: 10px;
	}

	nav#sidebar {
		background-color: color: rgb(0, 177, 79);
	}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark'>
	<div class="sidebar-list">
		<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i
					class="fa fa-home"></i></span> Dashboard</a>
		<?php if ($_SESSION['login_type'] == 1): ?>
			<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i
						class="fa fa-user"></i></span> Manage Admins</a>
		<?php endif; ?>
		<a href="index.php?page=movement" class="nav-item nav-movement"><span class='icon-field'><i
					class="fa fa-th-list"></i></span> Car Pickup & Drop-off</a>
		<a href="index.php?page=books" class="nav-item nav-books"><span class='icon-field'><i
					class="fa fa-book"></i></span> Manage Bookings</a>
		<a href="index.php?page=customers" class="nav-item nav-customers"><span class='icon-field'><i
					class="fa fa-users"></i></span> View Customers</a>
		<a href="index.php?page=cars" class="nav-item nav-cars"><span class='icon-field'><i
					class="fa fa-car"></i></span> Manage Cars</a>
		<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i
					class="fa fa-tags"></i></span> Edit Car Category</a>
		<a href="index.php?page=transmissions" class="nav-item nav-transmissions"><span class='icon-field'><i
					class="fa fa-cog"></i></span> Edit Transmission Types</a>
		<a href="index.php?page=engine_types" class="nav-item nav-engine_types"><span class='icon-field'><i
					class="fa fa-bolt"></i></span> Edit Engine Types</a>
	</div>
</nav>
<script>
	$('.nav_collapse').click(function () {
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>