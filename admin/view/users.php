	

<a class="btn btn-primary mb-4 btn-sm" href="?subpage=add_user" role="button">Add New User</a>



<div class="table-responsive-md ">
  <table class="table table-sm text-center">
    <thead>
    <tr>
    	<th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">regdate</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th colspan="2" scope="col">action</th>
       <th scope="col"></th>
    </tr>
  </thead>
   <tbody>
	 		<!-- condition to chech session and query not empty -->
	 		<!-- loop for fetch data in table -->
	 		<?php if (isset($_SESSION['queryusers'])) {
	 			
	 			foreach ($_SESSION['queryusers'] as $value) {?>	
	    <tr>
	    	<td>
	       		<!-- start form checkbox to send data controller  -->
       			<form method="POST" action="controller/c_users.php" >
	       		<input type="checkbox" name="checkbox[]" value="<?= $value['UserID'] ;?>">  
	       		<input type="hidden" name="pagno" value="<?=$_GET['pagno']?>">   	
	      </td>
	      <th scope="row">
	      	<?= $value['UserID'] ;?>
	      		
	      	</th>
	      <td>
	      	<?= $value['UserName'] ;?>  		
	       </td>
	      <td>
	      	<?= $value['Email'] ;?>
	      		
	       </td>
	      <td>
	      	<?= $value['Date'] ;?>	      		
	       </td>
	      <td>
	      	<a class="btn btn-outline-info  btn-sm " href="controller/c_users.php?userid=<?= $value['UserID'] ;?>&role=<?= $value['Role']?>&pagno=<?=$_GET['pagno']?>" role="button">
	      	<?php 
	      		$role = $value['Role'] == 0 ? "user" : "Admin";
	      		echo $role; ?></a>
	       </td>
	      <td>
	      	<a class="btn btn-outline-info  btn-sm " href="controller/c_users.php?userid=<?= $value['UserID'] ;?>&regstatus=<?= $value['RegStatus']?>&pagno=<?=$_GET['pagno']?>" role="button">
	      		<?php 
	      			$status = $value['RegStatus'] == 0 ? "Hold" : "Active";
	     			 echo $status; ?></a>
	     		</td>
	      <td>
	      	<a class="btn btn-outline-info  btn-sm" href="controller/c_users.php?editid=<?= $value['UserID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Edit</a>
	     	 </td>
	      <td>
   			<a class="btn btn-outline-danger  btn-sm" href="controller/c_users.php?deleteid=<?= $value['UserID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Delete</a>
	       </td>
	    </tr>
	    <?php } }else{echo "no data";} ?>
   </tbody>
  </table>
  	<div>
  		<button type="submit" class="btn btn-danger btn-sm">Delete Selected</button>
   	</form>
   </div>
   	<!-- end form at checkbox  -->
   	<!-- start paggination -->
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
			</li>
			<?php if (isset($_SESSION['numpage'])) { 
					for ($i=1; $i <=$_SESSION['numpage'] ; $i++) { 
						
			?>
			<li class="page-item"><a class="page-link" href="controller/c_users.php?page=<?=$i?>"><?=$i?></a></li>
			<?php }}?>
			<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav>
				<!-- end paggination -->
</div>

