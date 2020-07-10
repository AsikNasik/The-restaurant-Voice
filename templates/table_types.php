<?php
$types = $read->get_types_all(); ?>
<table id="table_type">
	<thead>
	<tr>
		<th scope="col"></th>
		<th scope="col"></th>
		<th scope="col">Type</th>
		<th scope="col">Salary</th>
	</tr>
	</thead>
	<?php if ( ! empty( $types ) ) { ?>
	<tbody id="body_type">
	<?php foreach ( $types as $type) {
//	              			var_dump($type);die();
	?>
	<tr>
		<td>
			<button name="editFunc" class="editFType editF">
				E
			</button>
		</td>
		<td>
			<button name="delFunc" class="delFType delF">
				D
			</button>
		</td>
		<td class="type" contenteditable="false"><?php echo trim($type['TYPEWORKER'])?></td>
		<td class="salary" contenteditable="false"><?php echo trim($type['SALARY'])?></td>
	</tr>
	<?php } ?>
	</tbody>
	<?php } ?>
</table>