<!-- Schools -->
<section class="schools-brief">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title">
                    <h2 class="text-uppercase">Our <span class="text-theme">Schools</span></h2>
                    <h4>Our initiative is currently targeting day high schools in Laikipia County</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div id="schoolCarousel" class="owl-carousel">
                    <?php
if ($donations->num_rows() > 0) {
    $count = 0;
    foreach ($donations->result() as $row) {
        ?>

                    <div class="c-item">
                        <div class="school-content">
                            <div class="school-thumb">
                                <img style="max-width:100%;"
                                                src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>"
                                                class="d-block w-100" alt="No Image"/>
                                <div class="img-overlayer"></div>
                            </div>
                            <div class="school-details text-left">
                                <div class="progress-bar">
                                    <?php $progress = ($row->donation_amount / 70000) * 100;?>
                                    <div class="total-progress" data-percentage="<?php echo $progress; ?>"></div>
                                </div>
                                <ul class="list-inline">
                                    <li><strong>Donated:</strong><?php echo $row->donation_amount; ?></li>
                                    <li><strong>Target:</strong> <span class="text-theme">Kes 70000</span></li>
                                </ul>
                                <div class="clearfix"></div>
                                <h3><?php echo $row->school_name; ?></h3>
                                <p><?php echo $row->school_write_up; ?></p>
                                <div class="center-button">
                                    <button type="submit" class="btn btn-default btn-theme">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php }}?>
                </div>
            </div>
            <!-- End schools -->

            <!-- Total donation -->
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="school-content">
                    <div class="school-thumb">
                        <img class="img-responsive full-img" src="http://placehold.it/300x200/999999/cccccc"
                            alt="4.jpg">
                        <div class="img-overlayer"></div>
                    </div>
                    <div class="school-details text-left">

                        <div class="progress-bar">
                            <div class="total-progress" data-percentage="27"></div>
                        </div>
                        <h3>Our Target</h3>
                        <div class="mt-4"></div>
                        <ul class="list-inline">
                            <li><strong>Donated:</strong> Kes 45000</li>
                            <li><strong>Target:</strong> <span class="text-theme">Kes 70000</span></li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="mb-4"></div>
                        <div class="center-button">
                            <button type="submit" class="btn btn-default btn-theme">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End total donation -->
        </div>
    </div>
</section>
<!-- End Schools -->