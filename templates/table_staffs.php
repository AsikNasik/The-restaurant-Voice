<?php
$staffs = $read->get_staffers(); ?>
<table id="table_stass">
	<thead>
	<tr>
		<th scope="col"></th>
		<th scope="col"></th>
		<th scope="col">Telephone</th>
		<th scope="col">FIO</th>
		<th scope="col">Birthday</th>
		<th scope="col">Type worker</th>
		<th scope="col">Password</th>
	</tr>
	</thead>
	<?php if ( ! empty( $staffs ) ) { ?>
		<tbody id="body_staff">
		<?php foreach ( $staffs as $staff ) {
//			var_dump($staff);die();
			?>
			<tr>
				<td>
					<button name="editFunc" class="editFSt editF">
						E
					</button>
				</td>
				<td>
					<button name="delFunc" class="delFSt delF">
						D
					</button>
				</td>
				<td class="telephone" contenteditable="false"><?php echo trim($staff['TELEPHONE_ST'])?></td>
				<td class="fio" contenteditable="false"><?php echo trim($staff['FIO_STAFF'])?></td>
				<td class="birthday" contenteditable="false"><?php echo(date('d/m/Y',strtotime($staff['BIRTHDAY'])));?></td>
				<td class="type" contenteditable="false"><?php echo trim($staff['TYPEWORKER'])?></td>
				<td class="password" contenteditable="false"><?php echo trim($staff['PASSWORD_ST'])?></td>
			</tr>
		<?php } ?>
		</tbody>
	<?php } ?>
</table>
