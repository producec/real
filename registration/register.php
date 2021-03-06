<?php global $firmasite_settings;
get_header( 'buddypress' ); ?>

	<div id="primary" class="content-area <?php echo $firmasite_settings["layout_primary_class"]; ?>">
		<div class="padder">

		<?php do_action( 'open_content' ); ?>
        <?php do_action( 'open_page' ); ?>
		<?php do_action( 'bp_before_register_page' ); ?>

     <div class="panel panel-default">
       <div class="panel-body">
		<div class="page" id="register-page">

			<form action="" name="signup_form" id="signup_form" class="standard-form form-horizontal" method="post" enctype="multipart/form-data">

			<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
				<?php do_action( 'template_notices' ); ?>
				<?php do_action( 'bp_before_registration_disabled' ); ?>

					<p><?php _e( 'User registration is currently not allowed.', 'firmasite' ); ?></p>

				<?php do_action( 'bp_after_registration_disabled' ); ?>
			<?php endif; // registration-disabled signup setp ?>

			<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

				<h2><?php _e( 'Create an Account', 'firmasite' ); ?></h2>

				<?php do_action( 'template_notices' ); ?>

				<p><?php _e( 'Registering for this site is easy, just fill in the fields below and we\'ll get a new account set up for you in no time.', 'firmasite' ); ?></p>

				<?php do_action( 'bp_before_account_details_fields' ); ?>

				<div class="register-section" id="basic-details-section">

					<?php /***** Basic Account Details ******/ ?>

					<h4 class="page-header"><?php _e( 'Account Details', 'firmasite' ); ?></h4>

                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="signup_username"><?php _e( 'Username', 'firmasite' ); ?> <?php _e( '(required)', 'firmasite' ); ?></label>
                        <div class="col-xs-12 col-md-9">
                            <?php do_action( 'bp_signup_username_errors' ); ?>
                            <input type="text" class="form-control" name="signup_username" id="signup_username" value="<?php bp_signup_username_value(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="signup_email"><?php _e( 'Email Address', 'firmasite' ); ?> <?php _e( '(required)', 'firmasite' ); ?></label>
                        <div class="col-xs-12 col-md-9">
                            <?php do_action( 'bp_signup_email_errors' ); ?>
                            <input type="text" class="form-control" name="signup_email" id="signup_email" value="<?php bp_signup_email_value(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="signup_password"><?php _e( 'Choose a Password', 'firmasite' ); ?> <?php _e( '(required)', 'firmasite' ); ?></label>
                        <div class="col-xs-12 col-md-9">
                            <?php do_action( 'bp_signup_password_errors' ); ?>
                            <input type="password" class="form-control" name="signup_password" id="signup_password" value="" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="signup_password_confirm"><?php _e( 'Confirm Password', 'firmasite' ); ?> <?php _e( '(required)', 'firmasite' ); ?></label>
                        <div class="col-xs-12 col-md-9">
                            <?php do_action( 'bp_signup_password_confirm_errors' ); ?>
                            <input type="password" class="form-control" name="signup_password_confirm" id="signup_password_confirm" value="" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>/>
                        </div>
                    </div>

				</div><!-- #basic-details-section -->

				<?php do_action( 'bp_after_account_details_fields' ); ?>

				<?php /***** Extra Profile Details ******/ ?>

				<?php if ( bp_is_active( 'xprofile' ) ) : ?>

					<?php do_action( 'bp_before_signup_profile_fields' ); ?>

					<div class="register-section" id="profile-details-section">

						<h4 class="page-header"><?php _e( 'Profile Details', 'firmasite' ); ?></h4>

						<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
						<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( 'profile_group_id=1' ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<div class="editfield">

								<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>
                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-md-3" for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9">
                                            <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
                                            <input type="text" class="form-control" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" value="<?php bp_the_profile_field_edit_value(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>/>
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                
                                <?php if ( 'textarea' == bp_get_the_profile_field_type() ) : ?>
                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-md-3" for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9">
                                            <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
											<?php echo firmasite_wp_editor(bp_get_the_profile_field_edit_value(), bp_get_the_profile_field_input_name(), bp_get_the_profile_field_input_name()); ?>
                                            <?php /*<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>><?php bp_the_profile_field_edit_value(); ?></textarea>*/ ?> 
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                
                                <?php if ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>
                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-md-3" for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9">
                                            <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
                                            <select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>>
                                                <?php bp_the_profile_field_options(); ?>
                                            </select>
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                
                                <?php endif; ?>
                
                                <?php if ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>
                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-md-3" for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9">
                                            <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
                                            <select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" multiple="multiple" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>>
                        
                                                <?php bp_the_profile_field_options(); ?>
                        
                                            </select>
                        
                                            <?php if ( !bp_get_the_profile_field_is_required() ) : ?>
                        
                                                <a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name(); ?>' );"><?php _e( 'Clear', 'firmasite' ); ?></a>
                        
                                            <?php endif; ?>
                                            
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                
                                <?php endif; ?>
                
                                <?php if ( 'radio' == bp_get_the_profile_field_type() ) : ?>
                
                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-md-3"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9">
                                            <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
											<?php bp_the_profile_field_options(); ?>
                    
                                            <?php if ( !bp_get_the_profile_field_is_required() ) : ?>
                    
                                                <a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name(); ?>' );"><?php _e( 'Clear', 'firmasite' ); ?></a>
                    
                                            <?php endif; ?>
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                
                                <?php endif; ?>
                
                                <?php if ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>
                
                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-md-3"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9">
                                            <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
                                            <?php bp_the_profile_field_options(); ?>
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                
                                <?php endif; ?>
                
                                <?php if ( 'datebox' == bp_get_the_profile_field_type() ) : ?>
                                    <div class="form-group datebox">
                                        <label class="control-label col-xs-12 col-md-3" for="<?php bp_the_profile_field_input_name(); ?>_day"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'firmasite' ); ?><?php endif; ?></label>
                                        <div class="col-xs-12 col-md-9 form-inline">
                                        <?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ); ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <select name="<?php bp_the_profile_field_input_name(); ?>_day" id="<?php bp_the_profile_field_input_name(); ?>_day" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>>
                    
                                                <?php bp_the_profile_field_options( 'type=day' ); ?>
                    
                                            </select>
                                            </div>
                                            <div class="col-md-4">
                                            <select name="<?php bp_the_profile_field_input_name(); ?>_month" id="<?php bp_the_profile_field_input_name(); ?>_month" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>>
                    
                                                <?php bp_the_profile_field_options( 'type=month' ); ?>
                    
                                            </select>
                                            </div>
                                            <div class="col-md-4">
                                            <select name="<?php bp_the_profile_field_input_name(); ?>_year" id="<?php bp_the_profile_field_input_name(); ?>_year" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true"<?php endif; ?>>
                    
                                                <?php bp_the_profile_field_options( 'type=year' ); ?>
                    
                                            </select>
                                            </div>
                                       </div>
                                            <?php firmasite_profile_field_custom_change_field_visibility(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                
							</div>

						<?php endwhile; ?>

						<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_group_field_ids(); ?>" />

						<?php endwhile; endif; endif; ?>

					</div><!-- #profile-details-section -->

					<?php do_action( 'bp_after_signup_profile_fields' ); ?>

				<?php endif; ?>

				<?php if ( bp_get_blog_signup_allowed() ) : ?>

					<?php do_action( 'bp_before_blog_details_fields' ); ?>

					<?php /***** Blog Creation Details ******/ ?>

					<div class="register-section" id="blog-details-section">

						<h4 class="page-header"><?php _e( 'Blog Details', 'firmasite' ); ?></h4>

						<p><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'firmasite' ); ?></p>

						<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

							<label for="signup_blog_url"><?php _e( 'Blog URL', 'firmasite' ); ?> <?php _e( '(required)', 'firmasite' ); ?></label>
							<?php do_action( 'bp_signup_blog_url_errors' ); ?>

							<?php if ( is_subdomain_install() ) : ?>
								http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" /> .<?php bp_blogs_subdomain_base(); ?>
							<?php else : ?>
								<?php echo site_url(); ?>/ <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" />
							<?php endif; ?>

							<label for="signup_blog_title"><?php _e( 'Site Title', 'firmasite' ); ?> <?php _e( '(required)', 'firmasite' ); ?></label>
							<?php do_action( 'bp_signup_blog_title_errors' ); ?>
							<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value(); ?>" />

							<span class=""><?php _e( 'I would like my site to appear in search engines, and in public listings around this network.', 'firmasite' ); ?>:</span>
							<?php do_action( 'bp_signup_blog_privacy_errors' ); ?>

							<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'firmasite' ); ?></label>
							<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'firmasite' ); ?></label>

						</div>

					</div><!-- #blog-details-section -->

					<?php do_action( 'bp_after_blog_details_fields' ); ?>

				<?php endif; ?>

				<?php do_action( 'bp_before_registration_submit_buttons' ); ?>

				<div class="submit">
					<input type="submit" class="btn  btn-primary" name="signup_submit" id="signup_submit" value="<?php _e( 'Complete Sign Up', 'firmasite' ); ?>" />
				</div>

				<?php do_action( 'bp_after_registration_submit_buttons' ); ?>

				<?php wp_nonce_field( 'bp_new_signup' ); ?>

			<?php endif; // request-details signup step ?>

			<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

				<h2><?php _e( 'Sign Up Complete!', 'firmasite' ); ?></h2>

				<?php do_action( 'template_notices' ); ?>
				<?php do_action( 'bp_before_registration_confirmed' ); ?>

				<?php if ( bp_registration_needs_activation() ) : ?>
					<p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'firmasite' ); ?></p>
				<?php else : ?>
					<p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'firmasite' ); ?></p>
				<?php endif; ?>

				<?php do_action( 'bp_after_registration_confirmed' ); ?>

			<?php endif; // completed-confirmation signup step ?>

			<?php do_action( 'bp_custom_signup_steps' ); ?>

			</form>

		</div>
       </div>
     </div>

		<?php do_action( 'bp_after_register_page' ); ?>
		<?php do_action( 'close_page' ); ?>
        <?php do_action( 'close_content' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php get_sidebar( 'buddypress' ); ?>

	<script type="text/javascript">
		jQuery(document).ready( function() {
			if ( jQuery('div#blog-details').length && !jQuery('div#blog-details').hasClass('show') )
				jQuery('div#blog-details').toggle();

			jQuery( 'input#signup_with_blog' ).click( function() {
				jQuery('div#blog-details').fadeOut().toggle();
			});
		});
	</script>

<?php get_footer( 'buddypress' ); ?>