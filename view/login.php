					
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="controller/c_login.php" method="POST">
							<input type="text" placeholder="Name" name="username" />
							<input type="password" placeholder="Your Password " name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button name="submitlogin" type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<!-- send data by jquery after validate -->
						<form id="reset" action="controller/c_adddata.php" method="post">
							<input id="name" type="text" placeholder="username" name="username" onblur="checkuser(this.value,'username');" />
							<input id="email"  type="email" placeholder="Email Address" name="email" onblur="checkuser(this.value,'email');" />
							<input id="password" type="password" placeholder="Password" name="password" />
							<div class="validateajx" style="width: 80%"></div>
							<button id="register" type="button" value="register" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	
	

  
   