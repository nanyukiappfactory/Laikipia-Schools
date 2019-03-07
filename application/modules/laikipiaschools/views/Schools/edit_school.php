<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Friend</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <script  type="text/css" src="<?php echo base_url() ?>https://bootswatch.com/4/solar/bootstrap.min.css"></script>
        <link href="<?php echo base_url() ?>assets/themes/custom/styles.css" rel="stylesheet"/>
         <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.3.1.slim.min.js"></script>
        <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js" rel="stylesheet" />

    </head>
    <body class="container">
   <div class="card text-white bg-primary mb-3">
        <h1>Update Friend</h1>
         <?php 
            if(!empty($form_errors)){
            echo $form_errors;
            }  
        ?>
            <!-- create form -->
            <?php echo form_open($this->uri->uri_string());?>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <div class="col-md-6">
                    <?php echo form_input(['name'=>'firstname', 'placeholder'=>'Enter First Name', 'class'=>'form-control', 'value'=>set_value('firstname', $friend_name)])?>
                </div>
            </div>
        <div class="form-group">
            <label for="age">Age</label>
             <?php echo form_input(['name'=>'age','class'=>'form-control', 'value'=>set_value('age', $friend_age)])?>
        </div>
        <div class="form-group">
            <label for="hobby">Hobby</label>
             <?php echo form_input(['name'=>'hobby','class'=>'form-control', 'value'=>set_value('hobby', $friend_hobby)])?>
        </div>
        <div class="form-group">
            <input type="radio" name="gender" value="Male" <?php echo ($friend_gender=='Male')?'checked':'' ?> size="17">Male 
            <input type="radio" name="gender" value="Female" <?php echo ($friend_gender=='Female')?'checked':'' ?> size="17">Female 
        </div>
    </div>
    <div>    
            <input class="btn btn-primary" type="submit" value="Update Friend"></input>
    </div>
    <div class="modal-footer">
      <?php echo anchor('laikipiaschools/schools','Cancel',['class'=>'btn btn-primary']);?>
        </div>
            <?php echo form_close()?>
    </body>
</html>