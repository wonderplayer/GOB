<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
	<h2>Create</h2>
	<?php echo form_open('Main_controller/add_news')?>
	<p>
		<label for="title">Virsraksts:</label>
		<input type="text" name="title" id="title"/>
	</p>
	<p>
		<label for="description">Apraksts:</label>
		<textarea name="description" id="description"></textarea>
	</p>
	<p>
		<input type="submit" value="Saglabāt"/>
	</p>
	<?php echo form_close();?>

	<hr/>
	<h2>Read</h2>
	<?php if(isset($records)) : foreach ($records as $row ) : ?>

	<h2><?php echo anchor("Main_controller/delete_news/$row->Id" , $row->Title)?></h2>
	<div><?php echo $row->Description?></div>
	<?php endforeach; ?>

	<?php else : ?>

	<h2>Nav jaunumu.</h2>

	<?php endif; ?>

	<hr/>

	<h2>Delete</h2>

	<p>To sample the delete method, simplu click on one if the headins listed above. A delete query will automaticly run.</p>

</body>
</html>