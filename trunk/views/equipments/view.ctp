<!-- File: /app/views/equipment/view.ctp -->

<table>
	<tr>
		<th>Id</th>
		<th><?php echo $equipment['Equipment']['id']?></th>
	</tr>
	<tr>
		<th>Code</th>
		<th><?php echo $equipment['Equipment']['code']?></th>
	</tr>
	<tr>
		<th>Name</th>
		<th><?php echo $equipment['Equipment']['name']?></th>
	</tr>
	<tr>
		<th>Desciption</th>
		<th><?php echo $equipment['Equipment']['description']?></th>
	</tr>
	<tr>
		<th>Price</th>
		<th><?php echo $equipment['Equipment']['price']?></th>
	</tr>
	<tr>
		<th>Quantity</th>
		<th><?php echo $equipment['Equipment']['quantity']?></th>
	</tr>
	<tr>
		<th>Start time</th>
		<th><?php echo $equipment['Equipment']['start_time']?></th>
	</tr>
</table>