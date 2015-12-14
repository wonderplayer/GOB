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
				<?php foreach ($cart as $item): ?>
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
						<td class='remove'><?php echo anchor('Main_controller/remove_from_cart/' .$item['rowid'],'X'); ?></td>
					</tr>
				<?php endforeach;?>
				<tr class='total'>
					<td colspan="2"><strong>Kopā</strong></td>
					<td>€<?php echo $this->cart->total(); ?></td>
				</tr>
			</table>
		</div>
	<?php endif;?>
	<pre>
		<?php print_r($cart)?>
</div>