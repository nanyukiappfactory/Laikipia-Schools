<?php
if ($allschools->num_rows() > 0) {
    $count = 0;
    foreach ($allschools->result() as $row) {
        if ($school_name == $row->school_name) {
            ?>

<!-- Page Header -->
<section class="page-header" style="background-image: url('<?php echo base_url(); ?>assets/images/classroom.JPG')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title">
                    <!-- <?php echo $row->school_name; ?> -->
                    <!-- <h2 class="text-uppercase">Laikipia <span class="text-theme">High</span></h2> -->
                    <h2 class="text-uppercase text-theme">
                        <?php echo $row->school_name; ?>
                    </h2>
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
            <li><a href="<?php echo base_url(); ?>home">Home</a></li>
            <li><a href="#"> <i class="fas fa-angle-double-right"></i> </a></li>
            <!-- <li><a href="schools.html"> Schools </a> </li> -->
            <li><a href="<?php echo base_url(); ?>schools">Schools</a></li>
            <li><a href="#"> <i class="fas fa-angle-double-right"></i> </a></li>
            <li><a href="<?php echo base_url(); ?>schools"></a></li>
            <li> <?php echo $row->school_name; ?> </li>


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
                            <h4>
                                <?php echo $row->school_name; ?> has received
                                <?php echo number_format($progress); ?>% of their donation needs</h4>
                        </div>
                    </div>
                </div>
                <div class="progress-bar">
                    <div class="total-progress" data-percentage="<?php echo number_format($progress); ?>"></div>
                </div>
            </div>
        </div>
        <div>

            <h3>About
                <?php echo $row->school_name; ?>
            </h3>
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="school-thumb-single">
                        <a class="school-image" href=""><img class="img-fluid "
                                src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>"
                                alt="..."></a>
                        <div class="img-overlayer"></div>
                    </div>
                    <div class="school-details text-left">
                        <ul class="list-inline">
                            <?php $target = $row->target_amount;?>
                            <li><strong>Donated:</strong>
                                <?php echo number_format($row->total_donated); ?>
                            </li>
                            <li><strong>Target:</strong> <span class="text-theme">
                                    <?php echo number_format($target); ?></span>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9 col-lg-9">
                    <?php echo '<script type="text/javascript">
													function initialize() {
														var position = new google.maps.LatLng(' . $row->school_latitude . ',' . $row->school_longitude . ');
														var myOptions = {
														zoom: 15,
														center: position,
														mapTypeId: google.maps.MapTypeId.ROADMAP
														};
														var map = new google.maps.Map(
															document.getElementById("map_canvas' . $row->school_id . '"),
															myOptions);

														var marker = new google.maps.Marker({
															position: position,
															map: map,
															title:"This is the place."
														});
														var infowincontent = document.createElement("div");
														var strong = document.createElement("strong");
														strong.textContent = "' . $row->school_name . '"
														infowincontent.appendChild(strong);
														infowincontent.appendChild(document.createElement("br"));

														var text = document.createElement("text");
														text.textContent = "' . $row->school_location_name . '"
														infowincontent.appendChild(text);

														var infowindow = new google.maps.InfoWindow({
															content: infowincontent
														});
														infowindow.open(map,marker);

													}
													google.maps.event.addDomListener(window, "load", initialize);
													</script>'; ?>
                    <div id="map_canvas<?php echo $row->school_id; ?>" style="width:100%; height:500px"></div>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <p>
                    <?php echo $row->school_write_up; ?>
                </p>


            </div>
        </div>
        <h3>Gallery</h3>

        <div id="<?php echo $row->school_id; ?>" class="owl-carousel schoolGalleryCarousel">
            <?php
             foreach ($schoolpictures->result() as $row) {
                if ($school_name == $row->school_name) {

                    ?>
            <a href="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>"><img
                    src="<?php echo base_url() . 'assets/uploads/' . $row->school_image_name; ?>" alt="..."></a>
            <?php }}?>
        </div>
    </div>
    <?php break;}}}?>
</section>


<!-- End school -->