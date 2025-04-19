<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'simpan') {
        include '../assets/conn/config.php';
        $id_alternatif = $_POST['id_alternatif'];

        $cek = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_alternatif='$id_alternatif'");
        $cekdt = mysqli_num_rows($cek);

        if ($cekdt > 0) {
            header('location:nilai-simpan.php?pesan=gagal');
        } else {

            $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
            while ($result = mysqli_fetch_array($data)) {
                $idk = $result['id_kriteria'];
                $ids = $_POST[$idk];

                mysqli_query($conn, "INSERT into tbl_nilai(id_alternatif,id_kriteria,id_subkriteria)VALUES('$id_alternatif','$idk','$ids')");
            }

            header('location:nilai.php');
        }
    }
}
include 'header.php';
?>

<h2 class="mb-4">Nilai | Tambah Data</h2>
<hr>
<br>

<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'gagal') {
        echo "<div style='margin-bottom:-1px; ' class='alert alert-danger' role='alert'><span class='fa fa-times'></span> Data gagal tersimpan !!!</div><br>";
    }
}
?>

<div class="shadow p-5">
    <form action="nilai-simpan.php?aksi=simpan" method="POST">
        <div class="form-grup">
            <label>Nama Alternatif</label>
            <select name="id_alternatif" class="txt form.control">
                <option select disable>-Pilih-</option>
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
            echo "
            <div class='form-grup mt - 3'>
            <label>$b[nama_kriteria]</label>

            <select name='$idk' class='txt form.control'>
            <option selected disable>-Pilih-</option>";

            $dtsk = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='$b[id_kriteria]' ORDER BY nilai_subkriteria ASC");
            while ($c = mysqli_fetch_array($dtsk)) {

                echo "
                <option value='$c[id_subkriteria]'>$c[nama_subkriteria] - $c[nilai_subkriteria]</option>";
            }
            echo "
        </select><div>";
        } ?>



        <br>
        <br>
        <input type="submit" , class="btn btn-primary" value="Simpan">
        <a href="nilai.php" class="btn btn-dark">Batal</a>

    </form>
</div>

</div>
</div>