	     	
			<!-- form to add users by admin -->
	<div class="CForm">
            <form class="form-signin" action="controller/c_advertismentscrud.php" method="post" enctype="multipart/form-data">

               <h1 class="h3 mb-3 font-weight-normal text-center">Add New ADS</h1>
               <label class="Text-blue" >Title</label>
               <input class="form-control" type="text" name="Title"  placeholder="Name of Ads" >

               <label class="Text-blue" >Details</label>
               <input class="form-control" type="text" name="Details"  placeholder="Description of Ads" >

               <label class="Text-blue" >Price</label>
               <input class="form-control" type="text" name="price"  placeholder="Price of Ads" >

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text" for="inputGroupSelect01">Place Of Ads</label>
                  </div>
                  <select class="custom-select" name="city" >
                     <option value="Choose" selected>Choose</option>
                     <option value="Cairo">Cairo</option>
                     <option value="Giza">Giza</option>
                     <option value="Alex">Alex</option>
                     <option value="Assiut">Assiut</option>
                  </select>
               </div>

               <div class="form-group">
					<label class="Text-blue" for="exampleFormControlFile1">Select AD Picture</label>
					<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
				</div>

               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text" for="inputGroupSelect01">Status</label>
                  </div>
                  <select class="custom-select" name="CondiStatus" >
                     <option value="Choose" selected>Choose</option>
                     <option value="New">New</option>
                     <option value="Used">Used</option>
                     <option value="Like New">Like New</option>
                  </select>
               </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text" for="inputGroupSelect01">Availability</label>
                  </div>
                  <select class="custom-select" name="Availability" >
                     <option value="Choose" selected>Choose</option>
                     <option value="In stock">In stock</option>
                     <option value="last ten pieces">last ten pieces</option>
                     <option value="Last piece">Last piece</option>
                  </select>
               </div>


               <div class="input-group mb-3">
	               <div class="input-group-prepend">
	                  <label class="input-group-text" for="inputGroupSelect01">Users</label>
	               </div>
	               <select class="custom-select" name="UserID" >
	               	<?php if (isset($_SESSION['user_select_ads'])) {
		 			
		 				foreach ($_SESSION['user_select_ads'] as $value) {?>	

	                	 <option value="<?= $value['UserID']?>" selected><?= $value['UserName']?></option>    
	                
	                 <?php }}?>
	               
	               </select>
          	  </div>

               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text" for="inputGroupSelect01">CategoryName</label>
                  </div>
                  <select class="custom-select" name="CategoryID" >
                    <?php if (isset($_SESSION['category_select_ads'])) {
	 			
	 				foreach ($_SESSION['category_select_ads'] as $value) {?>	

                	 <option value="<?= $value['CategoryID']?>" selected><?= $value['CategoryName']?></option>    
                
                 <?php }}?>
                     
                  </select>
               </div>

				

               <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="addads">Add ADS</button>
              
            </form>
         </div> 