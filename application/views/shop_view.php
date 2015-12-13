<div class='container'>
	<div id='products'>
		<ul>
			<?php foreach ($products as $product):?>
				<li>
					<?php echo form_open('Main_controller/add_product_to_cart')?>
					<div class='name'>Nosaukums: <?php echo $product->Name; ?></div>
					<div class='type'>Veids: <?php echo $product->Equipment_type_Id?></div>
					<div class='rarity'>Retums: <?php echo $product->Rarity_Id?></div>
					<div class='price'>Cena: €<?php echo $product->Market_price; ?></div>
					<?php 
						echo form_hidden('id', $product->Id);
						if($this->session->userdata('is_logged_in') == true)
						{
							echo form_submit('action', 'Pievienot grozam'); 
						}
						echo form_close(); 
					?>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php if ($cart = $this->cart->contents()): ?>
		<div id='cart'>
			<table>
				<caption>Grozs</caption>
				<thead>
					<tr>
						<th>Nosaukums</th>
						<th>Veids</th>
						<th>Retums</th>
						<th>Cena</th>
						<th></th>
					</tr>
				</thead>
				<?php foreach ($cart as $item): ?>
					<tr>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['type']; ?></td>
						<td><?php echo $item['rarity']; ?></td>
						<td>€<?php echo $item['subtotal']; ?></td>
						<td class='remove'><?php echo anchor('Main_controller/remove_from_cart/' .$item['rowid'],'X'); ?></td>
					</tr>
				<?php endforeach;?>
				<tr class='total'>
					<td colspan="2"><strong>Total</strong></td>
					<td>€<?php echo $this->cart->total(); ?></td>
				</tr>
			</table>
		</div>
	<?php endif;?>
</div>