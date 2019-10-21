<?php
 if(!$this->session->userdata('logged_in')){
    redirect('pages/login');
}
?>
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
    <title> Add Register Forms</title>

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
</head>

<body>
<?php 
    if(!empty($result)){
    foreach ($result as $row)
    {
        // print_r($row);

?>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
     
        <div class=" container alert alert-danger print-error-msg text-center" style="display:none"></div>
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    
                    <form  id="updateform" enctype="multipart/form-data" >
                    <?php echo validation_errors(); ?>  
                    <?php  echo form_open();?> 
                        <div class="input-group">
                            <input type="hidden" name='id' value="<?php echo $row['id']?>">
                            <input class="input--style-2"  type="text" placeholder="FirstName" value="<?php echo $row['fname'] ?>" name="fname">
                        </div>
                        <div class="input-group">
                                <input class="input--style-2"  type="text" placeholder="LastName" value="<?php echo $row['lname']?>" name="lname" >
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker"  type="text" placeholder="Birthdate" value="<?php echo $row['birthday'] ?>" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Gender</option>

                                            <?php 
                                            if($row['gender'] == 'Male'){
                                                echo "<option value='Male' selected>Male</option>";    
                                                echo "<option value='Female'>Female</option>"; 
                                                echo "<option value='Other'>Other</option>"; 
                                                                                          
                                            }elseif($row['gender'] == 'Female'){
                                                echo "<option value='Male'>Male</option>";    
                                                echo "<option value='Female' selected>Female</option>"; 
                                                echo "<option value='Other'>Other</option>"; 
                                            }else{
                                                echo "<option value='Male'>Male</option>";    
                                                echo "<option value='Female'>Female</option>"; 
                                                echo "<option value='Other' selected>Other</option>"; 
                                            }
                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="file"  name="photo" >
                            <input class="input--style-2" type="text" value="<?php echo $row['photo'] ?>"  name="photo_old" >
                        </div>
                        <div class="input-group">
                                <input class="input--style-2"  type="email" placeholder="Email Address" value="<?php echo $row['email'] ?>" name="email" >
                        </div>
                <?php } }?>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" name="submit" value="submit"  type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <script>
     $(document).ready(function(){
         
        $('#updateform').on('submit',function(e){
            e.preventDefault();
            // var formData = new FormData(this);

             $.ajax({
                url: '<?php echo base_url(); ?>add_controller/edit',
                type: 'POST',
                data : new FormData(this),
                dataType: "json",  
                processData: false,
                contentType: false,
                cache:false,
                async:false,
                success: function(response){   
                    // var obj = JSON.parse(response); 
                    console.log(response);
                    
                    // console.log((typeof 'response'));
                    // $('.statusMsg').html('<div class="alert alert-success">'+response+'</div>');
                    if($.isEmptyObject(response.error)){
                        
                        
                        $(".print-error-msg").css('display','none');
                         alert(response.success);
                         window.location.href = "<?php echo base_url();?>pages/display";
                    }else{
                        console.log((typeof 'response'));
                        $(".print-error-msg").css('display','block');
	                	$(".print-error-msg").html(response.error);
                    }
                }
            });
        });
     });
    </script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>assets/js/global.js"></script>
    

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<!-- end document-->