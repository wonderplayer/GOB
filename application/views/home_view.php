<div class="container">
	<hr/>
	<?php if(isset($records)) : foreach ($records as $row ) : ?>

	<h2><?php echo anchor("Main_controller/show_news/$row->Id" , $row->Title)?></h2>
	<p><?php echo $row->Date ?></p>
	<div><?php echo $row->Description?></div>
	<?php if($this->session->userdata('is_logged_in') == true): ?> 
		<p><?php echo anchor("Main_controller/delete_news/$row->Id" , "Delete")?></p>
	<?php endif;?>
	<?php endforeach; ?>

	<?php else : ?>

	<h2>Nav jaunumu.</h2>

	<?php endif; ?>
	<?php if($this->session->userdata('is_logged_in') == true): ?> 
		<h2><?php echo anchor("Main_controller/goto_create_news" , "Izveidot jaunu ierakstu.")?></h2>
	<?php endif;?>
</div>
