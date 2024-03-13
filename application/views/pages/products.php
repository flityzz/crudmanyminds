<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Products</h1>
		<div class="btn-group mr-2">
			<a href="<?= base_url('') ?>products/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Product</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
                <tr>
					<th>Code</th>
					<th>Name</th>
					<th>Unit Price</th>
					<th>Description</th>
          			<th>Actions</th>
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
							<td>
								<a href="<?= base_url('')?>products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-warning">
									<i class="fas fa-pencil-alt"></i>
									Edit
								</a>
								
								<a href="<?= base_url('')?>products/delete/<?= $product['id'] ?>" class="btn btn-sm btn-danger">
									<i class="fas fa-pencil-alt"></i>
									Delete
								</a>
							</td>
							
						</tr>

					<?php endif; ?>

        		<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Disabled Products</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
                <tr>
					<th>Code</th>
					<th>Name</th>
					<th>Unit Price</th>
					<th>Description</th>
          			<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $product) : ?>
					
					<?php if($product['active'] == '0') : ?>

						<tr>
							<td><?= $product['code']?></td>
							<td><?= $product['name']?></td>
							<td><?= $product['price']?></td>
							<td><?= $product['description']?></td>
							<td>
								<a href="<?= base_url('')?>products/active/<?= $product['id'] ?>" class="btn btn-sm btn-success">
									<i class="fa-solid fa-check"></i>
									Active
								</a>
							</td>
						</tr>

					<?php endif; ?>

        	<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>