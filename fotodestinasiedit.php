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
    if(isset($_POST['Batal']))
    {
        header("location:fotodestinasi.php");
    }
    
    if(isset($_POST['Ubah']))
    {
        $kodefoto = $_POST['inputkode'];
        $namafoto = $_POST['inputnama'];
        $kodedestinasi = $_POST['kodedestinasi'];

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        if(Empty($nama))
        {
            mysqli_query($connection, "UPDATE fotodestinasi SET fotonama='$namafoto', destinasiID='$kodedestinasi'
                WHERE fotoID = '$kodefoto'");
            header("location:fotodestinasi.php");
        } 
        
        else

        $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

        // PERIKSA EKSTENSI FILE HARUS JPG ATAU jpg
        if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
        {
            move_uploaded_file($file_tmp, 'images/'.$nama); // unggah file ke folder images
            mysqli_query($connection, "UPDATE fotodestinasi SET fotonama='$namafoto', destinasiID='$kodedestinasi', fotofile='$nama'
                WHERE fotoID = '$kodefoto'");
            header("location:fotodestinasi.php");
        }
    }

    $datadestinasi = mysqli_query($connection, "select * from destinasi");
    $kodefoto = $_GET["ubafoto"];
    $editfoto = mysqli_query($connection, "SELECT * FROM fotodestinasi
       WHERE fotoID = '$kodefoto'");
    $rowedit = mysqli_fetch_array($editfoto);
    
    $editdestinasi = mysqli_query($connection, "SELECT * FROM destinasi, fotodestinasi
        WHERE fotoID = '$kodefoto' and destinasi.destinasiID = fotodestinasi.destinasiID");

    $rowedit2 = mysqli_fetch_array($editdestinasi);

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
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Edit Photo Destinasi Wisata</h1>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodefoto" name="inputkode" value="<?php echo $rowedit["fotoID"]?>" readonly>
                </div>            
            </div>
        
            <div class="form-group row">
                <label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namafoto" name="inputnama" value="<?php echo $rowedit["fotonama"]?>">
                </div>            
            </div>

            <div class="form-group row">
                <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                <div class="col-sm-10">
                <select class="form-control" id="namadestinasi" name="kodedestinasi">
                    <option value="<?php echo $rowedit["destinasiID"]?>"><?php echo $rowedit['destinasiID']?> <?php echo $rowedit2['destinasinama']?></option>
                <?php while($row = mysqli_fetch_array($datadestinasi))
                    { ?>
                        <option value="<?php echo $row ["destinasiID"]?>">
                            <?php echo $row ["destinasiID"]?>
                            <?php echo $row ["destinasinama"]?>
                        </option>
                    <?php } ?>

                </select>        
                </div>            
            </div>
            
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file">
                    <img src="images/<?php echo $rowedit['fotofile']?>" style="width: 200px; height: 100px;">
                    <p class="help-block">Field ini digunakan untuk unggah file</p>
                </div>            
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="Ubah" class="btn btn-primary" value="Ubah">
                        <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">

                        
                    </div>
                
            </div>
            
        </form>

    </div>
    <div class="col-sm-1"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Photo Destinasi Wisata</h1>
                </div>
            </div>
        

        <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Photo</th>
                    <th>Nama Photo Wisata</th>
                    <th>Kode Destinasi</th>
                    <th>Photo Destinasi</th>

                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $query = mysqli_query($connection, "select * from fotodestinasi");
                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['fotoID'];?></td>
                        <td><?php echo $row['fotonama'];?></td>
                        <td><?php echo $row['destinasiID'];?></td>
                        <td>
                            <?php if(is_file("images/".$row['fotofile']))
                            { ?>
                                <img src="images/<?php echo $row['fotofile']?>" width="80">
                                <?php } else
                                    echo "<img src'images/'fit.png' widht = '80'>"
                                ?>
                        </td>
                        <td>
<a href="fotodestinasiedit.php?ubafoto=<?php echo $row["fotoID"]?>"
   class="btn btn-success btn-sm" title="EDIT">

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
  </svg>
</a>
</td>


<td>
<a href="fotodestinasihapus.php?hapusfoto=<?php echo $row["fotoID"]?>"
   class="btn btn-danger btn-sm" title="DELETE">
   
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </svg>
</a>
</td>
                </tr>
            <?php $nomor = $nomor + 1;?>
            <?php }?>
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