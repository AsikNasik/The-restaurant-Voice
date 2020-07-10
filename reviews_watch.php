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
            <h2 class="name_admin_section">Reviews</h2>
            <div class="table table_staff">
	            <?php require_once './templates/table_reviews.php'?>
            </div>
        </div>
      </div>
      </div>
    </section>

</body>
    <script src="js/common.js"></script>

</html>



