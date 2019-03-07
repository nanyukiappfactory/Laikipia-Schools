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

$dignity_pack_post = array();
foreach ($abouts->result() as $row) {
    if ($row->category_name == "dignity pack") {

        array_push($dignity_pack_post, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}
// var_dump($dignity_pack_post);die();
?>
        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-12 col-md-12">

            <?php

$dignity_pack = array();
foreach ($abouts->result() as $row) {
    if (strtolower($row->category_name) == strtolower("Dignity pack")) {

        array_push($dignity_pack, array(
            "post_title" => $row->post_title,
            "post_description" => $row->post_description,
            "post_image_name" => $row->post_image_name,
            "post_date" => $row->post_date,
        ));

    }

}
// echo json_encode($dignity_pack);die();
?>
        </div>
    </div>

    <?php

$donation = array();
foreach ($donations->result() as $row) {

    array_push($donation, array(
        "school_name" => $row->school_name,
        "category_name" => $row->category_name,
        "donation_amount" => $row->donation_amount,
    ));
}
echo json_encode($donation);die();
?>
    </div>
    </div>


</body>

</html>