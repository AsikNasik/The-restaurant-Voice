<section class="section_reviews">
        <div class="container">
            <div class="section_reviews_item">
                <div class="section_reviews_item_content">
                    <h2>Reviews</h2>
                    <div class="slideshow-container">
	                    <?php $reviews = $read->get_reviews_user();
	                    if ( ! empty( $reviews ) ) {
	                    	$reviews = array_reverse($reviews);
		                    foreach ( $reviews as $review ) {
			                    ?>
								<div class="mySlides">
									<div class="section_reviews_item_content_text">
										<?php echo $review['NOTE'] ?>
									</div>

									<div class="section_reviews_item_content_person" style="padding-bottom:10px;">
										<p class="auther_name"> <?php echo 'Mark: ' . $review['MARKS'] ?></p>
									</div>
									<div class="section_reviews_item_content_person">
										<p class="auther_name"> <?php echo $review['FIO'] ?></p>
									</div>
								</div>
			                    <?php
		                    }
	                    }
	                    ?>
                    </div>
                    <br />
                    <!--<div style="text-align: center;">
                        <span class="doter"></span>
                        <span class="doter"></span>
                        <span class="doter"></span>
                        <span class="doter"></span>
                    </div>-->
				<?php if(  empty($_SESSION['user_status']) || $_SESSION['user_status'] == 'admin'){}else{ ?>
                    <div class="section_reviews_buttons">
                        <button id="leave_review" class="button_style">
                            Add review
                        </button>
                    </div>
                </div>
				<?php } ?>

            </div>
        </div>
    </section>