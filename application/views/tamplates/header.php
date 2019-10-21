<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<header>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color:#3b3b3d; margin-bottom: 0px;">
      
           <img src="<?php echo base_url(); ?>assets/images/logo2.jpg" alt="LOGO" style="width:40px; height:40px;margin-right: 30px;">
     
            <ul class="navbar-nav justify-content-center"style="margin-right: 380px;">
            <?php if(!$this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/index">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>blog_controller/blog">CreatesBlog</a>
                </li> -->
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>blogdisplay_controller/blogsdisplay">Blogs</a>
                </li>
            <?php endif;?>    
            <?php if($this->session->userdata('logged_in')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/index">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/blog">CreatesBlog</a>
                </li>
                
                <?php if($this->session->userdata('email') === 'vap151197@gmail.com'): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/display">Userdata</a>
                </li>
                <?php endif;?>  

                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/blogdisplay">myBlog</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>blogdisplay_controller/blogsdisplay">Blogs</a>
                </li>
            <?php endif;?>
            </ul>
            <form class="form-inline" method="post" action="<?php echo base_url(); ?>pages/search">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
            <?php if(!$this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/signup"style="margin-left: 55px;">Singup</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/login"style="margin-left: 55px;">Login</a>
                </li>
            <?php endif;?>

            <?php if($this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>login_controller/destroy"style="margin-left: 55px;">Logout</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>login_controller/loginpage"style="margin-left: 55px;">Login</a>
                </li> -->
            <?php endif;?>

            </ul>  
        </nav>
    </header>
    <div class="container">
    <?php if($this->session->flashdata('login')): ?>
    <?php echo '<P class = "alert alert-success">'.$this->session->flashdata('login').'</P>'?>
    <?php endif;?>


    <?php if($this->session->flashdata('Edit')): ?> 
    <?php echo '<P class = "alert alert-success">'.$this->session->flashdata('Edit').'</P>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('delete')): ?>
    <?php echo '<P class = "alert alert-success">'.$this->session->flashdata('delete').'</P>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('blogedit')): ?>
    <?php echo '<P class = "alert alert-success" style="margin-top: 60px;">'.$this->session->flashdata('blogedit').'</P>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('blogdelete')): ?>
    <?php echo '<P class = "alert alert-success" style="margin-top: 60px;">'.$this->session->flashdata('blogdelete').'</P>'?>
    <?php endif;?>

  

    </div>
    
</html>