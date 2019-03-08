<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php

$about_post = array();
foreach ($abouts->result() as $row) {
    if (strtolower($row->category_name) == strtolower("About")) {

        array_push($about_post, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}
// echo json_encode($about_post);die();
?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php
$donors_post = array();
foreach ($abouts->result() as $row) {
    if (strtolower($row->category_name) == strtolower("Donor")) {

        array_push($donors_post, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}
// var_dump($donors_post);die();
?>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php
$partner_post = array();
foreach ($abouts->result() as $row) {
    if (strtolower($row->category_name) == strtolower("Partner")) {

        array_push($partner_post, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}
// var_dump($partner_post);die();
?>
        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php

$news = array();
foreach ($news_items->result() as $row) {
    if (strtolower($row->category_name) == strtolower("News")) {
        array_push($news, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}

// echo json_encode($news);die();
?>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php

$picture_array = array();
foreach ($pictures->result() as $row) {
    if (strtolower($row->category_name) == strtolower("Sensitization")) {

        array_push($picture_array, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}

// echo json_encode($picture_array);die();
?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php

$picture_array = array();
foreach ($pictures->result() as $row) {
    if (strtolower($row->category_name) == strtolower("Student")) {

        array_push($picture_array, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}

// echo json_encode($picture_array);die();
?>
        </div>
    </div>





</body>

</html>