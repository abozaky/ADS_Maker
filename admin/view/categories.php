
<div>
	<button type="button" class="btn btn-primary btn-sm mb-3 btn-category" data-toggle="button" aria-pressed="false" autocomplete="off">
	Add New Category
	</button>
	<div class="mb-3" id="from">
		<form class="form-inline" method="post" action="controller/c_categoriescrud.php">
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" class="form-control" name="CategoryName" placeholder="Category Name">
			</div>
			<button type="submit" name="submit" value="addcat" class="btn btn-success mb-2 btn-sm" >Submit</button>
		</form>
	</div> 
</div>

<div class="table-responsive-md ">
  <table class="table table-sm text-center">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CatID</th>
      <th scope="col">CatName</th>
      <th scope="col">Date</th>
      <th scope="col">action</th>
    </tr>
  </thead>
   <tbody>
	 		<!-- condition to chech session and query not empty -->
	 		<!-- loop for fetch data in table -->
	 		<?php if (isset($_SESSION['query_categories'])) {
	 			
	 			foreach ($_SESSION['query_categories'] as $value) {?>	
	    <tr>
	    	<td>
	       		<!-- start form checkbox to send data controller  -->
       			<form method="POST" action="controller/c_categoriescrud.php" >
	       		<input type="checkbox" name="checkbox[]" value="<?= $value['CategoryID'] ;?>">     	
	      </td>
	      <th scope="row">
	      	<?= $value['CategoryID'] ;?>
	      		
	      	</th>
	      <td>
	      	<?= $value['CategoryName'] ;?>  		
	       </td>
	       <td>
	      	<?= $value['Date'] ;?>  		
	       </td>
	       <td>
	      		<a class="btn btn-outline-info  btn-sm" href="controller/c_categoriescrud.php?editid=<?= $value['CategoryID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Edit</a> 
	      		<a class="btn btn-outline-danger  btn-sm" href="controller/c_categoriescrud.php?deleteid=<?= $value['CategoryID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Delete</a>
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
			<li class="page-item"><a class="page-link" href="controller/c_categoriescrud.php?page=<?=$i?>"><?=$i?></a></li>
			<?php }}?>
			<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav>
				<!-- end paggination --> 
  