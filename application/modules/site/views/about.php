		<?php
		$mission = $vision = $county = $project = " ";
		$county_image = $project_image = base_url()."assets/images/lock1.png";

		if($about_query->num_rows() > 0)
		{
			foreach($about_query->result() as $res)
			{
				$post_title = $res->post_title;
				if($post_title == "Mission")
				{
					$mission = $res->post_description;
				}
				else if($post_title == "Vision")
				{
					$vision = $res->post_description;
				}
				else if($post_title == "About Laikipia County")
				{
					$county = $res->post_description;
					if(!empty($res->post_image_name))
					{
						$county_image = base_url()."assets/uploads/".$res->post_image_name;
					}
				}
				else if($post_title == "About The Project")
				{
					$project = $res->post_description;
					if(!empty($res->post_image_name))
					{
						$project_image = base_url()."assets/uploads/".$res->post_image_name;
					}
				}
			}
		}
		?>
		
		<!-- Page Header -->
		<section class="page-header" style="background-image: url('<?php echo base_url();?>assets/themes/website/assets/img/classroom.JPG')">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 text-center">
						<div class="section-title">
							<h2 class="text-uppercase">About <span class="text-theme">Us</span></h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Page Header -->
		<section class="thumbnails">
			<div class="container">
				<ul class="list-inline">
					<li><a href="<?php echo site_url();?>"> Home </a></li>
					<li><a href="#"> <i class="fas fa-angle-double-right"></i> </a></li>
					<li><a href="#"> About </a> </li>
				</ul>
			</div>
		</section>
		<!-- Partners -->
		<section class="schools-brief">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-8 offset-md-2 text-center">
								<div class="section-title">
									<h2 class="text-uppercase">Our <span class="text-theme">Promise</span></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<div class="card">
							<!-- <img src="http://placehold.it/300x200/999999/cccccc" class="card-img-top" alt="..."> -->
							<div class="card-icon">
								<i class="fas fa-space-shuttle fa-4x"></i>
							</div>
							<div class="card-body">
								<h5 class="card-title">Our Mission</h5>
								<p class="card-text"><?php echo $mission;?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="card">
							<div class="card-icon">
								<i class="fas fa-eye fa-4x"></i>
							</div>
							<div class="card-body">
								<h5 class="card-title">Our Vision</h5>
								<p class="card-text"><?php echo $vision;?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End schools -->

		<!-- Donate -->
		<section class="color-overlay">
			<div class="container mt-5">
				<div class="row">
					<div class="col-lg-12 text-center">
						<p>Join us today</p>
						<p>Donate to help a child complete their education</p>
						<div class="center-button">
							<a href="#" class="btn btn-default btn-dark">Donate</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Donate -->

		<!-- About -->
		<section class="about-brief">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 text-center">
						<div class="section-title">
							<h2 class="text-uppercase">Our <span class="text-theme">Story</span></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7 col-lg-7 col-sm-6">
						<p class="card-text"><?php echo $project;?></p>
					</div>
					<div class="col-md-3 col-lg-3 col-sm-6">
						<img class="img-fluid" src="<?php echo $project_image;?>" />
					</div>
				</div>
			</div>
		</section>
		<!-- End About -->
		<section class="schools-brief">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 text-center">
						<div class="section-title">
							<h2 class="text-uppercase">Project <span class="text-theme">Information</span></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="accordion">
							<ul class="accordion_list">
								<li class="accordion_item">
									<div class="accordion_itemTitleWrap">
										<h3 class="accordion_itemTitle">About Laikipia County</h3>
										<div class="accordion_itemIconWrap">
											<svg viewBox="0 0 24 24">
												<polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2" /></svg>
										</div>
									</div>
									<div class="accordion_itemContent">
										<?php echo $county;?>
									</div>
								</li>
								<li class="accordion_item">
									<div class="accordion_itemTitleWrap">
										<h3 class="accordion_itemTitle">Project Overview</h3>
										<div class="accordion_itemIconWrap">
											<svg viewBox="0 0 24 24">
												<polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2" /></svg>
										</div>
									</div>
									<div class="accordion_itemContent">
										<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
											et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
											sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
										<div class="center-button">
											<a href="#" type="submit" class="btn btn-default btn-dark">Read More</a>
										</div>
									</div>
								</li>
								<li class="accordion_item">
									<div class="accordion_itemTitleWrap">
										<h3 class="accordion_itemTitle">Donors and Donations</h3>
										<div class="accordion_itemIconWrap">
											<svg viewBox="0 0 24 24">
												<polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2" /></svg>
										</div>
									</div>
									<div class="accordion_itemContent">
										<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
											et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
											sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
										<div class="center-button">
											<a href="#" type="submit" class="btn btn-default btn-dark">Read More</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-6">
						<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/4Go90tXi-EY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</section>
