<div class="container">
	<h2>Izmainīt jaunumu</h2>
	<?php $attributes = array(
		'role' => 'form',
		'class' => 'form-horizontal'
	); ?>
	<?php echo form_open('Main_controller/update_news', $attributes)?>
	<p hidden>
		<label for="id">Id:</label>
		<input type="text" name="id" id="id" value=<?php echo $id ?> />
	</p>
	<div class="form-group">
		<label for="title" class="control-label col-sm-2">Virsraksts:</label>
		<div class="col-sm-10">
			<input type="text" name="title" id="title" value=<?php echo "\"$title\""  ?> class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="control-label col-sm-2">Apraksts:</label>
		<div class="col-sm-10">
			<textarea name="description" id="description" class="form-control"><?php echo $description ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Saglabāt" class="btn btn-default"/>
		</div>
	</div>
	<?php echo form_close();?>
</div>