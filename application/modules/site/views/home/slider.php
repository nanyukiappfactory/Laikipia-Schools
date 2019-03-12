<div class="page-content">
    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
$count = 0;
foreach ($abouts->result() as $key => $row) {

    if (strtolower($row->category_name) == strtolower("About")) {
        $count++;?>
            <div class="carousel-item <?php echo $count == 1 ? "active" : ""; ?>">
                <img src="<?php echo base_url() . 'assets/uploads/' . $row->post_image_name; ?>" , width=100% />
                <div class="carousel-caption">
                    <h3><?php echo $row->post_title; ?></h3>
                    <p><?php echo $row->post_description; ?>
                    </p>
                </div>
            </div><!-- End Item -->
            <?php }}?>
        </div><!-- End Carousel Inner -->
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item" data-target="#myCarousel" data-slide-to="0">
                <a class="nav-link" href="#">
                    <figure class="slider-figure">
                        <div class="caption">
                            <div class="fc-icon">
                                <i class="fas fa-info"></i>
                            </div>
                            <h5>About</h5>
                            <h3>About the initiative</h3>
                            <button type="submit" class="btn btn-default btn-dark">
                                More
                            </button>
                        </div>
                    </figure>
                </a>
            </li>
            <li class="nav-item" data-target="" data-slide-to="1">
                <a class="nav-link" href="<?php echo base_url(); ?>schools">
                    <figure class="slider-figure">
                        <div class="caption">
                            <div class="fc-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h5>Schools</h5>
                            <h3>Laikipia schools</h3>
                            <button type="submit" class="btn btn-default btn-dark">
                                More
                            </button>
                        </div>
                    </figure>
                </a>
            </li>
            <li class="nav-item" data-target="#myCarousel" data-slide-to="2">
                <a class="nav-link" href="#">
                    <figure class="slider-figure">
                        <div class="caption">
                            <div class="fc-icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <h5>Donations</h5>
                            <h3>Promote education</h3>
                            <button type="submit" class="btn btn-default btn-dark">
                                More
                            </button>
                        </div>
                    </figure>
                </a>
            </li>
            <li class="nav-item" data-target="#myCarousel" data-slide-to="3">
                <a class="nav-link" href="#">
                    <figure class="slider-figure">
                        <div class="caption">
                            <div class="fc-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h5>Partners</h5>
                            <h3>Our partners</h3>
                            <button type="submit" class="btn btn-default btn-dark">
                                More
                            </button>
                        </div>
                    </figure>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Carousel -->