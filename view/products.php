
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>
						<div class="row flex">
						<?php 
						if (isset($_SESSION['all_products'])) {
							foreach ($_SESSION['all_products'] as $value) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="resources/images/home/<?=  $value['Image'] ?>" alt="" />
											<h2>$<?= $value['Price'] ?></h2>
											<p><?=  $value['Title'] ?></p>
											<a href="controller/c_displaydata.php?adsid=<?=  $value['AdsID'] ?>" class="btn btn-default add-to-cart">More Details</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?= $value['Price'] ?></h2>
												<p><?=  $value['Title'] ?></p>
												<a href="controller/c_displaydata.php?adsid=<?=  $value['AdsID'] ?>" class="btn btn-default add-to-cart">More Details</a>
											</div>
										</div>
								</div>
							</div>
						</div>
					<?php }}else{
							echo "<script>alert('No Data Found Try another Title');</script>";
							// echo " Not Found Data Search Again ";
							header("refresh:1 ; url= controller/c_displaydata.php?pro=all ");
					}?></div>
					</div>


						<ul class="pagination">

							<?php if (isset($_GET['paggin'])) {

									if ($_GET['paggin'] == "products") {
										
										 $len  = $_SESSION['numpage_product'] ;
										 $from = "pro=all"; 

									}elseif ($_GET['paggin'] == "cities") {
										 
										 $len  = $_SESSION['Numpage_Filter_City'] ;
										 $from = "pro_City={$_GET['data']}"; 

									}elseif ($_GET['paggin'] == "categories") {
										
										 $len  = $_SESSION['Numpage_Filter_Category'] ;
										 $from = "pro_Category={$_GET['data']}"; 

									}else{

										 $len  = 1 ;
										 $from = "pro=all"; 
									}

									for ($i=1; $i <= $len ; $i++) { 
						
							?>
							<!-- class="active" -->
							<li ><a href="controller/c_displaydata.php?<?=$from?>&page=<?=$i?>"><?=$i?></a></li>
							<?php }}?>
							<li><a href="">&raquo;</a></li>

						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
