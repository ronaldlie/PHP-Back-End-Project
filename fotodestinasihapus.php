<?php 
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
    header("location:login.php");
?>

<?php  include "header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">


<?php
include "include/config.php";
if(isset($_GET['hapusfoto']))
{

    $fotokode=$_GET['hapusfoto'];
    $hapusfoto=mysqli_query($connection,"SELECT * FROM fotodestinasi
    WHERE fotoID ='$fotokode'");
    $hapus= mysqli_fetch_array($hapusfoto);
    $namafile=$hapus['fotofile'];

    mysqli_query($connection,"DELETE FROM fotodestinasi
    WHERE fotoID='$fotokode'");

    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='fotodestinasi.php'</script>";
}
?>
</div>
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_close($connection);
ob_end_flush();

?>