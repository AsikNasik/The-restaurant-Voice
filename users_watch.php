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
            <h2 class="name_admin_section">Users</h2>
            <div class="table table_staff">
	            <?php require_once './templates/table_users.php'?>
            </div>
             
        </div>
      </div>
      </div>
    </section>

    
    <section class="section_registration_edit">
      <div class="popup_overlay">
      <div class="pop_up_container">
        <div class="section_registration_edit_info sections_info">
          <form class="form_registration_edit forms">
            <div class="cross"></div>
            <h2>Edit</h2>
            <div class="form_registration_edit_content">
              <div class="form_registration_edit_inputs forms_inputs">
                <input
                  type="text"
                  maxlength="9"
                  placeholder="Telephone"
                  name="telephone"
				  disabled
                  required
                />
                <input name="fio" type="text" placeholder="FIO" required />
                <select name="city"> 
                  <?php
                  $cities = $read->get_cities();
                  foreach ($cities as $city){?>
                    <option value="<?php echo $city['ID_CITY'] ?>"><?php echo trim($city['NAME_CITY']); ?></option>
                  <?php } ?>
                </select>
                <input name="password" type="text" placeholder="Password" required />
              </div>
              <button id="save_user" class="button_style_registration_edit button_style_form">
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



