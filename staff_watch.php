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
            <h2 class="name_admin_section">Staff</h2>
            <div class="table table_staff">
				<?php require_once './templates/table_staffs.php'?>
            </div>
              <button
            class="buttonAddPerson"
            id="addStaffer"
          >
            Add person
          </button>
        </div>
      </div>
      </div>
    </section>

    <section class="section_staff section_form">
      <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_staff_info sections_info">
            <form class="form_staff forms">
              <div class="cross"></div>
              <h2>Add staffer</h2>
              <div class="form_staff_content">
                <div class="form_staff_inputs forms_inputs">
                  <input
                    type="text"
                    maxlength="9"
                    placeholder="Telephone"
                    name="telephone_st"
                    required
                  />
                  <input type="text" name="fio_st" placeholder="FIO" required />
                  <input id="set_date" type="date" name="birthday" placeholder="Birthday: 01/01/1960" />
                  <select name="type_st"> 
                    <?php
                    $types = $read->get_types();
                    foreach ($types as $type){?>
                      <option value="<?php echo trim($type['TYPEWORKER']) ?>"><?php echo trim($type['TYPEWORKER']); ?></option>
                    <?php } ?>
                  </select>
                  <input type="password" name="pass" placeholder="Password" required />
                  <input type="password" name="pass2" placeholder="Password" required />
                </div>
                <button id="add_staffer" class="button_style_staff button_style_form">
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="section_staff_edit section_form">
      <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_staff_edit_info sections_info">
            <form class="form_staff_edit forms">
              <div class="cross"></div>
              <h2>Edit</h2>
              <div class="form_staff_edit_content">
                <div class="form_staff_edit_inputs forms_inputs">
                  <input
                    type="text"
                    maxlength="9"
                    placeholder="Telephone"
                    name="telephone_ste"
                    class="telephone"
					disabled
                    required
                  />
                  <input class="fio" type="text" name="fio_ste" placeholder="FIO"  required />
                  <input id="set_date_edit" class="birthday" type="date" name="birthdaye" />
                  <select name="type_ste">
                    <?php
                    $types = $read->get_types();
                    foreach ($types as $type){?>
                      <option value="<?php echo $type['TYPEWORKER'] ?>"><?php echo trim($type['TYPEWORKER']); ?></option>
                    <?php } ?>
                  </select>

                  <input class="pass" type="text" name="passe" placeholder="Password" required />
                </div>
                <button id="save_staffer" class="button_style_staff_edit button_style_form">
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </body>
    
    <script src="js/common.js"></script>

</html>



