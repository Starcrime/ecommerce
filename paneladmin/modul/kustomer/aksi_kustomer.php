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

// Hapus kustomer
 if ($act=='hapus'){
  mysql_query("DELETE FROM kustomer WHERE id_kustomer='$_GET[id]'");
  header('location:../../index.php?p=kustomer');
 }

// Input kustomer
elseif ($act=='input'){
  $kustomer_seo = seo_title($_POST['nama_kustomer']);
  mysql_query("INSERT INTO kustomer(nama_lengkap,alamat,password,telpon,email) VALUES('$_POST[nama_lengkap]','$_POST[alamat]','$_POST[password]','$_POST[telpon]','$_POST[email]')");
  header('location:../../index.php?p=kustomer');
}

// Update kustomer
elseif ($act=='update'){
  $kustomer_seo = seo_title($_POST['nama_kustomer']);
  mysql_query("UPDATE kustomer SET nama_lengkap = '$_POST[nama_lengkap]', password = '$_POST[password]', alamat = '$_POST[alamat]', telpon = '$_POST[telpon]', email = '$_POST[email]' WHERE id_kustomer = '$_POST[id]'");
  header('location:../../index.php?p=kustomer');
}
  header('location:../../index.php?p=kustomer');

}

// Update kategori
//elseif ($act=='update'){
//  $sekilasinfo_seo = seo_title($_POST['info']);
//  mysql_query("UPDATE sekilasinfo SET info = '$_POST[info]', tgl_posting='$tgl_posting' WHERE id_sekilas = '$_POST[id]'");
//  header('location:../../index.php?p=sekilasinfo');

//elseif ($act=='update'){
//  $ym_seo = seo_title($_POST['nama_ym']);
//  mysql_query("UPDATE ym SET nama = '$_POST[nama]', username='$_POST[username]' WHERE id = '$_POST[id]'");
//  header('location:../../index.php?p=ym')

?>
