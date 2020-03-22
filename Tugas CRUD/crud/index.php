<?php

require_once ("../crud/php/component.php");
require_once ("../crud/php/operation.php");

?>

<!doctype html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Books </title>

    <script src="https://kit.fontawesome.com/0b4391e298.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Costum stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded">
            <i class="fas fa-swatchbook"></i> Profil Karyawan </h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "id_karyawan",setID());?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Nama Karyawan", "nama_karyawan", "");?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Divisi", "divisi", "");?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-gavel'></i>","Umur", "umur", "");?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "dat-toggle='tooltip' data-placement='bottom' title='Create'");?>
                    <?php buttonElement("btn-reade", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip' data-placement='bottom' title='Read'");?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-user-edit'></i>", "update", "dat-toggle='tooltip' data-placement='bottom' title='Update'");?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-user-times'></i>", "delete", "dat-toggle='tooltip' data-placement='bottom' title='Delete'");?>
                    <?php deleteBtn();?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Divisi</th>
                    <th>Umur</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php


                if(isset($_POST['read'])){
                    $result = getData();

                if($result){
                    while($row = mysqli_fetch_assoc($result)){?>

                        <tr>
                            <td data-id="<?php echo $row['id_karyawan']?>"><?php echo $row['id_karyawan']; ?></td>
                            <td data-id="<?php echo $row['id_karyawan']?>"><?php echo $row['nama_karyawan']; ?></td>
                            <td data-id="<?php echo $row['id_karyawan']?>"><?php echo $row['divisi']; ?></td>
                            <td data-id="<?php echo $row['id_karyawan']?>"><?php echo $row ['umur']; ?></td>
                            <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id_karyawan']?>"></i></td>
                        </tr>

                <?php
                    }
                }
                }

                ?>
                </tbody>
            </table>
        </div>

    </div>
</main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="../crud/php/main.js"></script>
</body>
</html>