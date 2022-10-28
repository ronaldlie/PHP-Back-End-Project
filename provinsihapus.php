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
    $hapusfoto=mysqli_query($connection,"SELECT * FROM provinsi
    WHERE provinsiID ='$fotokode'");
    $hapus= mysqli_fetch_array($hapusfoto);
    $namafile=$hapus['provinsifoto'];

    mysqli_query($connection,"DELETE FROM provinsi
    WHERE provinsiID='$fotokode'");

    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='provinsi.php'</script>";
}
?>
</div>
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_close($connection);
ob_end_flush();

?>