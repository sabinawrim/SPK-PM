<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'ubah') {
        include '../assets/conn/config.php';
        $id_alternatif = $_POST['id_alternatif'];
        mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");

        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($result = mysqli_fetch_array($data)) {
            $idk = $result['id_kriteria'];
            $ids = $_POST[$idk];

            mysqli_query($conn, "INSERT into tbl_nilai(id_alternatif,id_kriteria,id_subkriteria)VALUES('$id_alternatif','$idk','$ids')");
        }

        header('location:nilai.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Nilai/ Ubah Data</h2>
<hr>
<br>

<div class="shadow p-5">

    <form action="nilai-ubah.php?aksi=ubah" method="POST">
        <input type="hidden" name="id_alternatif" value="<?= $a['id_alternatif'] ?>">
        <div class="form-grup">
            <label>Nama Alternatif</label>
            <select name="id_alternatif" class="txt form.control">


                <?php
                $dta = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$_GET[id_alternatif]'");
                $aa = mysqli_fetch_array($dta);
                ?>

                <option selected value="<?= $aa['id_alternatif'] ?>"><?= $aa['nama_alternatif'] ?></option>
                <?php
                $dtal = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
                while ($a = mysqli_fetch_array($dtal)) {
                    echo "
                        <option value='$a[id_alternatif]'>$a[nama_alternatif]</option>";
                } ?>

            </select>
        </div>


        <?php
        $dtkr = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER by id_kriteria");
        while ($b = mysqli_fetch_array($dtkr)) {
            $idk = $b['id_kriteria'];

            $cekn = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_alternatif='$_GET[id_alternatif]' AND id_kriteria='$idk'");
            $n = mysqli_fetch_array($cekn);
            $ids = $n['id_subkriteria'];
            echo "
            <div class='form-grup mt - 3'>
            <label>$b[nama_kriteria]</label>

            <select name='$idk' class='txt form.control'>";

            $dtsk = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='$b[id_kriteria]' ORDER BY nilai_subkriteria ASC");
            while ($c = mysqli_fetch_array($dtsk)) {

                if ($ids == $c['id_subkriteria']) {
                    echo "
                    <option selected value='$c[id_subkriteria]'>$c[nama_subkriteria] - $c[nilai_subkriteria]</option>";
                } else {
                    echo "
                <option value='$c[id_subkriteria]'>$c[nama_subkriteria] - $c[nilai_subkriteria]</option>";
                }
            }
            echo "
        </select><div>";
        } ?>

        <br>
        <br>

        <input type="submit" class="btn btn-primary" value="Simpan">
        <a href="nilai.php" class="btn btn-dark">Batal</a>

    </form>
</div>

</div>
</div>