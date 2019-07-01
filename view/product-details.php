
	
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<?php if (isset($_SESSION['product_details_data'])) { 
								foreach ($_SESSION['product_details_data'] as $value) {
							?>
						<div class="col-sm-5">
							<div class="view-product">
								<img src="resources/images/home/<?=  $value['Image'] ?>" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="resources/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?= $value['Title'] ?></h2>
								<p><?= $value['Details'] ?></p>
								
								<span>
									<span><?= $value['Price'] ?>$</span>
								</span>
								<p><b>Availability:</b><?= $value['Availability'] ?></p>
								<p><b>Condition:</b> <?= $value['ConditionStatus'] ?></p>
								<p><b>Category:</b> <?= $value['CategoryName'] ?></p>
								<p><b>Ad-City:</b> <?= $value['City'] ?></p>
								<p><b>Ad-Owner:</b> <?= $value['UserName'] ?></p>
								<p><b>Ad-Date:</b> <?= $value['Date'] ?></p>
							</div><!--/product-information-->
						</div>
						<?php }}?>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-comment-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active" ><a href="#reviews" data-toggle="tab">Contact Me</a></li>
							</ul>
						</div>
						<div class="tab-content">		
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php if (isset($_SESSION['product_comment_data'])):
										foreach ($_SESSION['product_comment_data'] as $value):
									 ?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?=$value['UserName']?></a></li>
										
										<li><a href=""><i class="fa fa-calendar-o"></i><?=$value['Date']?></a></li>
									</ul>
									<p><?=$value['Details']?></p>
								<?php endforeach; 
									  else: echo "Not Found Comment at this ad";
									  endif;
								?>

									<h4><p><b>Write Your Comment</b></p></h4>
									
									<form method="post" action="controller/c_adddata.php">
										<input type="hidden" name="UsserID" value="<?=$_SESSION['user_id']?>">
										<input type="hidden" name="AdssID" value="<?php echo $_SESSION['product_details_data'][0]['AdsID'] ?>">
										<textarea name="Details" ></textarea>
										<button name="submit" type="submit" value="addcomment" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
						</div>
					</div><!--/category-tab-comment-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php if(isset($_SESSION['product_recommend_data_active'])):
											foreach($_SESSION['product_recommend_data_active'] as $value):
									 ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="resources/images/home/<?=$value['Image']?>" alt="" />
													<h2><?=$value['Price']?>$</h2>
													<p><?=$value['Title']?></p>
													<a href="controller/c_displaydata.php?adsid=<?=  $value['AdsID'] ?>" class="btn btn-default add-to-cart">More Details</a>
												</div>
											</div>
										</div>
									</div>
									<?php
											endforeach;
										  endif;
									?>
									
								</div>
								<div class="item">	
									<?php if(isset($_SESSION['product_recommend_data_item'])):
											foreach($_SESSION['product_recommend_data_item'] as $value):
									 ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="resources/images/home/<?=$value['Image']?>" alt="" />
													<h2><?=$value['Price']?>$</h2>
													<p><?=$value['Title']?></p>
													<a href="controller/c_displaydata.php?adsid=<?=  $value['AdsID'] ?>" class="btn btn-default add-to-cart">More Details</a>
												</div>
											</div>
										</div>
									</div>
									<?php
											endforeach;
										  endif;
									?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->	
				</div>
			</div>
		</div>
	</section>
	
	