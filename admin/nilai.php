<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        include '../assets/conn/config.php';
        $id_alternatif = $_GET['id_alternatif'];
        mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");
        header('location:nilai.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Nilai</h2>
<hr>
<br>

<div class="shadow p-5">
    <a href="nilai-simpan.php" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
    <br>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Alternatif</th>

                <?php
                $ktr = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                while ($ket = mysqli_fetch_array($ktr)) {
                    echo "<th class='text-center'>$ket[nama_kriteria]</th>";
                } ?>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
        $no = 1;
        while ($a = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <?php $cek = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_alternatif='$a[id_alternatif]'");
                    $cekdt = mysqli_fetch_array($cek);

                    if (empty($cekdt['id_alternatif'])) {
                    } else { ?>

                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>

                        <?php
                        $cekn = mysqli_query($conn, "SELECT a.nama_subkriteria as nsub FROM tbl_subkriteria a, tbl_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$a[id_alternatif]' ORDER BY b.id_kriteria");
                        while ($aa = mysqli_fetch_array($cekn)) {

                            echo "<td class='text-center'>$aa[nsub]</td>";
                        } ?>

                        <td class="text-center">
                            <a href="nilai-ubah.php?id_alternatif=<?= $a['id_alternatif'] ?>" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                            <a href="nilai.php?id_alternatif=<?= $a['id_alternatif'] ?>&aksi=hapus" class="btn btn-dark"><span class="fa fa-trash"></span></a>
                        </td>

                    <?php } ?>
                </tr>
            </tbody>

        <?php } ?>
    </table>
</div>

</div>
</div>