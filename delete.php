<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
  </head>
  <body>
   
      <?php
      include 'db.php';
      if(isset($_GET["submit"])){
      $certi_id = $_GET["id"];
     
      }

      $sql="DELETE  from edodwaja_certi where id = '$certi_id'";
      $query=mysqli_query($conn,$sql);
       $rows = mysqli_num_rows($query);

       if($query){
           echo "Record is Deleted ";
           
        $view =   "
        <div class = 'container text-center ' style  =' margin:auto; width='25%''>
        <h2 class = 'text-danger' > Record Deleted  for  certificate id : $certi_id  </h2>
        <a class= 'btn btn-lg btn-primary' href = 'index.php'>Home</a>
        </div>

        
        
        ";
        echo $view;

       }
     
  
      ?>

    </div>

  </body>
</html>