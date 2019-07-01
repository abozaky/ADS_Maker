	<?php
			//  condition to recive data from controller c_advertism
		if (isset($_SESSION['Query_edit_cat'])) { 
			$row = $_SESSION['Query_edit_cat'] ;			
		}
	 ?>	
			<!-- form to add users by admin -->
	<div class="CForm">
		<form class="form-signin" method="post" action="controller/c_categoriescrud.php">
		<input type="hidden" name="catID" value="<?= $row[0]['CategoryID'] ?>">
   		<input type="hidden" name="pagno" value="<?= $_GET['pagno'] ?>">

		<input class=" form-control" type="text" value="<?= $row[0]['CategoryName'] ?>" name="CategoryName"  placeholder="CategoryName">
		
		<button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="editcat">Submit</button>
		
		<p class="mt-5 mb-3 text-muted text-center">© 2019-2020</p>
		</form>
	</div> 