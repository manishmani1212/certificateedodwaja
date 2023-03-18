<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="https://edodwaja.com/"><img href="logo.png"></a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" href="edodwaja.com" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edodwaja Certificates
    </title>
</head>
<body>
    
<? include "db.php";

 if(isset($_GET["submit"])){
    $certi_id = $_GET["id"];
    echo $certi_id;
    $sql="SELECT * from edodwaja_certi where certi_id = '$certi_id'";
    $query=mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);

    if($rows !=0){
        while ($info=mysqli_fetch_array($query)) {
            echo $info['id'];
            echo $info['certi_name'];
            echo $info['certi_id'];
            echo $info['certi_pdf'];
               
        
    
         
          }
    
          

    }
    else{
        echo "No Data Found";
    }
   
    }

?>
<div class="container-fluid">
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
<div class="conatiner">
    <h2 class="text-center my-2 text-primary">Certificate Verficiation</h2>
    <p class="text-center m-1 text-warning">Find your verified Certificates here...</p>
    <div class="card " >
  <div class="card-body ">
    <!-- <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <form class="text-center form-floating" method="GET" action="view.php" >
  <input type="text" class="form-control" id="id"  name = "id"  required>
  <label for="floatingInputValue">Enter your Certificate Id:</label>
  <button type="submit" name="submit" class="btn btn-primary btn-lg m-3">Verfiy</button>
     </form>

  </div>
</div>
    

</div>
<div 
 >

</div>

</div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>