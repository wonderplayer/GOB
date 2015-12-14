<div class="container">
<?php if(isset($records)) : foreach ($records as $row ) : ?>

	<h2 name="title" id="title"><?php echo $row->Title ?></h2>
	<p><?php echo $row->Date ?></p>
	<div><?php echo $row->Description?></div>
	<hr>
	<?php if($this->session->userdata('Username') == 'admin'): ?> 
		<p><?php echo anchor("Main_controller/delete_news/$row->Id" , "Delete")?></p>
		<p><?php echo anchor("Main_controller/goto_update_news/$row->Id" , "Update")?></p>
	<?php endif;?>
	<?php endforeach; ?>

	<?php else : ?>

	<h2>Nav jaunumu.</h2>

	<?php endif; ?>

</div>
