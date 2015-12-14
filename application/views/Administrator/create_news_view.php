<div class="container">
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
</div>