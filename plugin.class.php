<?php 
	/**
	* Plugin Main Class
	*/
	class WDO_Team_Builder {
		
		function __construct() 
		{
			add_action( "admin_menu", array($this,'team_builder_admin_options'));
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_options_page_scripts' ) );
			add_action('wp_ajax_la_save_team_builder', array($this, 'save_team_builder_options'));
			add_shortcode( 'wdo-team-builder', array($this,'render_team_builder') );
		}

		// Admin Options Page
		function admin_options_page_scripts($slug){
			if($slug=='toplevel_page_wdo_team_builder'){
				wp_enqueue_media();
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'admin-js', plugins_url( 'admin/admin.js', __FILE__ ), array('jquery', 'jquery-ui-accordion','wp-color-picker'));
				wp_enqueue_style( 'ui-css', plugins_url( 'admin/jquery-ui.min.css', __FILE__ ));
				wp_enqueue_style( 'style-css', plugins_url( 'admin/style.css', __FILE__ ));
				wp_localize_script( 'admin-js', 'laAjax', array( 'url' => admin_url( 'admin-ajax.php' )));
			}
		}

		function team_builder_admin_options() {
			add_menu_page( 'Team Builder', 'Team Builder', 'manage_options', 'wdo_team_builder', array($this,'render_menu_page'), 'dashicons-businessman' );
		}

		function save_team_builder_options() {
			print_r($_REQUEST);
			if (isset($_REQUEST)) {
				update_option( 'wdo_team_builder_option', $_REQUEST );
			}
		}

		function render_menu_page() {

			load_template( dirname( __FILE__ ) . '/includes/admin-settings.php' );

		}

		function render_team_builder($atts) {

			// load_template( dirname( __FILE__ ) . '/includes/render-team-builder.php' );
			$saved_members = get_option( 'wdo_team_builder_option' );
			if (isset( $saved_members['allmembers']) ) { 
				ob_start(); ?>
				<div class="team-builder">
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
								    	        <img src="<?php echo $member['member_img']; ?>" alt="Jhon Smith">
								    	        <div class="member-icons">
								    	            <a href="<?php echo $member['member_twitter']; ?>" title="twitter" class="member-icon">
								    	                <i class="fa fa-twitter"></i>
								    	            </a>
								    	            <a href="<?php echo $member['member_google_plus']; ?>" title="google plus" class="member-icon">
								    	                <i class="fa fa-google-plus"></i>
								    	            </a>
								    	            <a href="<?php echo $member['member_facebook']; ?>" title="facebook" class="member-icon">
								    	                <i class="fa fa-facebook"></i>
								    	            </a><a href="<?php echo $member['member_linkedin']; ?>" title="linkedin" class="member-icon">
								    	                <i class="fa fa-linkedin"></i>
								    	            </a>
								    	        </div>
								    	    </div>
								    	    <div class="member-info">
								    	       <a href="<?php echo $member['member_link']; ?>" target="<?php echo $member['member_profile_tab']; ?>">
								    	       		<h3 class="member-name"><?php echo $member['member_name']; ?></h3>
								    	       	</a> 
								    	        <span class="member-role"> <?php echo $member['member_position']; ?></span>
								    	    </div>
								    	</div>
								    </div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			<?php return ob_get_clean(); ?>
			<?php }
		}
	}
 ?>