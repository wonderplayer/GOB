<div class="container">
	<h2>Ievietot jaunu ekipējumu</h2>
	<p><i><b>Maziņš padoms:</b></i> Pirms tam, kad ievietot jaunu ekipējumu, pārliecinietie, ka jums jau ir vajadzīgi retumi un veidi. Ja nav, tad, lūdzu, izveidojiet tos zemāk.</p>
	<?php echo form_open('Main_controller/add_equipment')?>
	<p>
		<label for="name">Nosaukums:</label>
		<input type="text" name="name" id="name"/>
	</p>
	<p>
		<label for="type">Ekipējuma veids:</label>
		<select name="type" id="type">
			<?php foreach ($type as $e_type) {
				echo "<option value=$e_type->Id>$e_type->Type</option>";
			}?>
		</select>
	</p>
	<p>
		<label for="rarity">Ekipējuma retums:</label>
		<select name="rarity" id="rarity">
			<?php foreach ($rarity as $rare) {
				echo "<option value=$rare->Id>$rare->Rarity</option>";
			}?>
		</select>
	</p>
	<p>
		<label for="market_price">Cena veikalā:</label>
		<input type="text" name="market_price" id="market_price"/>
	</p>
	<p>
		<label for="game_price">Cena spēlē:</label>
		<input type="text" name="game_price" id="game_price"/>
	</p>
	<p>
		<input type="submit" value="Saglabāt"/>
	</p>
	<?php echo form_close();?>
	<hr>
	<br>
	<h2>Ievietot jaunu ekipējuma veidu</h2>
	<?php echo form_open('Main_controller/add_equipment_type')?>
	<p>
		<label for="name">Nosaukums:</label>
		<input type="text" name="name" id="name"/>
	</p>
	<p>
		<input type="submit" value="Saglabāt"/>
	</p>
	<?php echo form_close();?>
	<table>
		<header>Ekipējumi, kuri jau atrodas datu bāzē</header>
		<thead>
			<tr>
				<th>Nosaukums:</th>
			</tr>
		</thead>
		<?php foreach ($type as $e_type => $type) {
			echo '<tr>';
			echo "<td>$type->Type</td>";
			echo "<td class='remove'>";
			echo form_button('delete',"Dzēst",'onclick="javascript:confirmation_type(' . $type->Id . ');"');
			echo "</td>";
			echo '</tr>';
		}?>
	</table>
	<hr>
	<br>
	<h2>Ievietot jaunu ekipējuma retumu</h2>
	<?php echo form_open('Main_controller/add_equipment_rarity')?>
	<p>
		<label for="name">Nosaukums:</label>
		<input type="text" name="name" id="name"/>
	</p>
	<p>
		<input type="submit" value="Saglabāt"/>
	</p>
	<?php echo form_close();?>
	<table>
		<header>Ekipējumi, kuri jau atrodas datu bāzē</header>
		<thead>
			<tr>
				<th>Nosaukums:</th>
			</tr>
		</thead>
		<?php foreach ($rarity as $rare => $rarity) {
			echo '<tr>';
			echo "<td>$rarity->Rarity</td>";
			echo "<td class='remove'>";
			//echo anchor("Main_controller/goto_create_equipment",'X', 'onclick="javascript:confirmation();"');
			echo form_button('delete',"Dzēst",'onclick="javascript:confirmation_rarity(' . $rarity->Id . ');"');
			echo "</td>";
			echo '</tr>';
		}?>
	</table>
</div>