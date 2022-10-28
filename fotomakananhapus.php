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
    $hapusfoto=mysqli_query($connection,"SELECT * FROM makanan
    WHERE foodID ='$fotokode'");
    $hapus= mysqli_fetch_array($hapusfoto);
    $namafile=$hapus['foodfoto'];

    mysqli_query($connection,"DELETE FROM makanan
    WHERE foodID='$fotokode'");

    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='fotomakanan.php'</script>";
}
?>
</div>
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_close($connection);
ob_end_flush();

?>