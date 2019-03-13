<!-- FAQs -->
		<section class="faq-section">
		<?php
                    if ($abouts->num_rows() > 0) {
                       
                            ?>
			<div class="container">
				<div class="row">
					<div class="col-md-5 offset-md-7">
						<div class="row">
							<div class="col-md-8 offset-md-2 text-center">
								<div class="section-title">
									<h2 class="text-uppercase">Initiative <span class="text-theme">FAQs</span></h2>
									<h4>Find out more about our great cause</h4>
								</div>
							</div>
						</div>
						<div class="accordion">
							<ul class="accordion_list">
							<li class="accordion_item">
									<div class="accordion_itemTitleWrap">
										<h3 class="accordion_itemTitle">Laikipia County</h3>
										<div class="accordion_itemIconWrap">
                                                <svg viewBox="0 0 24 24">
                                                    <polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2" /></svg>
                                                </div>
									</div>
									<div class="accordion_itemContent">
                                        <p>
										<?php  
										 foreach ($abouts->result() as $row) 
											if(strtolower($row->post_title) == strtolower("Laikipia County")){?>
												<?php echo $row->post_description; ?>
											<?php }?>
										</p>
                                        <div class="center-button">
                                            <a href="#" type="submit" class="btn btn-default btn-dark">Read More</a>
                                        </div>
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
                                        <p>
										<?php  
										 foreach ($abouts->result() as $row) 
											if(strtolower($row->post_title) == strtolower("About Laikipia School Project")){?>
												<?php echo $row->post_description; ?>
											<?php }?>
										</p>
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
										<p><?php  
										 foreach ($abouts->result() as $row) 
											if(strtolower($row->post_title) == strtolower("Donations")){?>
												<?php echo $row->post_description; ?>
											<?php }?></p>
                                        <div class="center-button">
                                            <a href="#" type="submit" class="btn btn-default btn-dark">Read More</a>
                                        </div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php 
                    }?>
		</section>
		<!-- End FAQs -->
