<?php
$tables = $read->get_services(); ?>
<table id="table_table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Date & Time</th>
                    <th scope="col">Client tel</th>
                    <th scope="col">Staffer</th>
                  </tr>
                </thead>
	<?php if ( ! empty( $tables ) ) { ?>
                <tbody id="body_table">
                <?php foreach ( $tables as $table) {
                //	              			var_dump($type);die();
                ?>
                  <tr>
                    <td>
                      <button name="editFunc" class="editFTab editF">
                                                    E
                      </button>
                    </td>
                    <td>
                      <button name="delFunc" class="delFTab delF">
                                                   D
                      </button>
                    </td>
					  <?php


					  $data = str_replace(['AM','PM'],'', $table['DATA']);
					  $data = trim($data);
					  $data_time = strtotime($data) ;

					  if(strstr($table['DATA'],'PM')){
					  	$data_time = $data_time + 60*60*12;
					  }


					  $data_full = date('Y-m-d H:i:s', $data_time);
					  $data_array = explode(' ',$data_full);


					  ?>
                    <td class="date" contenteditable="false" data-time="<?php echo substr($data_array[1], 0, -3);  ?>" data-date="<?php echo $data_array[0] ?>"><?php echo  $data_full ?></td>
                    <td class="telephone_cl" contenteditable="false"><?php echo  trim($table['TELEPHONE_CL']) ?></td>
                    <td class="number_st" contenteditable="false" data-id="<?php echo $table['ID_STAFFER'] ?>"><?php echo trim($table['FIO_STAFF'])?></td>
                  </tr>
                <?php } ?>
                </tbody>
	<?php } ?>
              </table>