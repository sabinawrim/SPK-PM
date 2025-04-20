<?php
include 'header.php';
?>

<h2 class="mb-4">Metode</h2>
<hr>
<br>

<div class="shadow p-5">

    <h3>
        <center>
            <strong>
                HASIL ANALISA METODE PROFILE MATCHING
            </strong>
        </center>
    </h3>
    <hr>
    <br>
    <br>

    <h4>Nilai Keputusan</h4>
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
                        while ($dtn = mysqli_fetch_array($cekn)) {

                            echo " <td class='text-center'>$dtn[nsub]</td>";
                        }
                    } ?>
                </tr>
            </tbody>

        <?php } ?>
    </table>
    <bar>
        <h4>Nilai Konversi Keputusan</h4>
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
                            $cekn = mysqli_query($conn, "SELECT a.nilai_subkriteria as nsub FROM tbl_subkriteria a, tbl_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$a[id_alternatif]' ORDER BY b.id_kriteria");
                            while ($dtn = mysqli_fetch_array($cekn)) {

                                echo " <td class='text-center'>$dtn[nsub]</td>";
                            }
                        } ?>
                    </tr>
                </tbody>

            <?php } ?>

            <tr>
                <td colspan="2"><b>Kriteria</b></td>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                while ($b = mysqli_fetch_array($data)) {
                    echo "<td class='text-center'><b>$b[bobot_kriteria]</b></td>";
                } ?>
            </tr>
        </table>
        <br>

        <h4>Nilai Normalisasi GAP</h4>
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
                            $cekn = mysqli_query($conn, "SELECT a.nilai_subkriteria as nsub, b.id_kriteria as id_kriteria FROM tbl_subkriteria a, tbl_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$a[id_alternatif]' ORDER BY b.id_kriteria");
                            while ($aa = mysqli_fetch_array($cekn)) { //sblmnya $dtn


                                $dkriteria = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$aa[id_kriteria]'");
                                $dk = mysqli_fetch_array($dkriteria);
                                $nbobot = $dk['bobot_kriteria'];
                                //normalisasi bobot
                                $nnormalisasi = $aa['nsub'] - $nbobot;
                                echo " <td class='text-center'>$nnormalisasi</td>";
                            }
                        } ?>
                    </tr>
                </tbody>

            <?php } ?>
        </table>
        <br>

        <h4>Nilai Pemetakan GAP</h4>
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
                            $cekn = mysqli_query($conn, "SELECT a.nilai_subkriteria as nsub, b.id_kriteria as id_kriteria FROM tbl_subkriteria a, tbl_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$a[id_alternatif]' ORDER BY b.id_kriteria");
                            while ($aa = mysqli_fetch_array($cekn)) {
                                $dkriteria = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$aa[id_kriteria]'");
                                $dk = mysqli_fetch_array($dkriteria);
                                $nbobot = $dk['bobot_kriteria'];
                                //normalisasi bobot
                                $nnormalisasi = $aa['nsub'] - $nbobot;

                                //pemetakan gap
                                if ($nnormalisasi == 0) {
                                    $npemetakan = '5';
                                } elseif ($nnormalisasi == 1) {
                                    $npemetakan = '4.5';
                                } elseif ($nnormalisasi == -1) {
                                    $npemetakan = '4';
                                } elseif ($nnormalisasi == 2) {
                                    $npemetakan = '3.5';
                                } elseif ($nnormalisasi == -2) {
                                    $npemetakan = '3';
                                } elseif ($nnormalisasi == 3) {
                                    $npemetakan = '2.5';
                                } elseif ($nnormalisasi == -3) {
                                    $npemetakan = '2';
                                } elseif ($nnormalisasi == 4) {
                                    $npemetakan = '1.5';
                                } elseif ($nnormalisasi == -4) {
                                    $npemetakan = '1';
                                }

                                echo "<td class='text-center'> $nnormalisasi</td>";
                            }
                        } ?>
                    </tr>
                </tbody>

            <?php } ?>
        </table>
        <br>

        <h4>Nilai Pengelompokan CF dan SF</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Alternatif</th>

                    <?php
                    $ktr = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                    while ($ket = mysqli_fetch_array($ktr)) {
                        echo "<th class='text-center'>$ket[nama_kriteria] - $ket[tipe_kriteria]</th>";
                    } ?>

                    <th class="text-center">CF</th>
                    <th class="text-center">SF</th>

                </tr>
            </thead>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
            $no = 1;
            while ($a = mysqli_fetch_array($data)) {
                $ncf = 0.0;
                $nsf = 0.0;
            ?>
                <tbody>
                    <tr>
                        <?php $cek = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_alternatif='$a[id_alternatif]'");
                        $cekdt = mysqli_fetch_array($cek);

                        if (empty($cekdt['id_alternatif'])) {
                        } else { ?>

                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>

                        <?php //dari sini
                            $cekn = mysqli_query($conn, "SELECT a.nilai_subkriteria as nsub, b.id_kriteria as id_kriteria, c.tipe_kriteria as tipe_kriteria FROM tbl_subkriteria a, tbl_nilai b, tbl_kriteria c WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$a[id_alternatif]' AND b.id_kriteria=c.id_kriteria ORDER BY b.id_kriteria");
                            while ($aa = mysqli_fetch_array($cekn)) {

                                $dkriteria = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$aa[id_kriteria]'");
                                $dk = mysqli_fetch_array($dkriteria);
                                $nbobot = $dk['bobot_kriteria'];
                                //normalisasi bobot
                                $nnormalisasi = $aa['nsub'] - $nbobot;

                                //pemetakan gap
                                if ($nnormalisasi == 0) {
                                    $npemetakan = '5';
                                } elseif ($nnormalisasi == 1) {
                                    $npemetakan = '4.5';
                                } elseif ($nnormalisasi == -1) {
                                    $npemetakan = '4';
                                } elseif ($nnormalisasi == 2) {
                                    $npemetakan = '3.5';
                                } elseif ($nnormalisasi == -2) {
                                    $npemetakan = '3';
                                } elseif ($nnormalisasi == 3) {
                                    $npemetakan = '2.5';
                                } elseif ($nnormalisasi == -3) {
                                    $npemetakan = '2';
                                } elseif ($nnormalisasi == 4) {
                                    $npemetakan = '1.5';
                                } elseif ($nnormalisasi == -4) {
                                    $npemetakan = '1';
                                }
                                echo "<td class='text-center'> $npemetakan</td>";

                                //cek tipe kriteria
                                if ($aa['tipe_kriteria'] == 'Core Factor') {
                                    $ncf += $npemetakan;
                                } elseif ($aa['tipe_kriteria'] == 'Secondary Factor') {
                                    $nsf += $npemetakan;
                                }
                                //cek item
                                $ceki = mysqli_query($conn, "SELECT COUNT(*) as nt_cf FROM tbl_kriteria WHERE tipe_kriteria='Core Factor'");
                                $ci = mysqli_fetch_array($ceki);
                                $cekii = mysqli_query($conn, "SELECT COUNT(*) as nt_sf FROM tbl_kriteria WHERE tipe_kriteria='Secondary Factor'");
                                $cii = mysqli_fetch_array($cekii);

                                //hitung nilai cf dan sf
                                $nilai_cf = $ncf / $ci['nt_cf'];
                                $nilai_sf = $nsf / $cii['nt_sf']; // ini line 329 yg katanya di pesan eror
                            }

                            echo "<td class='text-center'> $nilai_cf</td>";
                            echo "<td class='text-center'> $nilai_sf</td>";
                        } ?>
                    </tr>
                </tbody>

            <?php } ?>
        </table>
        <br>


        <h4>Nilai Total</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">CF</th>
                    <th class="text-center">SF</th>
                    <th class="text-center">NTotal</th>

                </tr>
            </thead>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
            $no = 1;
            while ($a = mysqli_fetch_array($data)) {
                $ncf = 0.0; // $scnf
                $nsf = 0.0; // $scsf
            ?>
                <tbody>
                    <tr>
                        <?php $cek = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_alternatif='$a[id_alternatif]'");
                        $cekdt = mysqli_fetch_array($cek);

                        if (empty($cekdt['id_alternatif'])) {
                        } else { ?>

                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>

                        <?php
                            $cekn = mysqli_query($conn, "SELECT a.nilai_subkriteria as nsub, b.id_kriteria as id_kriteria, c.tipe_kriteria as tipe_kriteria FROM tbl_subkriteria a, tbl_nilai b, tbl_kriteria c WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$a[id_alternatif]' AND b.id_kriteria=c.id_kriteria ORDER BY b.id_kriteria");
                            while ($aa = mysqli_fetch_array($cekn)) {

                                $dkriteria = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$aa[id_kriteria]'");
                                $dk = mysqli_fetch_array($dkriteria);
                                $nbobot = $dk['bobot_kriteria'];
                                //normalisasi bobot
                                $nnormalisasi = $aa['nsub'] - $nbobot;

                                //pemetakan gap
                                if ($nnormalisasi == 0) {
                                    $npemetakan = '5';
                                } elseif ($nnormalisasi == 1) {
                                    $npemetakan = '4.5';
                                } elseif ($nnormalisasi == -1) {
                                    $npemetakan = '4';
                                } elseif ($nnormalisasi == 2) {
                                    $npemetakan = '3.5';
                                } elseif ($nnormalisasi == -2) {
                                    $npemetakan = '3';
                                } elseif ($nnormalisasi == 3) {
                                    $npemetakan = '2.5';
                                } elseif ($nnormalisasi == -3) {
                                    $npemetakan = '2';
                                } elseif ($nnormalisasi == 4) {
                                    $npemetakan = '1.5';
                                } elseif ($nnormalisasi == -4) {
                                    $npemetakan = '1';
                                }

                                //cek tipe kriteria
                                if ($aa['tipe_kriteria'] == 'Core Factor') {
                                    $ncf += $npemetakan;
                                } elseif ($aa['tipe_kriteria'] == 'Secondary Factor') {
                                    $nsf += $npemetakan;
                                }
                                //cek item
                                $ceki = mysqli_query($conn, "SELECT COUNT(*) as nt_cf FROM tbl_kriteria WHERE tipe_kriteria='Core Factor'");
                                $ci = mysqli_fetch_array($ceki);
                                $cekii = mysqli_query($conn, "SELECT COUNT(*) as nt_sf FROM tbl_kriteria WHERE tipe_kriteria='Secondary Factor'");
                                $cii = mysqli_fetch_array($cekii);

                                //hitung nilai cf dan sf
                                $nilai_cf = $ncf / $ci['nt_cf'];
                                $nilai_sf = $nsf / $cii['nt_sf'];

                                //hitung nilai total
                                $nilai_total = (60 * $nilai_cf) + (40 * $nilai_sf);
                            }

                            echo "<td class='text-center'> $nilai_cf</td>";
                            echo "<td class='text-center'> $nilai_sf</td>";
                            echo "<td class='text-center'> $nilai_total</td>";

                            //ambil nilai total
                            mysqli_query($conn, "UPDATE tbl_alternatif SET nilai_pm='$nilai_total' WHERE id_alternatif='$a[id_alternatif]'");
                        } ?>
                    </tr>
                </tbody>

            <?php } ?>
        </table>
        <br>

        <?php
        //set rangking
        $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY nilai_pm DESC");
        $rank = 1;
        while ($a = mysqli_fetch_array($data)) {
            mysqli_query($conn, "UPDATE tbl_alternatif SET rangking='$rank' WHERE id_alternatif='$a[id_alternatif]'");
            $rank++;
        } ?>


        <h4>Nilai Rangking</h4>
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
</div>