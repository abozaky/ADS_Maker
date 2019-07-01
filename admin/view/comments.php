	


<div class="table-responsive-md ">
  <table class="table table-sm text-center">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">CommentDetails</th>
      <th scope="col">UserName</th>
      <th scope="col">AdName</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
   <tbody>
	 		<!-- condition to chech session and query not empty -->
	 		<!-- loop for fetch data in table -->
	 		<?php if (isset($_SESSION['querycomments'])) {
	 			
	 			foreach ($_SESSION['querycomments'] as $value) {?>	
	    <tr>
	    	<td>
	       		<!-- start form checkbox to send data controller  -->
       			<form method="POST" action="controller/c_commentscrud.php" >
	       		<input type="checkbox" name="checkbox[]" value="<?= $value['commentID'] ;?>">     	
	      </td>
	      <th scope="row">
	      	<?= $value['commentID'] ;?>
	      		
	      	</th>
	      <td>
	      	<?= $value['Details'] ;?>  		
	       </td>
	      <td>
	      	<?= $value['UserName'] ;?>
	      		
	       </td>
	      <td>
	      	<?= $value['Title'] ;?>	      		
	       </td>
	       <td>
	      	<?= $value['Date'] ;?>	      		
	       </td>
	      <td>
	      	<a class="btn btn-outline-info  btn-sm " href="controller/c_commentscrud.php?commentid=<?= $value['commentID']?>&pagno=<?=$_GET['pagno']?>&comstatus=<?= $value['Status']?>" role="button">
	      		<?php 
	      			$status = $value['Status'] == 0 ? "Pending" : "publish";
	     			 echo $status; ?></a>
	       </td>
	      <td>
   			<a class="btn btn-outline-danger  btn-sm" href="controller/c_commentscrud.php?deleteid=<?= $value['commentID'] ;?>&pagno=<?=$_GET['pagno']?>" role="button">Delete</a>
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
			<li class="page-item"><a class="page-link" href="controller/c_commentscrud.php?page=<?=$i?>"><?=$i?></a></li>
			<?php }}?>
			<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav>
				<!-- end paggination -->
</div>

