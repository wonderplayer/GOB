<div class="container">
	<?php if($this->session->userdata('is_logged_in') == true): ?> 
		<h3><?php echo anchor("Main_controller/goto_create_post" , "Izveidot jaunu rakstu.")?></h3>
	<?php endif;?>
	<hr/>
	<?php if(isset($records)) : foreach ($records as $row ) : ?>
		<h2><?php echo anchor("Main_controller/show_post/$row->Id" , $row->Title)?></h2>
		<p id="description"><?php echo ellipsize($row->Description, 50, .5); ?></p>
		<p><?php echo $row->Date ?></p>
		<?php if($this->session->userdata('is_logged_in') == true): ?> 
			<p><?php echo form_button('delete',"Dzēst",'onclick="javascript:confirmation_post(' . $row->Id . ');"');?></p>
		<?php endif;?>
		
	<?php endforeach; ?>

	<?php else : ?>

	<h2>Nav jaunumu.</h2>

	<?php endif; ?>
</div>