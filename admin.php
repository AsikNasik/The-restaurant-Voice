<?php
session_start();

if(empty($_SESSION['user']) && $_SESSION['user_status']!='admin'){
	header("location: http://".$_SERVER['HTTP_HOST']);
	exit;
}

require_once 'head.php';
global $read;
?>
<body class="full_height_banner">
<?php
require_once './templates/admin_header.php'
?>


    <section class="section full_width">
      <div class="container">
        <div class="section_main">
          <div class="section_main_booking">
            <h1>Voice</h1>
            <h3>We have got your favorite dish</h3>
            <button id="section_menu_book_table" class="button_style">
              Book Table
            </button>
          </div>

          <div class="section_main_menu">
            <ul>
              <li><a href="javascript: void(0)">Menu</a></li>
              <li><a href="javascript: void(0)">Reservation</a></li>
              <li><a href="javascript: void(0)l">About us</a></li>
              <li><a href="javascript: void(0)">Contacts</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section_about_us">
      <div class="container">
        <div class="section_about_us_main">
          <div class="section_about_us_main_photo">
            <img class="photo_about_us" src="./img/facebook.png" />
            <!-- <img class="photo_about_us" src="./img/facebook.png" />
                  <img class="photo_about_us" src="./img/facebook.png" /> -->
            <!-- <div class="dots">
                  <div class="dot dot_empty"></div>
                  <div class="dot dot_full"></div>
                  <div class="dot dot_empty"></div>
                </div> -->
          </div>

          <div class="section_about_us_main_info">
            <div class="section_about_us_main_info_line">
              <div class="vertical_line"></div>
              <h2>About us</h2>
            </div>
            <div class="section_about_us_main_info_text">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam
              ea libero neque reprehenderit eveniet dicta sunt quibusdam cum
              culpa dolorum, officia quod corrupti debitis similique! Dolore
              veritatis ipsa omnis officiis!
            </div>
            <button id="section_about_us_read_more" class="button_style">
              Read more
            </button>
          </div>
        </div>
      </div>
    </section>

    <section class="section_dish">
      <div class="container">
        <div class="section_dish_day">
          <h2>Dish of the day</h2>
          <div class="section_dish_day_items">
            <div class="section_dish_day_item">
              <img src="./img/dish_day.png" />
              <div class="section_dish_day_item_content">
                <div class="section_dish_day_item_info">
                  <h3>Pizza Margarita</h3>
                  <div class="horisont_line"></div>
                  <div class="section_dish_day_item_info_text">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Tenetur eligendi repudiandae impedit inventore sunt nisi
                    quod, assumenda ea delectus soluta vitae id animi sequi
                    quaerat, quidem laborum molestias laudantium exercitationem?
                  </div>
                  <div class="section_dish_day_item_info_more">
                    <div class="section_dish_day_item_info_more_price">
                      $23.70
                    </div>
                    <button id="section_dish_show_menu" class="button_style">
                      Show Menu
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <?php
    require_once './templates/reviews.php'
    ?>

	<section class="section_reserve">
      <div class="container"></div>
    </section>

    <!-- FORMS start -->

    <section class="section_review section_form">
      <div class="popup_overlay">
        <div class="pop_up_container">
          <div class="section_review_info sections_info">
            <form class="form_review forms">
              <div class="cross"></div>
              <h2>Leave review</h2>
              <div class="form_review_content">
                <div class="form_review_inputs forms_inputs">
                  <input
                    type="text"
                    maxlength="9"
                    placeholder="Telephone"
                    required
                  />
                  <textarea
                    rows="6"
                    cols="32"
                    placeholder="Review"
                    maxlength="350"
                    required
                  ></textarea>
                  <input
                    type="number"
                    value="5"
                    max="5"
                    min="1"
                    step="1"
                    required
                  />
                </div>
                <button
                  id="review"
                  class="button_style_review button_style_form"
                >
                  Send
                </button>
              </div>
            </form>
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
                    required
                  />
                  <input type="text" placeholder="FIO" required />
                  <input type="date" placeholder="Birthday: 01/01/1960" />
                  <input
                    type="text"
                    placeholder="Worker type"
                    list=""
                    required
                  />
                  <input type="password" placeholder="Password" required />
                  <input type="password" placeholder="Password" required />
                </div>
                <button id="staff" class="button_style_staff button_style_form">
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- FROMS end -->

    <footer class="footer">
      <div class="container">
        <div class="footer_content">
          <div class="footer_content_main">
            <div class="footer_content_main_navigation">
              <h4>Navigation</h4>
              <ul>
                <li><a href="javascript: void(0)">Menu</a></li>
                <li><a href="javascript: void(0)">Reservation</a></li>
                <li><a href="javascript: void(0)">About us</a></li>
                <li><a href="javascript: void(0)">Contacts</a></li>
              </ul>
            </div>

            <div class="footer_content_main_follow header_images">
              <h4>Follow us</h4>
              <div class="footer_images">
                <a class="icon_link" href="https://web.telegram.org/#/login">
                  <svg class="svg-icon">
                    <use xlink:href="#telegram"></use>
                  </svg>
                </a>

                <a class="icon_link" href="https://www.instagram.com/">
                  <svg class="svg-icon">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </a>

                <a class="icon_link" href="https://www.facebook.com/">
                  <svg class="svg-icon">
                    <use xlink:href="#facebook"></use>
                  </svg>
                </a>
              </div>
            </div>

            <div class="footer_content_main_hours">
              <h4>We are opened 24/7</h4>
              <ul>
                <li><b>Nights!</b> Absolutely No Extra Charge</li>
                <li><b>Weekends!</b> Absolutely No Extra Charge</li>
                <li><b>Holidays!</b> Absolutely No Extra Charge</li>
              </ul>
            </div>

            <div class="footer_content_main_location">
              <h4>Location</h4>
              <ul>
                <!-- <li class="name_restaurant">Voice</li> -->
                <li>Sumska Street 33</li>
                <li>Kharkiv 61200, Ukraine</li>
                <li class="email_restaurant">
                  <a href="https://mail.google.com/mail"
                    >voice_restaurant@gmail.com</a
                  >
                </li>
                <li>+38 (066)-93-45-556</li>
                <li>+38 (093)-45-93-556</li>
              </ul>
            </div>
          </div>

          <div class="footer_content_copyright">
            <div class="horisont_line_footer"></div>

            <p>Copyright 2020 @ by Anastasiia Andrieieva</p>

            <div class="horisont_line_footer"></div>
          </div>
        </div>
      </div>
    </footer>
  </body>

  <script src="js/common.js"></script>

  <!-- SVG follow us -->
  <svg
    class="root-svg-symbols-element"
    xmlns="http://www.w3.org/2000/svg"
    style="
      border: 0 !important;
      clip: rect(0 0 0 0) !important;
      height: 1px !important;
      margin: -1px !important;
      overflow: hidden !important;
      padding: 0 !important;
      position: absolute !important;
      width: 1px !important;
    "
  >
    <symbol id="instagram" viewBox="0 0 20 20">
      <path
        d="M19.1118 6.22301C19.066 5.25134 18.9102 4.58217 18.6902 3.99551C18.4518 3.39051 18.1402 2.87717 17.636 2.37301C17.1227 1.85967 16.6185 1.54801 16.0135 1.31884C15.4268 1.08967 14.7668 0.933841 13.786 0.897174C12.8052 0.842174 12.4935 0.833008 10.0002 0.833008C7.50683 0.833008 7.19516 0.842174 6.2235 0.888008C5.24266 0.933841 4.58266 1.08967 3.996 1.30967C3.391 1.54801 2.87766 1.85967 2.3735 2.36384C1.86016 2.87717 1.5485 3.38134 1.31933 3.98634C1.09016 4.58217 0.934329 5.24217 0.888496 6.22301C0.842663 7.19467 0.833496 7.50634 0.833496 9.99967C0.833496 12.493 0.842663 12.8047 0.888496 13.7763C0.934329 14.748 1.09016 15.4172 1.31016 16.0038C1.5485 16.6088 1.86016 17.1222 2.36433 17.6263C2.87766 18.1397 3.38183 18.4513 3.98683 18.6805C4.5735 18.9097 5.2335 19.0655 6.21433 19.1022C7.19516 19.1572 7.50683 19.1663 10.0002 19.1663C12.4935 19.1663 12.8052 19.1572 13.7768 19.1113C14.7485 19.0655 15.4177 18.9097 16.0043 18.6897C16.6093 18.4513 17.1227 18.1397 17.6268 17.6355C18.1402 17.1222 18.4518 16.618 18.681 16.013C18.9102 15.4263 19.066 14.7663 19.1027 13.7855C19.1577 12.8047 19.1668 12.493 19.1668 9.99967C19.1668 7.50634 19.1577 7.19467 19.1118 6.22301ZM17.4618 13.703C17.4252 14.5922 17.2693 15.078 17.1502 15.408C16.9852 15.8388 16.7835 16.1413 16.4627 16.4622C16.1418 16.783 15.8393 16.9847 15.4085 17.1497C15.0877 17.278 14.6018 17.4247 13.7035 17.4613C12.741 17.5072 12.4477 17.5163 10.0002 17.5163C7.55266 17.5163 7.25933 17.5072 6.29683 17.4613C5.3985 17.4247 4.92183 17.2688 4.59183 17.1497C4.161 16.9847 3.8585 16.783 3.53766 16.4622C3.21683 16.1413 3.02433 15.8297 2.85016 15.408C2.72183 15.0872 2.57516 14.6013 2.5385 13.703C2.49266 12.7405 2.4835 12.4472 2.4835 9.99967C2.4835 7.55217 2.49266 7.25884 2.5385 6.29634C2.57516 5.39801 2.731 4.91217 2.85016 4.59134C3.01516 4.16051 3.21683 3.85801 3.53766 3.53717C3.8585 3.21634 4.17016 3.02384 4.59183 2.84967C4.91266 2.72134 5.3985 2.57467 6.29683 2.53801C7.25933 2.49217 7.55266 2.48301 10.0002 2.48301C12.4477 2.48301 12.741 2.49217 13.7035 2.53801C14.6018 2.57467 15.0785 2.73051 15.4085 2.84967C15.8393 3.01467 16.1418 3.21634 16.4627 3.53717C16.7835 3.85801 16.976 4.16967 17.1502 4.59134C17.2785 4.91217 17.4252 5.39801 17.4618 6.29634C17.5077 7.25884 17.5168 7.55217 17.5168 9.99967C17.5168 12.4472 17.5077 12.7405 17.4618 13.703ZM10.0002 5.28801C7.39683 5.28801 5.2885 7.39634 5.2885 9.99967C5.2885 12.603 7.39683 14.7113 10.0002 14.7113C12.6035 14.7113 14.7118 12.603 14.7118 9.99967C14.7118 7.39634 12.6035 5.28801 10.0002 5.28801ZM10.0002 13.0522C8.3135 13.0522 6.94766 11.6863 6.94766 9.99967C6.94766 8.31301 8.3135 6.94717 10.0002 6.94717C11.6868 6.94717 13.0527 8.31301 13.0527 9.99967C13.0527 11.6863 11.6868 13.0522 10.0002 13.0522ZM15.9952 5.10467C15.9952 5.70967 15.5002 6.20467 14.8952 6.20467C14.2902 6.20467 13.7952 5.70967 13.7952 5.10467C13.7952 4.49967 14.2902 4.00467 14.8952 4.00467C15.5002 4.00467 15.9952 4.49967 15.9952 5.10467Z"
      />
    </symbol>
    <symbol id="telegram" viewBox="0 0 20 20">
      <path
        d="M4.5482 10.5017L0.323817 8.99265C-0.105242 8.83874 -0.108968 8.25904 0.318879 8.10088L17.6558 1.69979C18.0233 1.56371 18.4026 1.87181 18.3225 2.24131L15.2113 16.565C15.138 16.9034 14.7237 17.0567 14.4313 16.8533L10.1842 13.9019C9.92623 13.7228 9.57464 13.7324 9.32782 13.9248L6.97308 15.7621C6.69974 15.976 6.28792 15.8569 6.18327 15.5346L4.5482 10.5017ZM14.1757 4.83145L5.91974 9.69825C5.60331 9.88526 5.45431 10.2511 5.55656 10.5934L6.44922 13.5955C6.51259 13.8082 6.8352 13.7865 6.86592 13.5666L7.09801 11.9203C7.14178 11.6102 7.29628 11.3248 7.53576 11.1114L14.3493 5.04958C14.4768 4.93641 14.3241 4.74431 14.1757 4.83145Z"
      />
    </symbol>
    <symbol id="facebook" viewBox="0 0 20 20">
      <g clip-path="url(#clip0)">
        <path
          d="M20 10C20 4.475 15.525 0 10 0C4.475 0 0 4.475 0 10C0 14.9917 3.65833 19.125 8.43333 19.875V12.8833H5.9V10H8.44167V7.8C8.44167 5.29167 9.93333 3.90833 12.2167 3.90833C13.3083 3.90833 14.4583 4.1 14.4583 4.1V6.55833H13.2C11.9583 6.55833 11.5667 7.33333 11.5667 8.11667V10H14.3417L13.9 12.8917H11.5667V19.8833C16.3417 19.125 20 14.9917 20 10Z"
        />
        <path
          d="M13.8916 12.8915L14.3332 9.99987H11.5582V8.12487C11.5582 7.3332 11.9416 6.56654 13.1916 6.56654H14.4499V4.09987C14.4499 4.09987 13.3082 3.9082 12.2082 3.9082C9.9249 3.9082 8.43324 5.29154 8.43324 7.79987V9.99987H5.8999V12.8915H8.44157V19.8832C8.9499 19.9582 9.46657 19.9999 9.9999 19.9999C10.5332 19.9999 11.0499 19.9582 11.5666 19.8749V12.8832H13.8916V12.8915Z"
          fill="#748f8b"
        />
      </g>
      <defs>
        <clipPath id="clip0">
          <path d="M0 0H20V20H0V0Z" />
        </clipPath>
      </defs>
    </symbol>
  </svg>
</html>
