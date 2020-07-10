<header class="header">
	<div class="container">
		<div class="header_head">
			<div class="header_head_menu">
				<ul>
					<li><a href="admin.php">Main</a></li>
					<li><a href="staff_watch.php">Staff</a></li>
					<li><a href="users_watch.php">Users</a></li>
					<li><a href="tables_watch.php">Tables</a></li>
					<li><a href="reviews_watch.php">Reviews</a></li>
					<li><a href="type_watch.php">Types</a></li>
					<li><a href="citis_watch.php">Cities</a></li>
				</ul>
			</div>

			<!-- <div class="header_head_contacts">
			  <ul>
				<li>+38 (066)-93-45-556</li>
				<li>+38 (093)-45-93-556</li>
			  </ul>
			  <div class="header_images">
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

			  <div class="header_head_authorization">
			  ADD THE $username -->
			<div class="header_head_authorization">
				<p> <?php echo $_SESSION['user'] ?></p>
				<a data-effect="mfp-zoom-out" id="log_out" href="/logout.php">Log out</a>
			</div>
		</div>
	</div>
</header>
