<?php 
	$saved_members = get_option( 'wdo_team_builder_option' );
	if (isset( $saved_members['allmembers']) ) { 
		ob_start(); ?>
		<div class="teambuilder-container">
			<div class="row">
				<?php foreach ( $saved_members['allmembers'] as $key => $membersdata ) {  ?>
					<?php foreach ( $membersdata['allteamMembers'] as $key => $member ) {  ?>
						<?php  if ($atts['id']== $member['shortcode']) { 
							wp_enqueue_style( 'team-bootstrap-css', plugins_url( 'assests/css/bootstrap.min.css',__FILE__ ));
							wp_enqueue_style( 'teambuilder-css', plugins_url( 'assests/css/builder-styles.css',__FILE__ ));
							?>
							<div class="col-md-<?php echo $member['member_grid']; ?> col-sm-6">
						    	<div class="<?php echo $member['member_style']; ?> member-light">
						    	    <div class="member-photo">

						    	        <img src="<?php echo $member['member_img']; ?>">
						    	        

						    	        
							    	        <div class="member-icons">

								    	        
								    	        	<a href="<?php echo $member['member_twitter']; ?>" title="twitter" class="member-icon">
								    	                <i class="fa fa-twitter"></i>
								    	            </a>
								    	        

								    	        
								    	            <a href="<?php echo $member['member_google_plus']; ?>" title="google plus" class="member-icon">
								    	                <i class="fa fa-google-plus"></i>
								    	            </a>
								    	      

								    	        
								    	            <a href="<?php echo $member['member_facebook']; ?>" title="facebook" class="member-icon">
								    	                <i class="fa fa-facebook"></i>
								    	            </a>
												

												
								    	            <a href="<?php echo $member['member_linkedin']; ?>" title="linkedin" class="member-icon">
								    	                <i class="fa fa-linkedin"></i>
								    	            </a>
								    	        

							    	        </div>

						    	     
						    	    </div>
						    	    <div class="member-info">
						    	        <h3 class="member-name"><?php echo $member['member_name']; ?></h3>
						    	        <span class="member-role"><?php echo $member['member_position']; ?></span>
						    	    </div>
						    	</div>
						    </div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	<?php return ob_get_clean(); 
 ?>