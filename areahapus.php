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
    include "includes/config.php";
    if(isset($_GET['hapus']))
    {
        $kodedestinasi = $_GET['hapus'];
        mysqli_query($connection, "DELETE FROM area
            WHERE areaID = '$kodedestinasi'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='area.php'</script>";

    }
?>
</div>
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_close($connection);
ob_end_flush();

?>