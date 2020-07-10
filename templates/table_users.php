<?php
$users = $read->get_users(); ?>
<table id="table_users">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Telephone</th>
                    <th scope="col">FIO</th>
                    <th scope="col">Sale</th>
                    <th scope="col">City</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
	<?php if ( ! empty( $users ) ) { ?>
                <tbody id="body_users">
                <?php foreach ( $users as $user) {
                //	              			var_dump($type);die();
                ?>
                  <tr>
                    <td>
                      <button name="editFunc" class="editFUs editF">
                                                    E
                      </button>
                    </td>
                    <td>
                      <button name="delFunc" class="delFUs delF">
                                                   D
                      </button>
                    </td>
                    <td class="telephone" contenteditable="false"><?php echo trim($user['TELEPHONE_CL'])?></td>
                    <td class="fio" contenteditable="false"><?php echo trim($user['FIO'])?></td>
                    <td class="sale" contenteditable="false"><?php echo trim($user['SALE'])?></td>
                    <td class="city" contenteditable="false" data-id="<?php echo $user['ID_CITY'] ?>"><?php echo trim($user['NAME_CITY'])?></td>
                    <td class="password" contenteditable="false"><?php echo trim($user['PASSWORD_CL'])?></td>
                  </tr>
                <?php } ?>
                </tbody>
	<?php } ?>
              </table>