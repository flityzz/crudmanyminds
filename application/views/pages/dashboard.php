<!DOCTYPE html>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="<?= base_url('') ?>products/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Product</a>
			</div>
		</div>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Last 5 Products</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Code</th>
					<th>Name</th>
					<th>Price</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product) : ?>
					
					<?php if($product['active'] == '1') : ?>
						<tr>
							<td><?= $product['code']?></td>
							<td><?= $product['name']?></td>
							<td><?= $product['price']?></td>
							<td><?= $product['description']?></td>
						</tr>
					<?php endif ; ?>
				
        		<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Last 5 Users</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Country</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
					
					<?php if($user['active'] == '1') : ?>
						<tr>
							<td><?= $user['username']?></td>
							<td><?= $user['email']?></td>
							<td><?= $user['country']?></td>
						</tr>
					<?php endif ; ?>
				
        		<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>

