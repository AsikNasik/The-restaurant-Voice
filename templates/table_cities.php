<?php
$cities = $read->get_cities(); ?>
<table id="table_city">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">City</th>
                  </tr>
                </thead>
	<?php if ( ! empty( $cities ) ) { ?>
                <tbody id="body_city">
                <?php foreach ( $cities as $city ) {
//                			var_dump($city);die();
                ?>
                  <tr>
                    <td>
                      <button name="editFunc" class="editFCity editF">
                                                    E
                      </button>
                    </td>
                    <td>
                      <button name="delFunc" class="delFCity delF">
                                                   D
                      </button>
                    </td>
                    <td class="city" contenteditable="false"><?php echo trim($city['NAME_CITY'])?></td>
                  </tr>
                <?php } ?>
                </tbody>
	<?php } ?>
              </table>