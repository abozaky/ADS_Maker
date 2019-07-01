	
			<!-- form to add users by admin -->
	<div class="CForm">
		<form class="form-signin" method="post" action="controller/c_users.php">
		
		<h1 class="h3 mb-3 font-weight-normal text-center">Add user</h1>
		
		<input class="inajx form-control" type="text" name="username"  placeholder="Username">
		<h6 class="ajx font-italic text-warning bg-lite"></h6>
		
		<input class="form-control" type="email" name="email"  placeholder="Email" required>

		<input class="form-control" type="password" name="password"  placeholder="Password" required>

		<button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="adduser">Submit</button>
		
		<p class="mt-5 mb-3 text-muted text-center">© 2019-2020</p>
		</form>
	</div> 