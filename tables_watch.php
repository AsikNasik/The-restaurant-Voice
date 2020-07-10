<?php
session_start();

if(empty($_SESSION['user']) && $_SESSION['user_status']!='admin'){
	header("location: http://".$_SERVER['HTTP_HOST']);
	exit;
}

require_once 'head.php';
global $read;
?>
<body>
<?php
require_once './templates/admin_header.php'
?>
    <section class="section full_width info_watch_top">
      <div class="container">
        <div class="section_main">
          <div class="section_main_table">
            <h2 class="name_admin_section">Tables</h2>
            <div class="table table_staff">
	            <?php require_once './templates/table_table.php'?>
            </div>
              <button
            class="buttonAddPerson"
            id="addTable"
          >
            Add table
          </button>
        </div>
      </div>
      </div>
    </section>

    <section class="section_book section_form">
        <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_book_info sections_info">
              <form class="form_book forms">
                <div class="cross"></div>
                <div class="form_book_content ">
                  <h2>Table</h2>
                      <div class="form_book_inputs forms_inputs">
                        <input type="date" placeholder="Data" name="date" required />
                        <input type="time" placeholder="Time" name="time" required />
					  <select name="telephone_cl">
						  <?php
						  $users = $read->get_users();
						  foreach ( $users as $user ) {
							  ?>
							  <option value="<?php echo $user['TELEPHONE_CL'] ?>"><?php echo trim( $user['TELEPHONE_CL'] ); ?></option>
						  <?php } ?>
					  </select>
					  <select name="number_staff">
						  <?php
						  $staffers = $read->get_id_staffers();

						  foreach ( $staffers as $staff ) {
							  ?>
							  <option value="<?php echo $staff['ID_STAFFER'] ?>"><?php echo trim( $staff['FIO_STAFF'] ); ?></option>
						  <?php } ?>
					  </select>
                        </div>.

                        <button id="add_table" class="button_style_book button_style_form">Add</button>
                  </div>
                </form>
              </div>
        </div>
        </div>
      </section>
      
      <section class="section_book_edit section_form">
        <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_book_edit_info sections_info">
              <form class="form_book_edit forms">
                <div class="cross"></div>
                <div class="form_book_edit_content ">
                  <h2>Edit</h2>
                      <div class="form_book_edit_inputs forms_inputs">
                        <input id="edit_date_table" class="date" type="date" placeholder="Date" name="datee"  disabled required />
                        <input id="edit_time_table" class="time" type="time" placeholder="Time" name="timee" disabled required />
                        <input class="telephone" type="text" maxlength="9" name="telephone_cle" placeholder="Telephone client" disabled required />
					  <select name="number_staffe">
						  <?php
						  $staffers = $read->get_id_staffers();
						  foreach ($staffers as $id){
						  	?>
							  <option value="<?php echo trim($id['ID_STAFFER']) ?>"><?php echo trim($id['FIO_STAFF']); ?></option>
						  <?php } ?>
					  </select>
                        </div>
                        <button id="save_table" class="button_style_book button_style_form">Save</button>
                  </div>
                </form>
              </div>
        </div>
        </div>
      </section>
</body>
    <script src="js/common.js"></script>

</html>

