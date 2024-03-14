<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>

			<div class="col-md-12">
                    <?php if(isset($order)) : ?>

                    <form action="<?= base_url('') ?>orders/update/<?= $order['id'] ?>" method="post">

                    <?php else : ?>

                    <form action="<?= base_url('') ?>orders/store" method="post">

                    <?php endif; ?>

					
                    
					<div class="col-md-6">
                    <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select class="form-control" name="supplier_id" id="supplier" required>
                                <?php foreach ($suppliers as $supplier) : ?>
                                    <?php $selected = isset($order) && $order['supplier_id'] == $supplier['id'] ? 'selected' : ''; ?>
                                    <option value="<?= $supplier['id'] ?>" <?= $selected ?>><?= $supplier['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <?php if(!isset($order)) : ?>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="product_table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($products as $product) : ?>
                                            <?php if($product['active'] == 1) : ?>
                                                <tr>
                                                    <td><?= $product['name'] ?></td>
                                                    <td>
                                                        <?php
                                                            
                                                            if (isset($orderItem) && is_array($orderItem) && !empty($orderItem)) {
                                                                
                                                                $quantity_value = 0;
                                                                foreach ($orderItem as $item) {
                                                                    if ($item['product_id'] == $product['id']) {
                                                                        $quantity_value = $item['quantity'];
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                $quantity_value = 0;
                                                            }
                                                        ?>
                                                        <input type="number" name="quantities[<?= $product['id'] ?>]" value="<?= $quantity_value ?>" min="0">
                                                        <input type="hidden" name="product_ids[]" value="<?= $product['id'] ?>">
                                                    </td>
                                                </tr>
                                            <?php endif ; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    <?php endif ; ?>                                
                    <div class="col-md-6">
						<div class="form-group">
							<label for="observation">Observation</label>
							<textarea name="observation" id="observation" rows="5" class="form-control" required><?= isset($order) ? $order['observation'] : '' ?></textarea>
						</div>
					</div>

                    <div class="col-md-6">
							<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
							<a href="<?= base_url('') ?>orders" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
						</div>
					</div>
				</form>
			</div>
            <script>
                
                document.querySelectorAll('input[type="number"]').forEach(function(input) {
                    input.addEventListener('change', function() {
                        if (parseInt(this.value) < 0) {
                            this.value = '0';
                        }
                    });
                });
            </script>                            
    </main>
  </div>
</div>
