<?php
require_once('./class/class.user.php');

$objUser = new User();
if (isset($_POST['setting'])) {
    $objUser->userid = $_POST['userid'];
    $objUser->idrole = $_POST['idrole'];
    $isSuccessUpload = false;

    if (file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $lokasifile = $_FILES['foto']['tmp_name'];
        $nama_file =  $_FILES['foto']['name'];
        $extension  = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        $objUser->foto   = $objUser->userid . '.' . $extension;
        $folder = './img/';
        $isSuccessUpload = move_uploaded_file($lokasifile, $folder . $objUser->foto);
    } else
        $isSuccessUpload = true;

    if ($isSuccessUpload) {
        $objUser->userid = $_SESSION["userid"];
        $objUser->email = $_POST["email"];
        $objUser->fname = $_POST['fname'];
        $objUser->lname = $_POST['lname'];
        $objUser->password = $_POST['password'];
        $objUser->nohp = $_POST['nohp'];

        $objUser->UpdateUser();

        echo "<script> alert('$objUser->message'); </script>";
        echo '<script> window.location = "' . $_SERVER['REQUEST_URI'] . '";</script>';
    }
} else if (isset($_GET['userid'])) {
    $objUser->iduser = $_GET['userid'];
    $objUser->SelectOneUser();
}
?>

<head>
    <title>Tubirit | Profile Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container py-5 pb-5">
        <h2 class="pb-5"><span class="text"><strong>Profile Settings</strong></span></h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    if ($objUser->foto != null)
                        echo '<img class="img-rounded img-responsive" src="img/' . $objUser->foto . '">';
                    else
                        echo '<img class="img-rounded img-responsive" src="img/default.png">';
                    ?>
                    <input type="hidden" name="photo" value="<?php echo $objUser->foto; ?>">
                    <br><br>
                    <span>Browse Picture</span>
                    <input type="file" name="foto"></input>
                </div>
                <div class="col-md-4">
                    <table class="table" border="0">
                        <tr>
                            <td>User ID</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="userid" readonly value="<?php echo $objUser->userid = $_SESSION['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="fname" value="<?php echo $objUser->fname; ?>"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="lname" value="<?php echo $objUser->lname; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" class="form-control" name="email" value="<?php echo $objUser->email; ?>"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class="table" border="0">
                        <tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="nohp" value="<?php echo $objUser->nohp; ?>"></td>
                        </tr>
                        <tr>
                            <td>Change Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" name="changepassword" value="<?php echo $objUser->password; ?>"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" name="confirmpassword" value=""></td>
                        </tr>
                    </table>
                </div>
            </div>
            </br>
            <input type="submit" class="btn btn-success" value="Update Profile" name="btnUpdate"><br><br>
        </form>
    </div>
</body>