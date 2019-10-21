<?php
 if(!$this->session->userdata('logged_in')){
    redirect('pages/login');
}
?>
<html>
<head>
<style>
    body{
        background-image: url(<?php echo base_url(); ?>assets/images/image5.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</head>
<!-- <div class="container">
    <?php //if($this->session->flashdata('bloginsertfail')): ?>   
    <?php //echo '<P class = "alert alert-success">'.$this->session->flashdata('bloginsertfail').'</P>'?>
    <?php //endif;?>
</div> -->
<div class="card" style=" width:50%; margin-left: 320px; margin-top: 100px;">
       <div class="card-header"><h1>BLOG</h1></div>
       <div class="card-body">
            <?php echo validation_errors(); ?>  
            <?php //echo form_open('blog_controller/bloginsert'); ?>  
           <form method="POST" action="<?php echo base_url(); ?>blogedit_controller/edit"  enctype="multipart/form-data">
          <?php 
          foreach($result as $row){
          ?>      
                <div class="input-group mb-3">
                    <input  type="file"  name="photo">
                    <input  type="text" value="<?php echo $row['photo']?>"  name="photo_old">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <!-- <input  type="hidden"  name="email">    -->
                </div>
                <div class="input-group"style= "margin-top: 30px;">
                    <label for="Title">Title</label>
                    <input  type="text"  name="title" value="<?php echo $row['title']?>" placeholder="Title" style= "margin-left: 47px;" >
                </div>
                <div class="input-group" style= "margin-top: 30px;">
                    <label for="Discription">Discription</label>
                    <textarea class="form-control" rows="5" name="discription" id="Discription" ><?php echo $row['discription']?></textarea>
                </div>

                <?php
                }
                ?>
                <div class="btn-group">
                    <button class="btn btn--radius btn btn-primary mt-5 btn-lg" name="submit"  type="submit">Update</button>
                </div>
           </form>
       </div>
   </div>
   </html>