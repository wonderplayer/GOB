




		<p><?php echo anchor("Main_controller/delete_news/$row->Id" , "Dzēst")?></p>
		<p><?php echo anchor("Main_controller/goto_update_news/$row->Id" , "Izlabot")?></p>
	<?php else : ?>
	<?php endforeach; ?>
	<?php endif; ?>
	<?php endif;?>
	<?php if($this->session->userdata('Username') == 'admin'): ?> 
	<div><?php echo $row->Description?></div>
	<h2 name="title" id="title"><?php echo $row->Title ?></h2>
	<h2>Nav jaunumu.</h2>
	<hr>
	<p><?php echo $row->Date ?></p>
</div>
<?php if(isset($records)) : foreach ($records as $row ) : ?>
<div class="container">