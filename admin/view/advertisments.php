

<a class="btn btn-primary mb-4 btn-sm" href="?subpage=add_ads" role="button">Add New ADS</a>

<div class="table-responsive-md ">
  <table class="table table-sm text-center">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">AdsID</th>
      <th scope="col">CatName</th>
      <th scope="col">ByUser</th>
      <th scope="col">Title</th>
      <th scope="col">Details</th>
	  <th scope="col">Price</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th colspan="2" scope="col">action</th>

    </tr>
  </thead>
   <tbody>
	 		<!-- condition to chech session and query not empty -->
	 		<!-- loop for fetch data in table -->
	 		<?php if (isset($_SESSION['query'])) {
	 			
	 			foreach ($_SESSION['query'] as $value) {?>	
	    <tr>
	    	<td>
	       		<!-- start form checkbox to send data controller  -->
       			<form method="POST" action="controller/c_advertismentscrud.php" >
	       		<input type="checkbox" name="checkbox[]" value="<?= $value['AdsID'] ;?>">     	
	      </td>
	      <th scope="row">
	      	<?= $value['AdsID'] ;?>
	      		
	      	</th>
	      <td>
	      	<?= $value['CategoryName'] ;?>  		
	       </td>
	      <td>
	      	<?= $value['UserName'] ;?>
	      		
	       </td>
	      <td>
	      	<?= $value['Title'] ;?>	      		
	       </td>
	       <td>
	      	<?= $value['Details'] ;?>	      		
	       </td>
	       <td>
	      	<?= $value['Price'] ;?>$	      		
	       </td>
	       <td>
	      	<?= $value['Date'] ;?>      		
	       </td>
	      <td>
	      	<a class="btn btn-outline-info  btn-sm " href="controller/c_advertismentscrud.php?adsid=<?= $value['AdsID'] ;?>&adsstatus=<?= $value['Status']?>&pagno=<?=$_GET['pagno']?>" role="button">
	      	<?php 
	      		$status = $value['Status'] == 0 ? "Hold" : "Active";
	      		echo $status; ?></a>
	       </td>
	       <td>
	      	<a class="btn btn-outline-info  btn-sm" href="controller/c_advertismentscrud.php?editid=<?= $value['AdsID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Edit</a>
	     	 </td>
	      <td>
   			<a class="btn btn-outline-danger  btn-sm" href="controller/c_advertismentscrud.php?deleteid=<?= $value['AdsID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Delete</a>
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
					for ($i=1; $i <= $_SESSION['numpage'] ; $i++) { 
						
			?>
			<li class="page-item"><a class="page-link" href="controller/c_advertismentscrud.php?page=<?=$i?>"><?=$i?></a></li>
			<?php }}?>
			<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav>
				<!-- end paggination --> 
  