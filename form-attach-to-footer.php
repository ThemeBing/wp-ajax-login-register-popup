<?php
function yourname_login_register_modal() {

		// only show the registration/login form to non-logged-in members
	if( ! is_user_logged_in() ){ 
?>
		<div class="modal fade yourname-user-modal" id="yourname-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" data-active-tab="">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php

							if( get_option('users_can_register') ){ ?>

								<!-- Register form -->
								<div class="yourname-register">
							 
									<h3><?php printf( __('Join %s', 'yourname'), get_bloginfo('name') ); ?></h3>
									<hr>

									<form id="yourname_registration_form" action="<?php echo home_url( '/' ); ?>" method="POST">

										<div class="form-field">
											<label><?php _e('Username', 'yourname'); ?></label>
											<input class="form-control input-lg required" name="yourname_user_login" type="text"/>
										</div>
										<div class="form-field">
											<label for="yourname_user_email"><?php _e('Email', 'yourname'); ?></label>
											<input class="form-control input-lg required" name="yourname_user_email" id="yourname_user_email" type="email"/>
										</div>

										<div class="form-field">
											<input type="hidden" name="action" value="yourname_register_member"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'yourname') ?>" type="submit"><?php _e('Sign up', 'yourname'); ?></button>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
									</form>
									<div class="yourname-errors"></div>
								</div>

								<!-- Login form -->
								<div class="yourname-login">
							 
									<h3><?php printf( __('Login to %s', 'yourname'), get_bloginfo('name') ); ?></h3>
									<hr>
							 
									<form id="yourname_login_form" action="<?php echo home_url( '/' ); ?>" method="post">

										<div class="form-field">
											<label><?php _e('Username', 'yourname') ?></label>
											<input class="form-control input-lg required" name="yourname_user_login" type="text"/>
										</div>
										<div class="form-field">
											<label for="yourname_user_pass"><?php _e('Password', 'yourname')?></label>
											<input class="form-control input-lg required" name="yourname_user_pass" id="yourname_user_pass" type="password"/>
										</div>
										<div class="form-field">
											<input type="hidden" name="action" value="yourname_login_member"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'yourname') ?>" type="submit"><?php _e('Login', 'yourname'); ?></button> <a class="alignright" href="#yourname-reset-password"><?php _e('Lost Password?', 'yourname') ?></a>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
									</form>
									<div class="yourname-errors"></div>
								</div>

								<div class="yourname-loading">
									<p><i class="fa fa-refresh fa-spin"></i><br><?php _e('Loading...', 'yourname') ?></p>
								</div><?php

							} else {
								echo '<h3>'.__('Login access is disabled', 'yourname').'</h3>';
							} ?>
					</div>
					<div class="modal-footer">
							<span class="yourname-register-footer"><?php _e('Don\'t have an account?', 'yourname'); ?> <a href="#yourname-register"><?php _e('Sign Up', 'yourname'); ?></a></span>
							<span class="yourname-login-footer"><?php _e('Already have an account?', 'yourname'); ?> <a href="#yourname-login"><?php _e('Login', 'yourname'); ?></a></span>
					</div>				
				</div>
			</div>
		</div>
<?php
	}
}
add_action('wp_footer', 'yourname_login_register_modal');