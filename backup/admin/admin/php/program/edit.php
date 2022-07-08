<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../layout/header.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include '../layout/sidebar.php';
        include '../koneksi.php';

        $id = $_GET['id'];
        $sql = mysqli_query($koneksi, "SELECT * FROM program WHERE id = '$id'");
        while ($data = mysqli_fetch_array($sql)) {
            $program = $data['program'];
        }
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="mt-5">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form id="form" action="proses_edit.php" method="post">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Edit Program</h1>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control form-control-user" id="nama" aria-describedby="emailHelp" placeholder="Nama Program..." value="<?= $program ?>"  required>
                                </div>
                                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                                <a href="#" onclick="document.getElementById('form').submit()" class="btn btn-primary btn-user btn-block">
                                    Simpan
                                </a>
                                <hr>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aas Gantenk 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
    include '../layout/footer.php';
    ?>

</body>

</html>