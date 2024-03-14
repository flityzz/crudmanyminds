<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Orders</h1>
		<div class="btn-group mr-2">
			<a href="<?= base_url('') ?>orders/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Order</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
                <tr>
					<th>User Id</th>
					<th>Supplier Id</th>
					<th>Status</th>
					<th>Observation</th>
          			<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $order) : ?>
					
					<?php if($order['status'] == 'active') : ?>

						<tr>
							<td><?= $order['user_id']?></td>
							<td><?= $order['supplier_id']?></td>
							<td><?= $order['status']?></td>
							<td><?= $order['observation']?></td>
							<td>
								<a href="<?= base_url('')?>orders/edit/<?= $order['id'] ?>" class="btn btn-sm btn-warning">
									<i class="fas fa-pencil-alt"></i>
									Edit
								</a>
								
								<a href="<?= base_url('')?>orders/delete/<?= $order['id'] ?>" class="btn btn-sm btn-danger">
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
		<h2 class="h2">Disabled Orders</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>User Id</th>
					<th>Supplier Id</th>
					<th>Status</th>
					<th>Observation</th>
          			<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $order) : ?>
					
					<?php if($order['status'] == 'finalized') : ?>

						<tr>
							<td><?= $order['user_id']?></td>
							<td><?= $order['supplier_id']?></td>
							<td><?= $order['status']?></td>
							<td><?= $order['observation']?></td>
							<td>
								<a href="<?= base_url('')?>orders/active/<?= $order['id'] ?>" class="btn btn-sm btn-success">
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