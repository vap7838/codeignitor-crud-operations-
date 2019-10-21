<?php
 if(!$this->session->userdata('logged_in')){
    redirect('pages/login');
}
?>
<html>
<head>
<style>
    /* body{
        background-image: url(image5);
        background-repeat: no-repeat;
        background-size: cover;
    } */

    body {
    color: #828bb2;
    font-family: "Roboto", sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    position: relative;
    }   
    .single-post-item {
    position: relative;
    z-index: 1;
    margin-bottom: 80px;
    margin-top: 80px;
    }   
    single-post-item .post-thumb {
    overflow: hidden;
    }
    .single-post-item .post-thumb img {
    width: 100%;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    }
   
   
    @media (min-width: 992px){
    .col-lg-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }
    }
    single-post-item .post-details {
    position: absolute;
    left: 30px;
    bottom: -30px;
    padding: 30px;
    z-index: 1;
    background: #fff;
    width: 100%;
    box-shadow: 0 10px 30px rgba(65, 80, 148, 0.1);
    }
    .single-post-item .post-details .blog-meta {
    margin-top: 15px;
    }
    </style>
</head>
<body>
<div class="container">
    <?php if($this->session->flashdata('bloginsert')): ?>
    <?php echo '<P class = "alert alert-success" style="margin-top: 66px;">'.$this->session->flashdata('bloginsert').'</P>'?>
    <?php endif;?>
    <div class="row">

        <?php
       
       foreach($result as $row){  
        ?>
       
            <div class="col-lg-6 col-md-6">
                <div class="single-post-item">
                    <div class="post-thumb">
                        <img class="img-fluid" src="<?php echo base_url();?>assets/uploads/blog/<?php echo $row['photo'] ?>" style="width: 367px;  height: 205px;" alt="Photo">
                    </div>
                    <div class="post-details">
                        <h4><?php echo $row['title']?></h4>
                        <p><?php  echo $row['discription']?></p>
                            
                        <div class="">
                            <a href="#" class=""><span class="lnr lnr-calendar-full"></span><?php $time = $row['time']; $time=date("d-m-Y H:i:s", strtotime($time));echo $time?></a>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url();?>pages/blogedit?id=<?php echo $row['id']?>"  <span class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url();?>blogdelete_controller/delete?id=<?php  echo $row['id']?>"  <span class="glyphicon glyphicon-edit"></span> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
           <?php 
           }
           ?>

        </div>
    </div>
    </body>
</html>