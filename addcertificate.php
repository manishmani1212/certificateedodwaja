<?php
        include 'db.php';
        if (isset($_POST['submit'])) {
            $name  = $_POST["name"];
            $certi_id = $_POST["certi_id"];
          $pdf_name=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="certifi_pdf/".$pdf_name;

          move_uploaded_file($pdf_tem_loc,$pdf_store);
          $sqlquery = "INSERT INTO edodwaja_certi( certi_name,certi_id,certi_pdf) VALUES ('$name', '$certi_id', '$pdf_store')";

         
          if ($conn->query($sqlquery) === TRUE) {
            echo "record inserted successfully";
            echo `<script> aler(" Cerificate inserted Successfully..");</script>`;
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
            echo `<script> aler("Error Cerificate not inserted");</script>`;
        }



        }
 
    


         ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Edodwaja Certificate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div 
 >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Certificates <i class="fa fa-user-circle-o"
            aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o"
                    aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" id="name" name="name" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Certificate_id</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"
                    aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="certi_id" name="certi_id" required="required">
            </div>
          </div>
          <!-- <div class="form-group">
            <label for="message-text" class="col-form-label">Phone:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"
                    aria-hidden="true"></i></span>
              </div>
              <input type="phone" class="form-control" id="phone" name="phone" required="required" maxLength="10"
                minLength="10">
            </div>
          </div> -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Upload Certificate:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-picture-o"
                    aria-hidden="true"></i></span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="pdf" id="pdf">
                <label class="custom-file-label" for="userphoto">Choose file</label>
              </div>
            </div>

          </div>

        </div>
        <div class="modal-footer">
         
          <button type="submit"  name="submit" class="btn btn-success" id="upload">Submit</button>
         
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Certificate Id</th>
      <th scope="col">Name</th>
      <th scope="col">Download </th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php  $sql="SELECT * from edodwaja_certi";
      $query=mysqli_query($conn,$sql);
       $rows = mysqli_num_rows($query);
       
       
        while ($info=mysqli_fetch_array($query)) { ?>
   
     <tr>
                <th scope="row"><?php echo $info["certi_id"]; ?></th>
                <td><?php echo $info["certi_name"]; ?></td>
                <td><a class="btn btn-lg btn-success" download href="<?php echo $info['certi_pdf'] ; ?>" > Download Now</a></td>
                              <td><a class="btn btn-lg btn-danger" href="<?php echo "delete.php?id=",$info['id'],"&submit=" ; ?>" > Delete</a></td>
  
               
              </tr>
             <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>

<!-- add/edit form modal end -->
