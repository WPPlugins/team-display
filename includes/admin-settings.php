<?php
	$saved_members = get_option( 'wdo_team_builder_option' );
	// var_dump($saved_members);
?>
<div class="wrapper" id="team-container">
	<h2>Team Builder</h2>
	<a style="text-decoration:none;"  href="https://codecanyon.net/item/team-showcase-wordpress-plugin/4936368?ref=labibahmed" target="_blank"><h4 style="padding: 10px;background: #31b999;color: #fff;margin-bottom: 0px;text-align:center;font-size:24px;">Get Pro Version</h4></a><br>
	<div id="faqs-container" class="accordian">
	<?php if (isset($saved_members['allmembers'])) { ?>
		<?php foreach ($saved_members['allmembers'] as $key => $memberdata) {  ?>
	    <h3>
	    	<a href="#">
	    	<?php if ( $memberdata['cat_name'] !== '' ) {
				    	$catname= stripslashes($memberdata['cat_name']);
				    	echo $catname; 
				    } else {
				    	echo "Team";
				    } 
			?>
			</a>
	    </h3>
	    <div class="accordian content">
	    <?php foreach ($memberdata['allteamMembers'] as $key => $member) { ?>
		   <h3>
		   		<a href="#">
			    	<?php if ( $member['team_member_name'] !== '' ) {
						    	$catname= stripslashes($member['team_member_name']);
						    	echo $catname; 
						    } else {
						    	echo "Team Member";
						    } 
					?>
				</a>
		   	</h3>
	        <div>
	        	<table class="form-table">
	        		<tr>
	        			<td style="width:20%">
	        				<strong><?php _e( 'Team Name', 'wdo-team-builder' ); ?></strong>
	        			</td>

	        			<td style="width:30%">
	        				<input type="text" class="teamname widefat form-control" value="<?php echo $member['team_name']; ?>"> 
	        			</td>

	        			<td style="width:50%">
	        				<p class="description"><?php _e( 'Name the team( for your reference ).Team name should be same for every member', 'wdo-team-builder' ); ?></p>
	        			</td>
	        		</tr>
	        		<tr>
	        			<td >
	        				<strong><?php _e( 'Member Name', 'wdo-team-builder' ); ?></strong>
	        			</td>

	        			<td >
	        				<input type="text" class="teammembername widefat form-control" value="<?php echo $member['team_member_name']; ?>">
	        			</td>

	        			<td>
	        				<p class="description"><?php _e( 'Name the image.It will be for your reference', 'wdo-team-builder' ); ?></p>
	        			</td>
	        		</tr>
	        	</table>
	        	<button class="memberimage button"><?php _e( 'Upload Member Image', 'wdo-team-builder' ); ?></button>
	        	<span class="image">
	        		<?php 
        				if ($member['member_img']!='') {
			        		
			        			echo '<span><img src="'.$member['member_img'].'"><span class="dashicons dashicons-dismiss"></span></span>'; 
			        	} 
				    ?>
	        	</span><br>
	        	<h4><?php _e( 'Members Infomation', 'wdo-team-builder' ); ?></h4>
	        	<hr>
				<table class="form-table">

					<tr>
						<td style="width:20%">
							<strong><?php _e( 'Name', 'wdo-team-builder' ); ?></strong>
						</td>
						<td style="width:30%">
							<input type="text" class="widefat membername form-control" value="<?php echo $member['member_name']; ?>">
						</td>
						<td style="width:50%">
							<p class="description"><?php _e( 'Type name of member.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Job Title', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="widefat memberposition form-control" value="<?php echo $member['member_position']; ?>">
						</td>
						<td>
							<p class="description"><?php _e( 'The job description,postion or fuction of this member.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Profile Link', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="widefat memberlink form-control" value="<?php echo $member['member_link']; ?>">
						</td>
						<td>
							<p class="description"><?php _e( 'Give link to member profile.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Open Profile in New Tab', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="memberprofiletab form-control">
								<option value="_blank" <?php if ( $member['member_profile_tab'] == '_blank' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'wdo-team-builder' ); ?></option>
								<option value="_self" <?php if ( $member['member_profile_tab'] == '_self' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'wdo-team-builder' ); ?></option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Choose want to open link in new tab or not.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Style', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="memberstyle form-control">
								<option value="member-style1" <?php if ( $member['member_style'] == 'member-style1' ) echo 'selected="selected"'; ?>><?php _e( 'Style 1', 'wdo-team-builder' ); ?></option>
								<option value="member-style2" <?php if ( $member['member_style'] == 'member-style2' ) echo 'selected="selected"'; ?>><?php _e( 'Style 2', 'wdo-team-builder' ); ?></option>
								<option value="member-style3" <?php if ( $member['member_style'] == 'member-style3' ) echo 'selected="selected"'; ?>><?php _e( 'Style 3', 'wdo-team-builder' ); ?></option>
								<option value="member-style4" <?php if ( $member['member_style'] == 'member-style4' ) echo 'selected="selected"'; ?>><?php _e( 'Style 4', 'wdo-team-builder' ); ?></option>
								<option value="member-style5" <?php if ( $member['member_style'] == 'member-style5' ) echo 'selected="selected"'; ?>><?php _e( 'Style 5', 'wdo-team-builder' ); ?></option>
								<option value="member-style6" <?php if ( $member['member_style'] == 'member-style6' ) echo 'selected="selected"'; ?>><?php _e( 'Style 6', 'wdo-team-builder' ); ?></option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Member information will be aligned according to selected option.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Member Per Row', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="membergrid form-control">
							  <option value="12" <?php if ( $member['member_grid'] == '12' ) echo 'selected="selected"'; ?>>1</option>
							  <option value="6" <?php if ( $member['member_grid'] == '6' ) echo 'selected="selected"'; ?>>2</option>
							  <option value="4" <?php if ( $member['member_grid'] == '4' ) echo 'selected="selected"'; ?>>3</option>
							  <option value="3" <?php if ( $member['member_grid'] == '3' ) echo 'selected="selected"'; ?>>4</option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Select number of members you want to show per row.It should be kept same for everymember.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Member Alignment', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="memberalign form-control">
								<option value="member-align-left" <?php if ( $member['member_align'] == 'member-align-left' ) echo 'selected="selected"'; ?>><?php _e( 'Left', 'wdo-team-builder' ); ?></option>
								<option value="member-align-center" <?php if ( $member['member_align'] == 'member-align-center' ) echo 'selected="selected"'; ?>><?php _e( 'Center', 'wdo-team-builder' ); ?></option>
								<option value="member-align-right" <?php if ( $member['member_align'] == 'member-align-right' ) echo 'selected="selected"'; ?>><?php _e( 'Right', 'wdo-team-builder' ); ?></option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Member information will be aligned according to selected option.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<!-- <tr>
	  					<td>
	  						<strong><?php _e( 'Colour Scheme', 'wdo-team-builder' ); ?></strong>
	  					</td>
	  					<td class="insert-picker">
	  						<input type="text" class="membercolorscheme" value="<?php echo $member['member_color_scheme']; ?>">
	  					</td>
	  					<td>
	  						<p class="description"><?php _e( 'Select color scheme for member profile.', 'wdo-team-builder' ); ?>.</p>
	  					</td>
  					</tr> -->
				</table>
				<h4><?php _e( 'Social Profile Links', 'wdo-team-builder' ); ?></h4>
				<hr>
				<table class="form-table">
					<tr>
						<td style="width:20%">
							<strong><?php _e( 'Facebook', 'wdo-team-builder' ); ?></strong>
						</td>
						<td style="width:30%">
							<input type="text" class="form-control memberfacebook" value="<?php echo $member['member_facebook']; ?>">
						</td>
						<td style="width:50%">
							<p class="description"><?php _e( 'Facebook profile complete link. Example: https://www.facebook.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Twitter', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="form-control membertwitter" value="<?php echo $member['member_twitter']; ?>">
						</td>
						<td>
							<p class="description"><?php _e( 'Twitter profile complete link. Example: https://www.twitter.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'LinkedIn', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="form-control memberlinkedin" value="<?php echo $member['member_linkedin']; ?>">
						</td>
						<td>
							<p class="description"><?php _e( 'LinkedIn profile complete link. Example: https://www.linkedin.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Google Plus', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="form-control membergoogleplus" value="<?php echo $member['member_google_plus']; ?>">
						</td>
						<td>
							<p class="description"><?php _e( 'Google Plus profile complete link. Example: https://www.plus.google.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
				</table><br>
				<hr>
				<button class="btn btn-danger btn-sm removeitem"> <?php _e( 'Remove Member', 'wdo-team-builder' ); ?> </button> 
				<span class="moreimages">
		    		<button class="btn btn-success btn-sm moreimg"> <i class="dashicons dashicons-businessman"></i> <?php _e( 'Add Member', 'wdo-team-builder' ); ?></button>
					<button class="btn btn-primary btn-sm addcat"><i class="dashicons dashicons-groups"></i> <?php _e( 'Add Team', 'wdo-team-builder' ); ?></button>
					<button class="btn btn-info btn-md fullshortcode pull-right" id="<?php echo $member['shortcode']; ?>"><i class="dashicons dashicons-editor-code"></i> <?php _e( 'Get Shortcode', 'wdo-team-builder' ); ?></button>
					<button class="btn btn-danger btn-block removecat pull-right"><?php _e( 'Remove Team', 'wdo-team-builder' ); ?></button>
	    		</span>
	        </div>
			<?php } ?>
	    </div>
		<?php } ?>
	<?php } else { ?>
		<h3><a href="#">Team</a></h3>
	    <div class="accordian content">
		   <h3>
		   		<a class=href="#">Team Member</a>
		   	</h3>
	        <div>
	        	<table class="form-table">
	        		<tr>
	        			<td style="width:20%">
	        				<strong><?php _e( 'Team Name', 'wdo-team-builder' ); ?></strong>
	        			</td>

	        			<td style="width:30%">
	        				<input type="text" class="teamname widefat form-control"> 
	        			</td>

	        			<td style="width:50%">
	        				<p class="description"><?php _e( 'Name the team( for your reference ).Team name should be same for every member', 'wdo-team-builder' ); ?></p>
	        			</td>
	        		</tr>
	        		<tr>
	        			<td >
	        				<strong><?php _e( 'Member Name', 'wdo-team-builder' ); ?></strong>
	        			</td>

	        			<td >
	        				<input type="text" class="teammembername widefat form-control" value="">
	        			</td>

	        			<td>
	        				<p class="description"><?php _e( 'Name the image.It will be for your reference', 'wdo-team-builder' ); ?></p>
	        			</td>
	        		</tr>
	        	</table>
	        	<button class="memberimage button"><?php _e( 'Upload Member Image', 'wdo-team-builder' ); ?></button>
	        	<span class="image">
	        		
	        	</span><br>
	        	<h4><?php _e( 'Members Infomation', 'wdo-team-builder' ); ?></h4>
	        	<hr>
				<table class="form-table">

					<tr>
						<td style="width:20%">
							<strong><?php _e( 'Name', 'wdo-team-builder' ); ?></strong>
						</td>
						<td style="width:30%">
							<input type="text" class="widefat membername form-control">
						</td>
						<td style="width:50%">
							<p class="description"><?php _e( 'Type name of member.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Job Title', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="widefat memberposition form-control">
						</td>
						<td>
							<p class="description"><?php _e( 'The job description,postion or fuction of this member.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Profile Link', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="widefat memberlink form-control">
						</td>
						<td>
							<p class="description"><?php _e( 'Give link to member profile.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Open Profile in New Tab', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="memberprofiletab form-control">
								<option value="_blank"><?php _e( 'Yes', 'wdo-team-builder' ); ?></option>
								<option value="_self"><?php _e( 'No', 'wdo-team-builder' ); ?></option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Choose want to open link in new tab or not.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<strong><?php _e( 'Style', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="memberstyle form-control">
								<option value="member-style1"><?php _e( 'Style 1', 'wdo-team-builder' ); ?></option>
								<option value="member-style2"><?php _e( 'Style 2', 'wdo-team-builder' ); ?></option>
								<option value="member-style3"><?php _e( 'Style 3', 'wdo-team-builder' ); ?></option>
								<option value="member-style4"><?php _e( 'Style 4', 'wdo-team-builder' ); ?></option>
								<option value="member-style5"><?php _e( 'Style 5', 'wdo-team-builder' ); ?></option>
								<option value="member-style6"><?php _e( 'Style 6', 'wdo-team-builder' ); ?></option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Member information will be aligned according to selected option.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Member Per Row', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="membergrid form-control">
							  <option value="12">1</option>
							  <option value="6">2</option>
							  <option value="4">3</option>
							  <option value="3">4</option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Select number of members you want to show per row.It should be kept same for everymember.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Member Alignment', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<select class="memberalign form-control">
								<option value="member-align-left"><?php _e( 'Left', 'wdo-team-builder' ); ?></option>
								<option value="member-align-center"><?php _e( 'Center', 'wdo-team-builder' ); ?></option>
								<option value="member-align-right"><?php _e( 'Right', 'wdo-team-builder' ); ?></option>
							</select>
						</td>
						<td>
							<p class="description"><?php _e( 'Member information will be aligned according to selected option.', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
					<!-- <tr>
	  					<td>
	  						<strong><?php _e( 'Colour Scheme', 'wdo-team-builder' ); ?></strong>
	  					</td>
	  					<td class="insert-picker">
	  						<input type="text" class="membercolorscheme" value="#AEAEAE">
	  					</td>
	  					<td>
	  						<p class="description"><?php _e( 'Select color scheme for member profile.', 'wdo-team-builder' ); ?>.</p>
	  					</td>
  					</tr> -->
				</table>
				<h4><?php _e( 'Social Profile Links', 'wdo-team-builder' ); ?></h4>
				<hr>
				<table class="form-table">
					<tr>
						<td style="width:20%">
							<strong><?php _e( 'Facebook', 'wdo-team-builder' ); ?></strong>
						</td>
						<td style="width:30%">
							<input type="text" class="form-control memberfacebook">
						</td>
						<td style="width:50%">
							<p class="description"><?php _e( 'Facebook profile complete link. Example: https://www.facebook.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Twitter', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="form-control membertwitter">
						</td>
						<td>
							<p class="description"><?php _e( 'Twitter profile complete link. Example: https://www.twitter.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'LinkedIn', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="form-control memberlinkedin">
						</td>
						<td>
							<p class="description"><?php _e( 'LinkedIn profile complete link. Example: https://www.linkedin.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<strong><?php _e( 'Google Plus', 'wdo-team-builder' ); ?></strong>
						</td>
						<td>
							<input type="text" class="form-control membergoogleplus">
						</td>
						<td>
							<p class="description"><?php _e( 'Google Plus profile complete link. Example: https://www.plus.google.com/profile_name', 'wdo-team-builder' ); ?></p>
						</td>
					</tr>
				</table><br>
				<hr>
				<button class="btn btn-danger btn-sm removeitem"> <?php _e( 'Remove Member', 'wdo-team-builder' ); ?> </button> 
				<span class="moreimages">
		    		<button class="btn btn-success btn-sm moreimg"> <i class="dashicons dashicons-businessman"></i> <?php _e( 'Add Member', 'wdo-team-builder' ); ?></button>
					<button class="btn btn-primary btn-sm addcat"><i class="dashicons dashicons-groups"></i> <?php _e( 'Add Team', 'wdo-team-builder' ); ?></button>
					<button class="btn btn-info btn-md fullshortcode pull-right" id="1"><i class="dashicons dashicons-editor-code"></i> <?php _e( 'Get Shortcode', 'wdo-team-builder' ); ?></button>
					<button class="btn btn-danger btn-block removecat pull-right"><?php _e( 'Remove Team', 'wdo-team-builder' ); ?></button>
	    		</span>
	        </div>
	    </div>
	    <?php } ?>
	</div>
	<hr>
	<button class="btn btn-primary btn-md save-meta pull-right"><?php _e( 'Save Settings', 'wdo-team-builder' ); ?></button></br>
	<span id="la-loader" class="pull-right"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>../images/ajax-loader.gif"></span>
	<span id="la-saved"><strong><?php _e( 'Changes Saved!', 'la-portfolio' ); ?></strong></span>
</div>