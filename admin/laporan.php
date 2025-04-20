<?php
include "header.php";
?>

<h2 class="mb.4">Laporan</h2>
<a href="laporan-cetak.php" class="btn btn-primary" target="_blank"><span class="fa fa-print"></span> Cetak Data</a>
    <br>
<hr>
<br>

<table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Alternatif</th>
                <th class="text-center">Nilai</th>
                <th class="text-center">Rangking</th>
            </tr>
        </thead>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY rangking");
        $no = 1;
        while ($a = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>
                    <td class="text-center"><?php echo $a['nilai_pm'] ?></td>
                    <td class="text-center"><?php echo $a['rangking'] ?></td>

                </tr>
            </tbody>

        <?php } ?>
    </table>
</div>
</div>