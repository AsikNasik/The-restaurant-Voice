<?php
$reviews = $read->get_reviews_admin(); ?>
<table id="table_reviews">
	<thead>
	<tr>
		<th scope="col"></th>
		<th scope="col">Telephone</th>
		<th scope="col">Note</th>
		<th scope="col">Mark</th>
	</tr>
	</thead>
	<?php if ( ! empty( $reviews ) ) { ?>
	<tbody id="body_reviews">
	<?php foreach ( $reviews as $review) {
	//	              			var_dump($type);die();
	?>
	<tr>
		<td>
			<button name="delFunc" class="delFRew delF">
				D
			</button>
		</td>
		<td class="telephone" contenteditable="false"><?php echo trim($review['TELEPHONE_CL'])?></td>
		<td class="note" contenteditable="false"><?php echo trim($review['NOTE'])?></td>
		<td class="mark" contenteditable="false"><?php echo trim($review['MARKS'])?></td>
	</tr>
	<?php } ?>
	</tbody>
	<?php } ?>
</table>