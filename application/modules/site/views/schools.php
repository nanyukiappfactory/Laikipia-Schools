<!-- Schools -->
<?php
if ($schools->num_rows() > 0) {
    $count = 0;
    foreach ($schools->result() as $row) {
        $id = $row->school_id;
        $count++;
        // $image = 'school_default.jpeg';
        ?>
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
                    <div class="c-item">
                        <div class="school-content">
                            <div class="school-thumb">
                                <img class="img-responsive full-img" src="http://placehold.it/300x200/999999/cccccc"
                                    alt="4.jpg">
                                <div class="img-overlayer"></div>
                            </div>
                            <div class="school-details text-left">
                                <div class="progress-bar">
                                    <div class="total-progress" data-percentage="50"></div>
                                </div>
                                <ul class="list-inline">
                                    <li><strong>Donated:</strong> Kes 45000</li>
                                    <li><strong>Target:</strong> <span class="text-theme">Kes 70000</span></li>
                                </ul>
                                <div class="clearfix"></div>
                                <h3>Laikipia High</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore
                                    et
                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                <div class="center-button">
                                    <button type="submit" class="btn btn-default btn-theme">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-item">
                        <div class="school-content">
                            <div class="school-thumb">
                                <img class="img-responsive full-img" src="http://placehold.it/300x200/999999/cccccc"
                                    alt="4.jpg">
                                <div class="img-overlayer"></div>
                            </div>
                            <div class="school-details text-left">
                                <div class="progress-bar">
                                    <div class="total-progress" data-percentage="66"></div>
                                </div>
                                <ul class="list-inline">
                                    <li><strong>Donated:</strong> Kes 45000</li>
                                    <li><strong>Target:</strong> <span class="text-theme">Kes 70000</span></li>
                                </ul>
                                <div class="clearfix"></div>
                                <h3>Laikipia High</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore
                                    et
                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                <div class="center-button">
                                    <button type="submit" class="btn btn-default btn-theme">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-item">
                        <div class="school-content">
                            <div class="school-thumb">
                                <img class="img-responsive full-img" src="http://placehold.it/300x200/999999/cccccc"
                                    alt="4.jpg">
                                <div class="img-overlayer"></div>
                            </div>
                            <div class="school-details text-left">

                                <div class="progress-bar">
                                    <div class="total-progress" data-percentage="20"></div>
                                </div>
                                <ul class="list-inline">
                                    <li><strong>Donated:</strong> Kes 45000</li>
                                    <li><strong>Target:</strong> <span class="text-theme">Kes 70000</span></li>
                                </ul>
                                <div class="clearfix"></div>
                                <h3>Laikipia High</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore
                                    et
                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                <div class="center-button">
                                    <button type="submit" class="btn btn-default btn-theme">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-item">
                        <div class="school-content">
                            <div class="school-thumb">
                                <img class="img-responsive full-img" src="http://placehold.it/300x200/999999/cccccc"
                                    alt="4.jpg">
                                <div class="img-overlayer"></div>
                            </div>
                            <div class="school-details text-left">
                                <div class="progress-bar">
                                    <div class="total-progress" data-percentage="80"></div>
                                </div>
                                <ul class="list-inline">
                                    <li><strong>Donated:</strong> Kes 45000</li>
                                    <li><strong>Target:</strong> <span class="text-theme">Kes 70000</span></li>
                                </ul>
                                <div class="clearfix"></div>
                                <h3>Laikipia High</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore
                                    et
                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                <div class="center-button">
                                    <button type="submit" class="btn btn-default btn-theme">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
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