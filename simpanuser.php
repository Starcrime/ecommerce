<?php
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  //include "config/class_paging.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "hapus_orderfiktif.php";?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$kar1=strstr($_POST[email], "@");
$kar2=strstr($_POST[email], ".");

// Cek email kustomer di database
$cek_email=mysql_num_rows(mysql_query("SELECT email FROM kustomer WHERE email='$_POST[email]'"));
// Kalau email sudah ada yang pakai
if ($cek_email > 0){
echo "<script>window.alert('Email yang anda masukkan sudah digunakan')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=daftar'>";
}
elseif (empty($_POST[nama]) || empty($_POST[password]) || empty($_POST[alamat]) || empty($_POST[telpon]) || empty($_POST[email]) || empty($_POST[kota]) || empty($_POST[kode])){
  echo "<script>window.alert('Data yang anda isikan belum lengkap ')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=daftar'>";
}
elseif (!ereg("[a-z|A-Z]","$_POST[nama]")){
	echo "<script>window.alert('Nama tidak boleh diisi dengan angka atau simbol')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=daftar'>";

}
elseif (strlen($kar1)==0 OR strlen($kar2)==0){
	 echo "<script>window.alert('Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=daftar'>";
}
else{

// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");

if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$nama   = antiinjection($_POST['nama']);
$alamat = antiinjection($_POST['alamat']);
$telpon = antiinjection($_POST['telpon']);
$email = antiinjection($_POST['email']);
$password=md5($_POST['password']);

// simpan data kustomer 
mysql_query("INSERT INTO kustomer(nama_lengkap, password, alamat, telpon, email, id_kota) 
             VALUES('$nama','$password','$alamat','$telpon','$email','$_POST[kota]')");
			 
			 
 echo "<script>window.alert('Pendaftaran Berhasil, Klok OK untuk melanjtkan')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=daftar'>";

}

}
}
?>

</body>
</html>