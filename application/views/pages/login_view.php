<<<<<<< HEAD
<form class="form-signin" action="<?php echo base_url();?>login/process" method="post">
  <h2 class="form-signin-heading">Please sign in</h2>
  <input type="text" class="form-control" placeholder="Email address" autofocus="" name="username">
  <input type="password" class="form-control" placeholder="Password" name="password">
=======
<!--<form class="form-signin">
  <h2 class="form-signin-heading">Administrator Login</h2>
  <p>Please provide your details</p>
  <input type="text" class="form-control" placeholder="Email address" autofocus="">
  <input type="password" class="form-control" placeholder="Password">
>>>>>>> new login page form template
  <label class="checkbox">
    <input type="checkbox" value="remember-me"> Remember me
  </label>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form> -->

<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="#" method="post">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label for="admin_username">Username</label>
					<input type="text" id="admin_username" name="admin_username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="admin_password">Password:</label>
					<input type="password" id="admin_password" name="admin_password" value="" placeholder="Password" class="login password-field"/>
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
