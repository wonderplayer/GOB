<div class='container'>
		<?php if($this->session->userdata('is_logged_in') == true): ?> 
			<h3><?php echo anchor("Main_controller/goto_create_equipment" , "Ievietot ekipējumu")?></h3>
		<?php endif;?>
		<?php echo form_open('Main_controller/search_product');?>
			<div class="form-group has-feedback" style="width:20%";>
				<input type="text" class="form-control" placeholder="Meklēšana" name="search" />
				<i class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></i>
			</div>
			<?php
			echo form_submit('action','Meklēt');
			echo form_close();
		?>
	<div id='products'>
		<ul>
			<?php foreach ($products as $product):?>
				<li>
					<?php echo form_open('Main_controller/add_product_to_cart')?>
					<div class='name'>Nosaukums: <?php echo $product->Name; ?></div>
					<div class='type'>Veids: 
						<?php foreach ($type as $e_type) {
							if ($product->Equipment_type_Id == $e_type->Id) {
								echo $e_type->Type;
							}
						}?>
					</div>
					<div class='rarity'>Retums: 
						<?php foreach ($rarity as $e_rarity) {
							if ($product->Rarity_Id == $e_rarity->Id) {
								echo $e_rarity->Rarity;
							}
						}?>
					</div>
					<div class='price'>Cena: €<?php echo $product->Market_price; ?></div>
					<?php
						echo form_hidden('id', $product->Id);
						if($this->session->userdata('is_logged_in') == true)
						{
							echo form_submit('action', 'Pievienot grozam');
						}
						echo form_button('delete',"Dzēst",'onclick="javascript:confirmation_equipment(' . $product->Id . ');"');
						echo form_close();
					?>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>