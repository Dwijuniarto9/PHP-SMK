<?php

    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>


<h3>Insert Menu</h3>

<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group w-50">
        <label for="">Kategori</label><br>
        <select name="idkategori" id="">
            <?php foreach($row as $r): ?>
            <option value=" <?php echo $r['idkategori'] ?>"> <?php echo $r['kategori'] ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group w-50">
        <label for="">Nama Menu</label>
        <input type="text" name="menu" require placeholder="isi menu" class="form-control mt-3">
    </div>

    <div class="form-group mt-3">
        <label for="">Harga</label>
        <input type="text" name="harga" number require placeholder="isi harga" class="form-control mt-3">
    </div>

    <div class="form-group mt-3">
        <label for="">Gambar</label><br>
        <input type="file" name="gambar"> 
    </div>

    <div>
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary mt-3">
    </div>
    </form>
</div>


<?php
    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo "<h3>gambar kosong</h3>";
        }else{
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";

            move_uploaded_file ($temp,'../../upload/'.$gambar);
            $db->runSQL($sql);
            header("location:http://localhost/PHP-SMK/restoran/admin/?f=menu&m=select");
        }
    }
?>