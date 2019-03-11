<div class="page-content">
<?php
if ($allschools->num_rows() > 0) {
    $count = 0;
    foreach ($allschools->result() as $row) {
        
        ?>

		<!-- Page Header -->
		<section class="page-header" style="background-image: url('<?php echo base_url(); ?>assets/images/classroom.JPG')">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 text-center">
						<div class="section-title">
                        <!-- <?php echo $row->school_name; ?> -->
                            <!-- <h2 class="text-uppercase">Laikipia <span class="text-theme">High</span></h2> -->
                            <h2 class="text-uppercase text-theme"><?php echo $row->school_name; ?></h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Page Header -->
		<section class="thumbnails">
			<div class="container">
				<ul class="list-inline">
                    <!-- <li><a href="index.html"> Home </a></li> -->
                    <li><a href="<?php echo base_url();?>site/site/index">Home</a></li>
					<li><a href="#"> <i class="fas fa-angle-double-right"></i> </a></li>
                    <!-- <li><a href="schools.html"> Schools </a> </li> -->
                    <li><a href="<?php echo base_url();?>site/site/view_other">Schools</a></li>
					<li><a href="#"> <i class="fas fa-angle-double-right"></i> </a></li>
					<li><a href="<?php echo base_url();?>site/site/view-single"> <?php echo $row->school_name; ?> </a> </li>
				</ul>
			</div>
		</section>
		<!-- Partners -->
		<section class="schools-brief">
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-8 offset-md-2 text-center">
								<div class="section-title">
                                <?php
                         if ($row->total_donated > $row->target_amount) {
                                $progress = 100;
                            } else {
                                $progress = ($row->total_donated / $row->target_amount) * 100;
                            }
                            ?>
									<h2 class="text-uppercase">Donation <span class="text-theme">Progress</span></h2>
									<h4><?php echo $row->school_name; ?> has received <?php echo number_format($progress); ?>% of their donation needs</h4>
								</div>
							</div>
						 </div>
						 <div class="progress-bar">
                        <div class="total-progress" data-percentage="<?php echo number_format($progress); ?>"></div>
                        </div>
                        </div>
                </div>
                <div>
                <h3>About <?php echo $row->school_name; ?></h3>
               </div>
				<div class="row">
					<div class="col-sm-4 col-md-3 col-lg-3">
						<div class="school-thumb-single">
							<img class="img-fluid full-img" src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="4.jpg">
							<div class="img-overlayer"></div>
						</div>
						<div class="school-details text-left">
							<ul class="list-inline">
                            <?php $target = $row->target_amount;?>
                            <li><strong>Donated:</strong> <?php echo number_format($row->total_donated); ?></li>
                            <li><strong>Target:</strong> <span class="text-theme"><?php echo number_format($target); ?></span>
							</ul>
                            <div class="clearfix"></div>
                        </div>
                        <div id="map_canvas"></div>
                    </div>
                    <div class="col-sm-8 col-md-9 col-lg-9">
                        <p><?php echo $row->school_write_up; ?></p>
                    </div>
				</div>
                <h3>Gallery</h3>
                <div id="schoolGalleryCarousel" class="owl-carousel">
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                    <div class="gallery">
                        <img src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="...">
                    </div>
                </div>
			</div>
        </section>
        
        <?php break;}  }?>
		<!-- End school -->
	</div>