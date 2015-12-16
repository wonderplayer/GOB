
<div class='container'>
	<!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Veikals</h3>
            </div>
        </div>
        <!-- /.row -->
		<?php if($this->session->userdata('Username') == 'admin'): ?> 
			<h3><?php echo anchor("Main_controller/goto_create_equipment" , "Ievietot ekipējumu")?></h3>
		<?php endif;?>
		<hr>
		<?php echo form_open('Main_controller/search_product');?>
			<div class="form-group has-feedback" style="width:200px";>
				<input type="text" class="form-control" placeholder="Meklēšana" name="search" />
				<i class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></i>
			</div>
			<?php
			echo form_submit('action','Meklēt', 'class=" btn btn-default"');
			echo form_close();
		?>
	<br>
	<?php if(count($products) > 0) : ?>
	<div class="row text-center">
		<?php foreach ($products as $product):?>
			<?php $attributes = array(
				'onsubmit' => "javascript:add_equipment();"
			);?>
			<?php echo form_open('Main_controller/add_product_to_cart', $attributes)?>
				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<div class="caption">
							<h3 class='name'><?php echo $product->Name; ?></h3>
								<p class='type'>Veids: 
									<?php foreach ($type as $e_type) {
										if ($product->Equipment_type_Id == $e_type->Id) {
											echo $e_type->Type;
										}
									}?>
								</p>
								<p class='rarity'>Retums: 
									<?php foreach ($rarity as $e_rarity) {
										if ($product->Rarity_Id == $e_rarity->Id) {
											echo $e_rarity->Rarity;
										}
									}?>
								</p>
								<p class='price'>Cena: €<?php echo $product->Market_price; ?></p>
								<p>
									<?php
										echo form_hidden('id', $product->Id);
										if($this->session->userdata('is_logged_in') == true)
										{
											echo form_submit('action', 'Pievienot grozam', 'class="btn btn-primary"');
										}
										if($this->session->userdata('Username') == 'admin')
										{
											$attributes = array(
												'name' => 'delete',
												'content' => "Dzēst",
												'class' => 'btn btn-default',
												'onclick' => "javascript:confirmation_equipment($product->Id);"
											);
											echo form_button($attributes);
										}
									?>
								</p>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		<?php endforeach;?>
	</div>
	<?php else : ?>
			<h2>Nekas netika atrasts.</h2>
	<?php endif;?>
</div>