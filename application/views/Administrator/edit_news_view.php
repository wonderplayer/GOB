<div class="container">
	<h2>Create</h2>
	<?php echo form_open('Main_controller/update_news')?>
	<p hidden>
		<label for="id">Id:</label>
		<input type="text" name="id" id="id" value=<?php echo $id ?> />
	</p>
		<label for="title">Virsraksts:</label>
		<input type="text" name="title" id="title" value=<?php echo "\"$title\"" ?> />
		<label for="description">Apraksts:</label>
		<textarea name="description" id="description"><?php echo $description ?></textarea>
		<input type="submit" value="Saglabāt"/>
	<?php echo form_close();?>

</div>