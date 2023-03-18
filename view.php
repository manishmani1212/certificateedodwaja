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

      $sql="SELECT * from edodwaja_certi where certi_id = '$certi_id'";
      $query=mysqli_query($conn,$sql);
       $rows = mysqli_num_rows($query);

       if($rows == 0){
           echo "no data";
           
        $view =   "
        <div class = 'container text-center ' style  =' margin:auto; width='25%''>
        <h2 class = 'text-danger' >No Record Found for  certificate id : $certi_id try with correct certificate id </h2>
        <a class= 'btn btn-lg btn-primary' href = 'index.php'>Home</a>
        </div>

        
        
        ";
        echo $view;

       }
     
      else{
        
     
    
      while ($info=mysqli_fetch_array($query)) {
        // echo $info['id'];
        // echo $info['certi_name'];
        // echo $info['certi_id'];
        // echo $info['certi_pdf'];
       	
	

        ?>
   
        <div class="container m-5">
            <h2 class="text-center text-success"> <?php echo $info["certi_name"]; ?> your certificate is ready to download </h2>
            <embed type="application/pdf" src="<?php echo $info['certi_pdf'] ; ?>" width="100%" height="600px">
            <a class="btn btn-lg btn-success" download href="<?php echo $info['certi_pdf'] ; ?>" > Download Now</a>
        </div>
      
    <?php
      }
    }
      ?>

    </div>

  </body>
</html>