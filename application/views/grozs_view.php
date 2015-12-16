<div class="container">
	<?php if ($cart = $this->cart->contents()): ?>
			<table class="table table-bordered table-striped">
				<caption>Grozs</caption>
				<thead>
					<tr>
						<th>Nosaukums</th>
						<th>Veids</th>
						<th>Retums</th>
						<th>Daudzums</th>
						<th>Cena</th>
						<th>Kopā</th>
					</tr>
				</thead>
			<?php $attributes = array(
				'class' => 'form-inline',
				'role' => 'form'
			); ?>
			<?php echo form_open('Main_controller/update_cart', $attributes);?>
				<?php foreach ($cart as $item): ?>
				<?php
					echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
					echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
					echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
					echo form_hidden('cart[' . $item['id'] . '][rarity]', $item['rarity']);
					echo form_hidden('cart[' . $item['id'] . '][type]', $item['type']);
					echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
					echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
				?>
					<tr>
						<td><?php echo $item['name']; ?></td>
						<td>
							<?php foreach ($type as $e_type) {
								if ($item['type'] == $e_type->Id) {
									echo $e_type->Type;
								}
							}?>
						</td>
						<td>
							<?php foreach ($rarity as $e_rarity) {
								if ($item['rarity'] == $e_rarity->Id) {
									echo $e_rarity->Rarity;
								}
							}?>
						</td>
						<td>
							<?php
								$attributes = array(
									'name' => 'cart[' . $item['id'] . '][qty]',
									'value' => $item['qty'],
									'maxlength' => 2,
									'class' => "form-control"
								);
								echo form_input($attributes);
								$b_attributes = array(
									'class' => 'btn btn-primary'
								);
								echo anchor('Main_controller/remove_from_cart/' .$item['rowid'],'X', $b_attributes);
							?>
						</td>
						<td>€<?php echo $item['price']; ?></td>
						<td>€<?php echo $item['subtotal']; ?></td>
					</tr>
				<?php endforeach;?>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr>
				<tr class='text-right'>
					<td colspan="5"><strong>Kopā grozā</strong></td>
					<td>€<?php echo $this->cart->total(); ?></td>
				</tr>
				
				
			</table>
			<input type="submit" value="Pārrēķināt grozu" class="btn btn-default">
			<input type="button" onclick="location.href=<?php base_url()?>'checkout'" value="Pasūtīt" class="btn btn-primary pull-right">
			<?php echo form_close(); ?>
	<?php else :?>
		<h2>Grozs ir tukšs.</h2>
	<?php endif;?>
</div>