<?php
include "../conf/koneksi.php";

$smt = $_GET['smt'];
$mapel = mysqli_query($connect, "SELECT * FROM mapel WHERE semester='$smt' order by id_mapel");
echo "<option>-- Pilih mapel --</option>";
while($k = mysqli_fetch_array($mapel)){
    echo "<option value=\"".$k['id_mapel']."\">".$k['nama_mapel']."</option>\n";
}
?>
