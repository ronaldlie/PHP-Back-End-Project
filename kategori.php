<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISATA</title>
</head>

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

    if(isset($_POST['Simpan'])) {

        $kategorikode = $_POST['inputkode'];
        $kategorinama = $_POST['inputnama'];
        $kategoriket = $_POST['inputket'];
        $kategoriref = $_POST['inputref'];

        mysqli_query($connection, "insert into kategori values ('$kategorikode', 
                        '$kategorinama', '$kategoriket', '$kategoriref')");
        
        header("location:kategori.php");
    }
        
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi Wisata</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>


<div class="row">
<div class="col-sm-1">

</div>
<div class="col-sm-10">

            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Input Kategori Wisata</h1> 
                </div>
            </div> <!-- penutup jumbotron -->
<form method="POST">
<div class="form-group row">
<label for="kodekategori" class="col-sm-2 col-form-label">Kode</label>
<div class="col-sm-10">
  <input type="text" class="form-control" id="kodekategori" name="inputkode" placeholder="kode kategori" maxlength="4" required>
</div>
</div>

<div class="form-group row">
<label for="namakategori" class="col-sm-2 col-form-label">Nama</label>
<div class="col-sm-10">
  <input type="text" class="form-control" name="inputnama" id="namakategori" placeholder="Nama Kategori">
</div>
</div>

<div class="form-group row">
<label for="keterangankategori" class="col-sm-2 col-form-label">Keterangan</label>
<div class="col-sm-10">
  <input type="text" class="form-control" name="inputket" id="keterangankategori" placeholder="keterangan kategori">
</div>
</div>

<div class="form-group row">
<label for="refkategori" class="col-sm-2 col-form-label">Referensi</label>
<div class="col-sm-10">
  <input type="text" class="form-control" name="inputref" id="refkategori" placeholder="Referensi Kategori  ">
</div>
</div>

<div class="form-group row">
<div class="col-sm-2"></div>
<div class="col-sm-10">
    <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
    <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
</div>
</div>
</form>
</div>

<div class="col-sm-1">

</div>
</div> <!-- penutup class row -->

<!-- memulai dengan menampilkan data -->
<div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Kategori Wisata</h1>
                    <h2>Hasil Entri data pada Tabel Kategori</h2>
                </div>
            </div> <!-- penutup jumbotron -->

        <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Kategori</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Kategori">
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        </form>
          

            <table class="table table-hover table-danger">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Referensi</th>
                    </tr>

                </thead>

                <tbody>
                    <?php
                    if(isset($_POST["kirim"]))
                    {
                        $search = $_POST['search'];
                        $query = mysqli_query($connection, "select * from 
                        kategori where kategorinama like '%".$search."%'
                        or kategorinama like '%".$search."%'
                        or kategoriketerangan like '%".$search."%'
                        or kategorireferensi like '%".$search."%'");
                        // $query = mysqli_query($connection, "select * from kategori where kategorinama like '$search%'"); //huruf pertama
                    }else
                        {
                            $query = mysqli_query($connection, "select * from kategori");
                        }

                        $nomor = 1;
                        while ($row = mysqli_fetch_array($query))
                            { ?>
                                <tr>
                                    <td><?php echo $nomor;?></td>
                                    <td><?php echo $row['kategoriID'];?></td>
                                    <td><?php echo $row['kategorinama'];?></td>
                                    <td><?php echo $row['kategoriketerangan'];?></td>
                                    <td><?php echo $row['kategorireferensi'];?></td>                                   
                                </tr>
                        <?php $nomor = $nomor + 1; ?>
                        <?php  } ?>

                </tbody>
            </table>

        </div>
        <div class="col-sm-1"></div>
    </div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kodekategori').select2({
            allowClear : true,
            placeholder: "Pilih Kategori Wisata"
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kodearea').select2({
            allowClear : true,
            placeholder: "Pilih Area Wisata"
        });
    });
</script>

</div>
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_close($connection);
ob_end_flush();

?>
</html>