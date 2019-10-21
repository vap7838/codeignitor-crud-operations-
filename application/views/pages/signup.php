<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title> Register Forms</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" media="all">
 
     <style>
        /* span.select2.select2-container.select2-container--default.select2-container--below.select2-container--focus {
                margin-right: 57px;
        } */
        @media (min-width: 1200px){
            .container {
            max-width: 950px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="container">
        <?php if($this->session->flashdata('signupfail')): ?>
        <?php echo '<P class = "alert alert-success">'.$this->session->flashdata('signupfail').'</P>'?>
        <?php endif;?>
        </div>
        <div class=" container alert alert-danger print-error-msg text-center" style="display:none">
            
        </div>
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                   
                    <form  id="submit" enctype="multipart/form-data" >
                    <?php echo validation_errors(); ?>  
    
                    <?php echo form_open(); ?>  
                        <div class="input-group">
                            <input class="input--style-2"  type="text" id="fname" placeholder="FirstName" value="<?php echo set_value('fname'); ?>" name="fname">
                        </div>
                        <div class="input-group">
                                <input class="input--style-2"  type="text" id="lname" placeholder="LastName" value="<?php echo set_value('lname'); ?>" name="lname" >
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker"  type="birthday" placeholder="Birthdate" id="birthday" value="<?php echo set_value('birthday'); ?>" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" id="gender">
                                            <option disabled="disabled" selected="selected">Gender</option>                                   
                                                  <option value='Male'>Male</option>
                                                  <option value='Female'>Female</option>
                                                  <option value='Other'>Other</option>";
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="file" id="photo" value="<?php echo set_value('photo'); ?>" name="photo" >
                        </div>
                        <div class="input-group">
                                <input class="input--style-2"  type="email" id="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" name="email" >
                        </div>
                        <div class="input-group">
                                <input class="input--style-2"  type="password" id="password" placeholder="password" value="<?php echo set_value('password'); ?>" name="password">
                        </div>   
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" name="submit" value="submit"  type="submit">SignUp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
  <script>
     $(document).ready(function(){
         
        $('#submit').on('submit',function(e){
            e.preventDefault();
            // var formData = new FormData(this);

             $.ajax({
                url: '<?php echo base_url();?>signup_controller/insert',
                type: 'POST',
                data : new FormData(this),
                dataType: "json",  
                processData: false,
                contentType: false,
                cache:false,
                async:false,
                success: function(response){    
                    console.log(response);
                    // $('.statusMsg').html('<div class="alert alert-success">'+response+'</div>');
                    if($.isEmptyObject(response.error)){
                        $(".print-error-msg").css('display','none');
	                	alert(response.success);
                        window.location.href = "<?php echo base_url();?>login_controller/loginpage";
                    }else{
                        $(".print-error-msg").css('display','block');
	                	$(".print-error-msg").html(response.error);
                    }
                    }
            });
        });
     });
    </script>
    
    <script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>assets/js/global.js"></script>
    

<!-- </body> This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php echo form_close(); ?>  
<!-- end document-->