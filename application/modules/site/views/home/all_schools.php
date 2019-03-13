




		<!-- Page Header -->
		<section class="page-header" style="background-image: url('assets/img/classroom.JPG')">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 text-center">
						<div class="section-title">
							<h2 class="text-uppercase">Our <span class="text-theme">Schools</span></h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Page Header -->
		<section class="thumbnails">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.html"> Home </a></li>
					<li><a href="#"> <i class="fas fa-angle-double-right"></i> </a></li>
					<li><a href="schools.html"> Schools </a> </li>
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
                                    <h2 class="text-uppercase">Donation <span class="text-theme">Progress</span></h2>
                                    <h4>We are <?php echo $percentage_donated_total; ?>% there.</h4>
                                </div>
                            </div>
                        </div>
						<div class="progress-bar">
						<div class="total-progress" data-percentage="<?php echo $percentage_donated_total; ?>"></div>
					   </div>
					</div>
				</div>
				<div class="row">
                <?php
                    if ($allschools->num_rows() > 0) {
                        $count = 0;
                        foreach ($allschools->result() as $row) {
                            ?>
							<?php $field_name = preg_replace('/\s/', '-', $row->school_name);?>
					<div class="col-sm-4 col-md-3 col-lg-3">
						<div class="school-content">
							<div class="school-thumb">
								<img class="img-fluid full-img" src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="4.jpg">
								<div class="img-overlayer"></div>
							</div>
							<div class="school-details text-left">
                            <div class="progress-bar">
								<?php
                                    if ($row->total_donated > $row->target_amount) {
                                        $progress = 100;
                                    } else {
                                        $progress = ($row->total_donated / $row->target_amount) * 100;
                                    }
                                    ?>
							<div class="total-progress" data-percentage="<?php echo number_format($progress); ?>"></div>
							</div>
                            <ul class="list-inline">
								<?php $target = $row->target_amount;?>
								<li><strong>Donated:</strong>
									<?php echo number_format($row->total_donated); ?>
								</li>
								<li><strong>Target:</strong> <span class="text-theme">
										<?php echo number_format($target); ?></span>
							</ul>
								<div class="clearfix"></div>
                                <?php echo $row->school_name; ?>
								<div class="school-description">
									<p><?php echo $row->school_write_up; ?></p>
								</div>
								<div class="center-button">
                                <a class="btn btn-default btn-theme" href="<?php 
								 echo base_url(); ?>schools/<?php echo $field_name; ?>">READ MORE</a>
								</div>
							</div>
						</div>
					</div>
					<?php  }}?>
				</div>
			</div>
		</section>
        <!-- End schools -->


	<!-- Footer -->
	
	
