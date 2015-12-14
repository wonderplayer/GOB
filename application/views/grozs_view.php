<div class="container">
	<?php if ($cart = $this->cart->contents()): ?>
		<div id='cart'>
			<table>
				<caption>Grozs</caption>
				<thead>
					<tr>
						<th>Nosaukums</th>
						<th>Veids</th>
						<th>Retums</th>
						<th>Daudzums</th>
						<th>Cena</th>
						<th>Kopā</th>
						<th></th>
					</tr>
				</thead>
			<?php echo form_open('Main_controller/update_cart');?>
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
									'style' => "width:20px;"
								);
								echo form_input($attributes);
							?>
						</td>
						<td>€<?php echo $item['price']; ?></td>
						<td>€<?php echo $item['subtotal']; ?></td>
						<td class='remove'><?php echo anchor('Main_controller/remove_from_cart/' .$item['rowid'],'X'); ?></td>
					</tr>
				<?php endforeach;?>
				<tr class='total'>
					<td colspan="2"><strong>Kopā</strong></td>
					<td>€<?php echo $this->cart->total(); ?></td>
					<td>
						<input type="submit" value="Pārrēķināt grozu">
					</td>
					<td>
						<input type="button" onclick="location.href=<?php base_url()?>'checkout'" value="Pasūtīt">
					</td>
				</tr>
				<?php echo form_close(); ?>
			</table>
		</div>
	<?php else :?>
		<h2>Grozs ir tukšs.</h2>
	<?php endif;?>
</div>