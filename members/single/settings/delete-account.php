<?php

/**
 * BuddyPress Delete Account
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
?>

<?php global $firmasite_settings;
get_header( 'buddypress' ); ?>

	<div id="primary" class="content-area <?php echo $firmasite_settings["layout_primary_class"]; ?>">
		<div class="padder">

			<?php do_action( 'bp_before_member_settings_template' ); ?>

			<div id="item-header" class="well well-sm media clearfix">

				<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

			</div><!-- #item-header -->

			<div id="item-nav" class="navbar <?php if (isset($firmasite_settings["menu-style"]) && "alternative" == $firmasite_settings["menu-style"]){ echo " navbar-default";} else { echo "  navbar-inverse"; } ?>">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bp-profile-nav-collapse">
                      <i class="icon-bar"></i>
                      <i class="icon-bar"></i>
                      <i class="icon-bar"></i>
                    </button>
                </div>
				<div class="collapse navbar-collapse bp-profile-nav-collapse item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul class="nav navbar-nav">

						<?php bp_get_displayed_user_nav(); ?>

						<?php do_action( 'bp_member_options_nav' ); ?>

					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>

				<div class="item-list-tabs tabs-top no-ajax" id="subnav">
					<ul class="nav nav-tabs">

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_member_plugin_options_nav' ); ?>

					</ul>
				</div><!-- .item-list-tabs -->

				<div class="modal firmasite-modal-static"><div class="modal-dialog"><div class="modal-content"><div class="modal-body">

				<h3 ><?php _e( 'Delete Account', 'firmasite' ); ?></h3>

				<div class="clearfix"></div><div id="message" class="info alert alert-info">
					
					<?php if ( bp_is_my_profile() ) : ?>

						<p><?php _e( 'Deleting your account will delete all of the content you have created. It will be completely irrecoverable.', 'firmasite' ); ?></p>
						
					<?php else : ?>

						<p><?php _e( 'Deleting this account will delete all of the content it has created. It will be completely irrecoverable.', 'firmasite' ); ?></p>

					<?php endif; ?>

				</div>

				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/delete-account'; ?>" name="account-delete-form" id="account-delete-form" class="standard-form" method="post">

					<?php do_action( 'bp_members_delete_account_before_submit' ); ?>

					<label>
						<input type="checkbox" name="delete-account-understand" id="delete-account-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-account-button').disabled = ''; } else { document.getElementById('delete-account-button').disabled = 'disabled'; }" />
						 <?php _e( 'I understand the consequences.', 'firmasite' ); ?>
					</label>

					<div class="submit">
						<input type="submit" class="btn  btn-primary" disabled="disabled" value="<?php _e( 'Delete Account', 'firmasite' ); ?>" id="delete-account-button" name="delete-account-button" />
					</div>

					<?php do_action( 'bp_members_delete_account_after_submit' ); ?>

					<?php wp_nonce_field( 'delete-account' ); ?>

				</form>
                
                </div></div></div></div>

				<?php do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_settings_template' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

<?php get_sidebar( 'buddypress' ); ?>

<?php get_footer( 'buddypress' ); ?>