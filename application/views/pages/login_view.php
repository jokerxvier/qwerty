<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>login/process" method="post" >
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<?php if(!is_null($alerts)){?>
						<p class="alert alert-warning"><?php echo $alerts ?></p>
				<?php }else {?>		
					<p>Please provide your details</p>
				<?php }?>
			
				
				<div class="field">
					<label for="admin_username">Username</label>
					<input type="text" id="admin_username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="admin_password">Password:</label>
					<input type="password" id="admin_password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button type="submit" class="button btn btn-success btn-large">Sign In</button>
				
			</div> <!-- .actions -->
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<div class="login-extra">
	<a href="#">Reset Password</a>
</div> <!-- /login-extra -->
