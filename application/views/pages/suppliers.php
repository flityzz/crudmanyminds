<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Suppliers</h1>
		<div class="btn-group mr-2">
			<a href="<?= base_url('') ?>suppliers/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Supplier</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
                <tr>
					<th>Id</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($suppliers as $supplier) : ?>
					
					<?php if($supplier['active'] == '1') : ?>

						<tr>
							<td><?= $supplier['id']?></td>
							<td><?= $supplier['name']?></td>
						</tr>

					<?php endif; ?>

        		<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>