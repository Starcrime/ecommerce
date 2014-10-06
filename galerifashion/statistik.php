<?php
 // Statistik user
  // Statistik user
$qstatistik=mysql_num_rows(mysql_query("select * from modul where nama_modul='Statistik User' and publish='Y'"));
// Apabila modul Statistik diaktifkan Publish=Y, maka tampilkan modul Statistik
//if ($qstatistik > 0){
//  echo "<hr color=#e0cb91 noshade=noshade /><br />
//        <img src='$f[folder]/images/statistik.jpg' /><br />";

  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "<p align=center>$tothitsgbr </p>
      <img src=counter/hariini.png> Pengunjung hari ini : $pengunjung <br>
      <img src=counter/total.png> Total pengunjung    : $totalpengunjung <br><br>
      <img src=counter/hariini.png> Hits hari ini    : $hits[hitstoday] <br>
      <img src=counter/total.png> Total Hits       : $totalhits <br><br>
      <img src=counter/online.png> Pengunjung Online: $pengunjungonline<br><br>";
//}

?>
