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


if ($act=='hapus'){
  mysql_query("DELETE FROM orders WHERE id_orders='$_GET[id]'"); 
  header('location:../../media.php?p=order');
 }
 
elseif ($act=='update'){
	  $order_seo = seo_title($_POST['status_order']);

   // Update stok barang saat transaksi sukses (Lunas)
   if ($_POST[status_order]=='Lunas/Terkirim'){ 
    
      // Update untuk mengurangi stok 
      mysql_query("UPDATE produk,orders_detail SET produk.stok=produk.stok-orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk AND orders_detail.id_orders='$_POST[id]'");
	  
	  // Update untuk menambahkan produk yang dibeli (best seller = produk yang paling laris)
      mysql_query("UPDATE produk,orders_detail SET produk.dibeli=produk.dibeli+orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk AND orders_detail.id_orders='$_POST[id]'");

      // Update status order
      mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");
      header('location:../../media.php?p='.$p);
      }	  
	  elseif($_POST[status_order]=='Batal'){
	  mysql_query("UPDATE produk,orders_detail SET produk.stok=produk.stok+orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk AND orders_detail.id_orders='$_POST[id]'"); //menambah stok yang tidak jadi dibeli
	  
	  // Update untuk mengurangkan produk yang tidak jadi dibeli ( tidak jd best seller)
      mysql_query("UPDATE produk,orders_detail SET produk.dibeli=produk.dibeli-orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk AND orders_detail.id_orders='$_POST[id]'");

      // Update status order
      mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");	  
	  header('location:../../media.php?p='.$p);
	  }
 else{
     mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");
     header('location:../../media.php?p='.$p);
     }
}
?>


