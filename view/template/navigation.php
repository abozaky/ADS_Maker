<header id="header"><!--header-->
		<div class="header-middle"><!--header-up-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="resources/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php if (!isset($_SESSION['username'])): ?>	
								<li><a href="index.php?mainpage=login"><i class="fa fa-lock"></i> Login</a></li>
								<?php else: ?>
								<li><a href="">Welcome : <?=$_SESSION['username']?></a></li>
								<li><a href="view/logout.php"><i class="fa fa-lock"></i> Logout</a></li>
								<?php endif; ?>
								<li><a href="http://localhost/ads_maker/admin/dashboard.php"><i class="fa fa-lock"></i> Dashboard</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-up-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="controller/c_displaydata.php" class="active">Home</a></li>
								<li><a href="controller/c_displaydata.php?pro=all&page=">Products</a></li>
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="contact-us.html">Contact</a></li>
								<li><a href="index.php?mainpage=add_new_advertisment">Add New ADS</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="search_box pull-right">
							<form class="form-inline mt-2 mt-md-0" method="post" action="controller/c_displaydata.php">
        					   <input class="form-control mr-sm-2" type="text" placeholder="Search By Title " aria-label="Search" name="Search_by_title">
        						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="search" name="submit">Search</button>
     						 </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<!-- content -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categories</h2>
						<div class="panel-group category-products" id="accordian"><!--category-ADS-->
							<?php
								if (isset($_SESSION['category_data'])):
									foreach ($_SESSION['category_data'] as $value):
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="controller/c_displaydata.php?pro_Category=<?= $value['CategoryName']?>"><?= $value['CategoryName']?></a></h4>
								</div>
							</div>
							<?php
								endforeach;
									else: echo "Not Found Any Categories";
								endif;
							?>
							
						</div><!--/category-ADS-->
						<h2>Cities</h2>
						<div class="panel-group category-products" id="accordian"><!--Cities-ADS-->
							<?php
								if (isset($_SESSION['city_data'])):
									foreach ($_SESSION['city_data'] as $value):
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="controller/c_displaydata.php?pro_City=<?= $value['City']?>&page="><?= $value['City']?></a></h4>
								</div>
							</div>
							<?php
								endforeach;
									else: echo "Not Found Any Cities";
								endif;
							?>

						</div><!--/Cities-ADS-->
					</div>
				</div>
	