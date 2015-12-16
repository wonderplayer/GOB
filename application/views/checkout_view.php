<div class="container">
	<?php if ($cart = $this->cart->contents()): ?>
			<table class="table table-bordered table-striped">
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
			<?php echo form_open('Main_controller/buy', $attributes);?>
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
						<td><?php echo $item['qty']; ?></td>
						<td>€<?php echo $item['price']; ?></td>
						<td>€<?php echo $item['subtotal']; ?></td>
					</tr>
				<?php endforeach;?>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr>
				<tr class='total'>
					<td colspan="5"><strong>Kopā grozā</strong></td>
					<td>€<?php echo $this->cart->total(); ?></td>
				</tr>
			</table>
			<div class="form-group">
				<label for="rarity" class="control-label col-sm-2">Apmaksas veids:</label>
				<div class="col-sm-10">
					<select name="apm_veids" id="ap_veids" class="form-control">
						<option value="MyAcc">Savs konts</option>
						<option value="Swedbank">Swedbank</option>
						<option value="Paypal">Paypal</option>
						<option value="Visa">Visa</option>
						<option value="MasterCard">Master Card</option>
					</select>
				</div>
			</div>
			<br>
			<br>
			<input type="submit" value="Pirkt" class="btn btn-primary pull-right">
			
			<?php echo form_close(); ?>
	<?php endif;?>
</div>