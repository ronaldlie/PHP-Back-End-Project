<!DOCTYPE html>

<?php 
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
    header("location:login.php");
?>

<?php include "includes/config.php";?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISATA</title>
</head>
<body>
<?php  include "header.php";?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Profile Bioadata</h1>
        </div>
    </div>

    <div class="container">
    <div class="card" style="width: 70rem;">
  <img class="card-img-top" src="images/ronald.jpg" style="width: 200px; height:auto" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Ronald Lie</h5>
    <p class="card-text">Berkuliah di universitas Tarumanagara</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">NIM : 825200011</li>
    <li class="list-group-item">Date of Birth : 05 January 2003</li>
    <li class="list-group-item">Fakultas : Teknologi Informasi</li>
    <li class="list-group-item">Jurusan : Sistem Informasi</li>
  </ul>
  <div class="card-body">
    <a href="https://www.youtube.com/channel/UCtQO0LW_PcTV6xrtyccYKMw" class="card-link">Youtube</a>
    <a href="https://www.instagram.com/ronaldliee/" class="card-link">Instagram</a>
  </div>
</div>
    </div>



<?php include "footer.php";?>


</body>

<?php 
mysqli_close($connection);
ob_end_flush();

?>

</html>