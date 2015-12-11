<div class="jumbotron"></div>
<div class="container">
	<hr/>
	<h2>Read</h2>
	<?php if(isset($records)) : foreach ($records as $row ) : ?>

	<h2><?php echo anchor("Main_controller/show_news/$row->Id" , $row->Title)?></h2>
	<p><?php echo $row->Date ?></p>
	<p><?php echo anchor("Main_controller/delete_news/$row->Id" , "Delete")?></p>
	<div><?php echo $row->Description?></div>
	<?php endforeach; ?>

	<?php else : ?>

	<h2>Nav jaunumu.</h2>

	<?php endif; ?>
	<h2><?php echo anchor("Main_controller/goto_create_news" , "Izveidot jaunu ierakstu.")?></h2>
</div>
