
		<!--slider-->
	<!-- <section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="resources/images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="resources/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="resources/images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="resources/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="resources/images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="resources/images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section> -->
		<!--/slider-->
		
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php 
						if (isset($_SESSION['feature_data'])) {
							foreach ($_SESSION['feature_data'] as $value) {
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
					<?php }}else{echo "No Data Now";}?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
		<!-- /content -->