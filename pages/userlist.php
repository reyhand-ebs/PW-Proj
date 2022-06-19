<!DOCTYPE html>

<head>
    <title>Tubirit | User List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container py-5 pb-5">
        <h2 class="pb-5"><strong>User List</strong></h2>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Role</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                require_once('./class/class.user.php');

                $objUser = new User();
                $arrayResult = $objUser->SelectAllUser();

                if (count($arrayResult) == 0) {
                    echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
                } else {
                    $no = 1;
                    foreach ($arrayResult as $dataUser) {
                        echo '<tr>';
                        echo '<th scope="row" class="text-center">' . $no . '</th>';
                        echo '<td class="text-center">' . $dataUser->userid . '</td>';
                        echo '<td class="text-center">' . $dataUser->role . '</td>';
                        echo '<td>' . $dataUser->fname . ' ' . $dataUser->lname . '</td>';
                        echo '<td>' . $dataUser->email . '</td>';
                        echo '<td>' . $dataUser->nohp . '</td>';
                        echo '<td class="text-center"><a class="btn btn-warning btn-sm"  href="userlist.php?p=user&iduser=' . $dataUser->userid . '">Edit</a> |
   					          <a class="btn btn-danger btn-sm"  href="dashboardadmin.php?p=deleteuser&iduser=' . $dataUser->userid . '" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a>
							  </td>';
                        echo '</tr>';
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>