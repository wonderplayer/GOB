<div class="container">
	<h2>Ievietot jaunu ekipējumu</h2>
	<?php $attributes = array(
		'role' => 'form',
		'class' => 'form-horizontal'
	);?>
	<p><i><b>Maziņš padoms:</b></i> Pirms tam, kad ievietot jaunu ekipējumu, pārliecinietie, ka jums jau ir vajadzīgi retumi un veidi. Ja nav, tad, lūdzu, izveidojiet tos zemāk.</p>
	<?php echo form_open('Main_controller/add_equipment', $attributes)?>
	<div class="form-group">
		<label for="name" class="control-label col-sm-2">Nosaukums:</label>
		<div class="col-sm-10">
			<input type="text" name="name" id="name" class="form-control"/>
		</div>
	</div>
	<div class="form-group">
		<label for="type" class="control-label col-sm-2">Ekipējuma veids:</label>
		<div class="col-sm-10">
			<select name="type" id="type" class="form-control">
				<?php foreach ($type as $e_type) {
					echo "<option value=$e_type->Id>$e_type->Type</option>";
				}?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="rarity" class="control-label col-sm-2">Ekipējuma retums:</label>
		<div class="col-sm-10">
			<select name="rarity" id="rarity" class="form-control">
				<?php foreach ($rarity as $rare) {
					echo "<option value=$rare->Id>$rare->Rarity</option>";
				}?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="market_price" class="control-label col-sm-2">Cena veikalā:</label>
		<div class="col-sm-10">
			<input type="text" name="market_price" id="market_price" class="form-control"/>
		</div>
	</div>
	<div class="form-group">
		<label for="game_price" class="control-label col-sm-2">Cena spēlē:</label>
		<div class="col-sm-10">
			<input type="text" name="game_price" id="game_price" class="form-control"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Saglabāt" class="btn btn-default"/>
		</div>
	</div>
	<?php echo form_close();?>
	<hr>
	<br>
	<h2>Ievietot jaunu ekipējuma veidu</h2>
	<?php echo form_open('Main_controller/add_equipment_type', $attributes)?>
	<div class="form-group">
		<label for="name" class="control-label col-sm-2">Nosaukums:</label>
		<div class="col-sm-10">
			<input type="text" name="name" id="name" class="form-control"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Saglabāt" class="btn btn-default"/>
		</div>
	</div>
	<?php echo form_close();?>
	<table>
		<header>Ekipējumi, kuri jau atrodas datu bāzē</header>
		<thead>
			<tr>
				<th>Nosaukums:</th>
			</tr>
		</thead>
		
		<?php foreach ($type as $e_type => $type) {
		$b_attributes = array(
		'class' => 'btn btn-default',
		'onclick' => "javascript:confirmation_type($type->Id);"
		);
			echo '<tr>';
			echo "<td>$type->Type</td>";
			echo "<td class='remove'>";
			echo form_button('delete',"Dzēst",$b_attributes);
			echo "</td>";
			echo '</tr>';
		}?>
	</table>
	<hr>
	<br>
	<h2>Ievietot jaunu ekipējuma retumu</h2>
	<?php echo form_open('Main_controller/add_equipment_rarity', $attributes)?>
	<div class="form-group">
		<label for="name" class="control-label col-sm-2">Nosaukums:</label>
		<div class="col-sm-10">
			<input type="text" name="name" id="name" class="form-control"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Saglabāt" class="btn btn-default"/>
		</div>
	</div>
	<?php echo form_close();?>
	<table>
		<header>Ekipējumi, kuri jau atrodas datu bāzē</header>
		<thead>
			<tr>
				<th>Nosaukums:</th>
			</tr>
		</thead>
		
		<?php foreach ($rarity as $rare => $rarity) {
			$b_attributes = array(
			'class' => 'btn btn-default',
			'onclick' => "javascript:confirmation_rarity($rarity->Id);"
			);
			echo '<tr>';
			echo "<td>$rarity->Rarity</td>";
			echo "<td class='remove'>";
			//echo anchor("Main_controller/goto_create_equipment",'X', 'onclick="javascript:confirmation();"');
			echo form_button('delete',"Dzēst",$b_attributes);
			echo "</td>";
			echo '</tr>';
		}?>
	</table>
</div>