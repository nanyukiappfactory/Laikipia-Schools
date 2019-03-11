<!-- Schools -->
<section class="schools-brief">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title">
                    <a href="<?php echo base_url();?>site/site/view_other"><h2 class="text-uppercase">Our <span class="text-theme">Schools</span></h2></a>
                    <!-- <h2 class="text-uppercase">Our <span class="text-theme">Schools</span></h2> -->
                    <h4>Our initiative is currently targeting day high schools in Laikipia County</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div id="schoolCarousel" class="owl-carousel">
                    <?php
if ($schools->num_rows() > 0) {
    foreach ($schools->result() as $row) {
        ?>
                    <div class="c-item">
                        <div class="school-content">
                            <div class="school-thumb">
                                <img style="max-width:100%;"
                                    src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>"
                                    class="d-block w-10" />
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
                                    <div class="total-progress"
                                        data-percentage="<?php echo number_format($progress); ?>"></div>
                                </div>
                                <ul class="list-inline">
                                    <?php $target = $row->target_amount;?>
                                    <li><strong>Donated:</strong> <?php echo number_format($row->total_donated); ?></li>
                                    <li><strong>Target:</strong> <span
                                            class="text-theme"><?php echo number_format($target); ?></span>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <h3><?php echo $row->school_name; ?></h3>
                                <p><?php echo $row->school_zone; ?></p>
                                <div class="center-button">
                                    <button type="submit" class="btn btn-default btn-theme">Read More</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php }
}?>
                </div>
            </div>
            <!-- End schools -->

            <!-- Total donation -->
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="school-content">
                    <div class="school-thumb">
                        <img src="<?php echo base_url() . 'assets/themes/website/assets/img/target.JPG'; ?>"
                            class="d-block w-10" />
                        <div class="img-overlayer"></div>
                    </div>
                    <div class="school-details text-left">

                        <div class="progress-bar">
                            <div class="total-progress" data-percentage="<?php echo $percentage_donated_total; ?>">
                            </div>
                        </div>
                        <h3>Our Target</h3>
                        <div class="mt-4"></div>
                        <ul class="list-inline">
                            <li><strong>Donated:</strong> <?php echo number_format($project_donation_total); ?> </li>
                            <li><strong>Target:</strong> <span
                                    class="text-theme"><?php echo number_format($project_target_total); ?></span>
                            </li>
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