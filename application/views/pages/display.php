<?php
 if(!isset($_SESSION['email'])){
    redirect('pages/login');
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Document</title>
        <style>
        @media (min-width: 992px){
            .col-md-12 {
                width: 100%;
            }
        }
        </style>
    </head>
    <body>
    <div class="container">
    <div class="row col-md-12 ">
    <table class="table table-striped custab">
    <thead>
        <td class="text-center"><a class="btn btn-info btn-xs" href="<?php echo base_url(); ?>signup_controller/signup" <span class="glyphicon glyphicon-edit"></span>Add Data</a></td>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Photo</th>
            <th>email</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php

    foreach ($result as $row)
    {
        // print_r($row['photo']);
        // exit;
 
    ?>    
             
          <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['lname'];?></td>
                <td><?php echo $row['birthday'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><img src="<?php echo base_url();?>assets/uploads/<?php echo $row['photo'];?>" style="width:100px; height:100;"/></td>
                <td><?php echo $row['email'];?></td>
                <td class="text-center"><a class="btn btn-info btn-xs" href="<?php echo base_url();?>add_controller/add?id=<?php echo $row['id']?>"<span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="<?php echo base_url();?>delete_controller/delete?id=<?php echo $row['id']?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
    <?php } ?>
       
    </table>    
    </div>
</div> 
    </body>
    </html>