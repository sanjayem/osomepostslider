<?php 
/*
*
* Osome Slider Setting
*
*/ 

?>
<div class="wrap osome_wrap">
	<h2 class="osome_admin_heading">Osome Setting</h2>
	<h3  style="color:black;text-align:center;">Change the setting as per your requirement</h3>
	<form name="osome_setting_form" method="post" action="">
	<table id="osome_setting_form_table">
	<tr>
			<td><label>Loop: </label></td>
			<td><input type="checkbox" name="loop" value="true" checked="checked"></td>
			
	</tr>
	<tr>
			<td><label>Margin: </label></td>
			<td><input type="number" name="margin" value="10"></td>
	</tr>
	<tr>
			<td><label>Navigation: </td>
			<td><select name="nav">
					<option value="true">Yes</option>
					<option value="false">No</option>
				</select>
			</td>
	</tr>
	<tr>
		<td><label>Autoplay: </td>
		<td><select name="autoplay">
				<option value="true">Yes</option>
				<option value="false">No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Item on Mobile: </label></td>
		<td><input type="number" name="item_0" value="0"></td>
	</tr>
	<tr>
		<td><label>Item on Tablet/iPad: </label></td>
		<td><input type="number" name="item_1" value="3"></td>
	</tr>
	<tr>
		<td><label>Item on Desktop/Laptop: </label></td>
		<td><input type="number" name="item_2" value="3"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="button" name="submit" class="osome_submit" value="Save"></td>
	</tr>
	</form>
</div>