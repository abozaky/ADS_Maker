	<?php
			//  condition to recive data from controller display
		if (isset($_SESSION['Query_edit_Users'])) { 
			$row = $_SESSION['Query_edit_Users'] ;
	?>	
			<!-- form to add users by admin -->
	<div class="CForm">
		<form class="form-signin" method="post" action="controller/c_users.php">
		
		<h1 class="h3 mb-3 font-weight-normal text-center">Edit User</h1>
		<input type="hidden" name="userid" value="<?= $row[0]['UserID']; ?>">
   		<input type="hidden" name="pagno" value="<?= $_GET['pagno'] ?>">

		<input class="inajx form-control" type="text" name="username"  placeholder="Username" value="<?= $row[0]['UserName']; ?>">
		<h6 class="ajx font-italic text-warning bg-lite"></h6>
		
		<input class="form-control" type="email" name="email"  placeholder="Email" required value="<?= $row[0]['Email']; ?>">

		<input class="form-control" type="password" name="password"  placeholder="Password" required value="<?= $row[0]['Password']; ?>">

		<button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="edituser">Submit</button>
		
		<p class="mt-5 mb-3 text-muted text-center">© 2019-2020</p>
		</form>
	</div> 

<?php }?>