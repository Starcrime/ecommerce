<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$act=$_GET[act];

// Hapus Sekilas Info
if ($act=='hapus'){
  mysql_query("DELETE FROM sekilasinfo WHERE id_sekilas='$_GET[id]'");
  header('location:../../index.php?p=sekilasinfo');
}

// Input Sekilas info
elseif ($act=='input'){
  $sekilasinfo_seo = seo_title($_POST['info']);
  mysql_query("INSERT INTO sekilasinfo(info,tgl_posting) VALUES('$_POST[info]','$_POST[tgl_posting]')");
  header('location:../../index.php?p=sekilasinfo');
}

// Update kategori
elseif ($act=='update'){
  $sekilasinfo_seo = seo_title($_POST['info']);
  mysql_query("UPDATE sekilasinfo SET info = '$_POST[info]', tgl_posting='$tgl_posting' WHERE id_sekilas = '$_POST[id]'");
  header('location:../../index.php?p=sekilasinfo');
}
}
?>
