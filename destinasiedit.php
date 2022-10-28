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

    if(isset($_POST['Edit'])) {
        if(isset($_REQUEST['inputkode'])) {
          $destinasikode = $_REQUEST['inputkode'];
        }

        if (!empty($destinasikode)) {
            $destinasikode = $_REQUEST['inputkode'];
        }
        else {
          die ("Anda harus memasukan kodenya");
        }

        $destinasinama = $_POST['inputnama'];
        $alamat = $_POST['alamat'];
        $kodekategori = $_POST['kodekategori'];
        $kodearea = $_POST["kodearea"];

        mysqli_query($connection, "UPDATE destinasi set destinasinama = '$destinasinama', 
        destinasialamat = '$alamat', kategoriID = '$kodekategori', areaID = '$kodearea'
            WHERE destinasiID = '$destinasikode'");
        header("location:destinasi.php");
    }
        
    $datakategori = mysqli_query($connection, "select * from kategori");
    $dataarea = mysqli_query($connection, "select * from area");

    // untuk menampilkan data pada form edit
    $kodedestinasi = $_GET["ubah"];
    $editdestinasi = mysqli_query($connection, "SELECT * FROM destinasi
    WHERE destinasiID = '$kodedestinasi'");
    $rowedit = mysqli_fetch_array($editdestinasi);

    $editkategori = mysqli_query($connection, "SELECT * 
        FROM destinasi, kategori
        WHERE destinasiID = '$kodedestinasi' and destinasi.kategoriID = kategori.kategoriID ");
    $rowedit2 = mysqli_fetch_array($editkategori);

    $editarea = mysqli_query($connection, "SELECT * 
        FROM destinasi, area
        WHERE destinasiID = '$kodedestinasi' and destinasi.areaID = area.areaID "); 
    $rowedit3 = mysqli_fetch_array($editarea);

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
                    <h1 class="display-4">Edit Destinasi Wisata</h1> 
                </div>
            </div> <!-- penutup jumbotron -->
<form method="POST">
<div class="form-group row">
<label for="kodedestinasi" class="col-sm-2 col-form-label">Kode</label>
<div class="col-sm-10">
  <input type="text" class="form-control" id="kodedestinasi" name="inputkode" value="<?php echo $rowedit["destinasiID"]?>">
</div>
</div>

<div class="form-group row">
<label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
<div class="col-sm-10">
  <input type="text" class="form-control" name="inputnama" id="namadestinasi" value="<?php echo $rowedit["destinasinama"]?>">
</div>
</div>

<div class="form-group row">
<label for="alamat" class="col-sm-2 col-form-label">Alamat Destinasi</label>
<div class="col-sm-10">
  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $rowedit["destinasialamat"]?>">
</div>
</div>

<div class="form-group row">
<label for="refkategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
<div class="col-sm-10">
<select class="form-control" id="kodekategori" name ="kodekategori">
<option value="<?php echo $rowedit["kategoriID"]?>"><?php echo $rowedit['kategoriID']?>
  <?php echo $rowedit2['destinasinama']?></option>
    <?php while($row = mysqli_fetch_array($datakategori)) 
    { ?>
            <option value="<?php echo $row["kategoriID"]?>">
                <?php echo $row["kategoriID"]?>
                <?php echo $row["kategorinama"]?>
            </option>
        <?php } ?>
    </select>
</div>
</div>

<div class="form-group row">
<label for="refkategori" class="col-sm-2 col-form-label">Area Wisata</label>
<div class="col-sm-10">
<select class="form-control" id="kodearea" name="kodearea">
<option value="<?php echo $rowedit["areaID"]?>"><?php echo $rowedit['areaID']?>
  <?php echo $rowedit3['areanama']?></option>
    <?php while($row = mysqli_fetch_array($dataarea)) 
    { ?>
            <option value="<?php echo $row["areaID"]?>">
                <?php echo $row["areaID"]?>
                <?php echo $row["areanama"]?>
            </option>
        <?php } ?>

    </select>
</div>
</div>

<div class="form-group row">
<div class="col-sm-2"></div>
<div class="col-sm-10">
    <input type="submit" class="btn btn-primary" value="Edit" name="Edit">
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
                    <h1 class="display-4">Daftar Destinasi Wisata</h1>
                    <h2>Hasil Entri data pada Tabel Destinasi</h2>
                </div>
            </div> <!-- penutup jumbotron -->

        <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Destinasi</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Destinasi">
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        </form>
          

            <table class="table table-hover table-danger">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Destinasi Wisata</th>
                        <th>Alamat Destinasi Wisata</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Kode Area</th>
                        <th>Nama Area</th>

                        <th colspan="2" style="text-align:center">Action</th>
                    </tr>

                </thead>

                <tbody>
                    <?php
                    if(isset($_POST["kirim"]))
                    {
                        $search = $_POST['search'];
                        $query = mysqli_query($connection, "select destinasi.*, kategori.kategoriID, kategori.kategorinama, 
                        area.areaID, area.areanama from destinasi, kategori, area where destinasinama like '%".$search."%'
                        and destinasi.kategoriID = kategori.kategoriID
                        and destinasi.areaID =  area.areaID");
                    }else
                        {
                            $query = mysqli_query($connection, "select destinasi.*, kategori.kategoriID, kategori.kategorinama, 
                            area.areaID, area.areanama from destinasi, kategori, area where
                            destinasi.kategoriID = kategori.kategoriID
                            and destinasi.areaID =  area.areaID");
                        }

                        $nomor = 1;
                        while ($row = mysqli_fetch_array($query))
                            { ?>
                                <tr>
                                    <td><?php echo $nomor;?></td>
                                    <td><?php echo $row['destinasiID'];?></td>
                                    <td><?php echo $row['destinasinama'];?></td>
                                    <td><?php echo $row['destinasialamat'];?></td>
                                    <td><?php echo $row['kategoriID'];?></td>
                                    <td><?php echo $row['kategorinama'];?></td>
                                    <td><?php echo $row['areaID'];?></td>
                                    <td><?php echo $row['areanama'];?></td>        
                                    
                    <!-- untuk icon edit dan delete -->
<td>
<a href="destinasiedit.php?ubah=<?php echo $row["destinasiID"]?>"
   class="btn btn-success btn-sm" title="EDIT">

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
  </svg>
</a>
</td>

<td>
<a href="destinasihapus.php?hapus=<?php echo $row["destinasiID"]?>"
   class="btn btn-danger btn-sm" title="DELETE">
   
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </svg>
</a>
</td>
                    <!-- untuk akhir icon edit dan delete -->
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