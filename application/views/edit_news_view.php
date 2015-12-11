<div class="jumbotron"></div>
<div class="container">
	<h2>Create</h2>
	<?php echo form_open('Main_controller/update_news')?>
	<p >
		<label for="id">Id:</label>
		<input type="text" name="id" id="id" value=<?php echo $id ?> />
	</p>
	<p>
		<label for="title">Virsraksts:</label>
		<input type="text" name="title" id="title" value=<?php echo "\"$title\"" ?> />
	</p>
	<p>
		<label for="description">Apraksts:</label>
		<textarea name="description" id="description"><?php echo $description ?></textarea>
	</p>
	<p>
		<input type="submit" value="Saglabāt"/>
	</p>
	<?php echo form_close();?>
</div>