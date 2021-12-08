<!-- Main Sidebar Container -->
<?php
include('db_connection.php');
$msg = '';
if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'slider/' . $image;
    $sql = "select * from gallery_img where img_path='$path' ;";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
        echo '<script language="javascript">';
        echo 'alert("Image already available")';
        echo '</script>';
    } else {
        $sql = $con->query("INSERT INTO gallery_img (img_path) VALUES ('$path')");
        if ($sql) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            echo '<script language="javascript">';
            echo 'alert("Image Uploaded Successfully")';
            echo '<script>';
            echo     'function my() {';
            echo   'document.getElementById("blank").value = ""; }';
            echo  '</script>';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Image Upload Failed")';
            echo '</script>';
        }
    }
}
$result = $con->query("SELECT img_path from gallery_img")
?>

<div class="content-wrapper">


    <div class="table-wrapper" style="background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6" style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Gallery section</b></h2>

                    <!-- -->
                </div>
            </div>


        </div>


    </div>

    <div class="container" style="padding-top:0.5%; background-color:silver">
        <div class="row justify-content-center">
            <div class="col-lg-4 rounded px-4" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);">
                <h4 class="text-center text-light p-1">Select Image to Upload</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input id='blank' type="file" name="image" class="form-control p-1" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="upload" class="btn btn-success btn-block" value="Upload">
                            </div>
                            <!-- <div class="col-md-6">
                                <input type="submit" name="upload" class="btn btn-success btn-block" value="Upload">
                            </div> -->

                        </div>


                    </div>

                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-lg-10">

                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php
                        $i = 0;
                        foreach ($result as $row) {
                            $actives = '';
                            if ($i == 0) {
                                $actives = 'active';
                            }

                        ?>
                            <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<? $actives ?>"></li>

                        <?php
                            $i++;
                        }
                        ?>

                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        foreach ($result as $row) {
                            $actives = '';
                            if ($i == 0) {
                                $actives = 'active';
                            }

                        ?>
                            <div class="carousel-item <?= $actives; ?>">
                                <img src="<?= $row['img_path'] ?>" width="100%" height="400px">
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ./wrapper -->