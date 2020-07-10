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
            <h2 class="name_admin_section">Types</h2>
            <div class="table table_staff">
	            <?php require_once './templates/table_types.php'?>
            </div>
              <button
            class="buttonAddPerson"
            id="addType"
          >
            Add type
          </button>
        </div>
      </div>
      </div>
    </section>

    <section class="section_type section_form">
        <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_type_info sections_info">
              <form class="form_type forms">
                <div class="cross"></div>
                <div class="form_type_content ">
                  <h2>Type</h2>
                      <div class="form_type_inputs forms_inputs">
                        <input type="text"  name="type" placeholder="Type" required />
                        <input type="text" maxlength="5" name="salary" placeholder="Salary" required />
                        </div>
                        <button id="add_type" class="button_style_type button_style_form">Add</button>
                  </div>
                </form>
              </div>
        </div>
        </div>
      </section>

      <section class="section_type_edit section_form">
        <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_type_edit_info sections_info">
              <form class="form_type forms">
                <div class="cross"></div>
                <div class="form_type_edit_content ">
                  <h2>Edit</h2>
                      <div class="form_type_edit_inputs forms_inputs">
                        <input type="text"  name="typee" placeholder="Name" required />
                        <input type="text"  name="salarye" placeholder="Salary" required />
                        </div>
                        <button id="save_type" class="button_style_type_edit button_style_form">Save</button>
                  </div>
                </form>
              </div>
        </div>
        </div>
      </section>
</body>
    <script src="js/common.js"></script>

</html>

