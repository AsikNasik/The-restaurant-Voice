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
            <h2 class="name_admin_section">Cities</h2>
            <div class="table table_staff">
	            <?php require_once './templates/table_cities.php'?>
            </div>
              <button
            class="buttonAddPerson"
            id="addCity"
          >
            Add city
          </button>
        </div>
      </div>
      </div>
    </section>

    <section class="section_city section_form">
        <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_city_info sections_info">
              <form class="form_city forms">
                <div class="cross"></div>
                <div class="form_city_content ">
                  <h2>City</h2>
                      <div class="form_city_inputs forms_inputs">
                        <input type="text"  name="city" placeholder="Name" required />
                        </div>
                        <button id="add_city" class="button_style_city button_style_form">Add</button>
                  </div>
                </form>
              </div>
        </div>
        </div>
      </section>

      <section class="section_city_edit section_form">
        <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_city_edit_info sections_info">
              <form class="form_city forms">
                <div class="cross"></div>
                <div class="form_city_edit_content ">
                  <h2>Edit</h2>
                      <div class="form_city_edit_inputs forms_inputs">
                        <input type="text"  name="city_edit" placeholder="Name" required />
                        </div>
                        <button id="save_city" class="button_style_city_edit button_style_form">Save</button>
                  </div>
                </form>
              </div>
        </div>
        </div>
      </section>
</body>
    <script src="js/common.js"></script>

</html>

