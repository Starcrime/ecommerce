<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

</style>
</head>

<body>
<hr/>
      
      <div role="main" class="container product-details">
        <div class="row">
        
          <div class="span10">
            <div class="row">              
              <div class="span5 gallery">
                <div class="gallery-sub-wrap clearfix">
                  <ul class="rr tabs">
         		    <?php
					   $detail=mysql_query("select * from subproduk where id_produk='$_GET[id]'");
					   $i=1;
					   while($d=mysql_fetch_array($detail)){					     
						echo"<li class='active current' id='gal-$i'>
							  <span class='arrow ir'>Arrow</span>
							  <img src='foto_produk/small_$d[gambar]' alt='' width='68' height='86'/>                    
							</li>";
							$i++;
					   }
						  ?>
                  </ul>
                
                  <ul class='rr images'>
                  <?php
					$detail=mysql_query("select * from subproduk where id_produk='$_GET[id]'");
					//menampilkan gambar yg pertama pada produk detail
				 	$detail1=mysql_query("select * from subproduk where id_produk='$_GET[id]'");
					$d1=mysql_fetch_array($detail1);
					echo "<li class='current gal-$i'>
                      		<img src='foto_produk/$d1[gambar]' alt=''/>
                   		 </li>";
				
					//menampilkan gambar asli pada produk detail
					$i=1;	
					while ($d=mysql_fetch_array($detail)){		 
                    echo "<li class='gal-$i'>
                      		<img src='foto_produk/$d[gambar]' alt=''/>
                   		 </li>";
					//}
					$i++;
					}
					
               echo"</ul>
                </div>
              </div>";
              
           echo"<div class='span5 product'>";
			  $detailnama=mysql_query("select * from produk where id_produk='$_GET[id]'");
		      $dnama=mysql_fetch_array($detailnama);
			  
			  $stok=$dnama['stok'];
			  $tombolbeli="<a href='aksi.php?module=keranjang&act=tambah&id=$dnama[id_produk]' class='add-to-cart clearfix'>
						   <span class='icon ir'>Cart</span>
						   <span class='text'>Beli</span>
						   </a>";
			  $tombolhabis="<span class='add-to-cart clearfix' style='color:#da251c;font-size:1.5em;'>Stok Habis</span>";
			  
			  $tersedia="<li class='value'>TERSEDIA</li>";
			  $habis="<li class='value'>HABIS</li>";
			  
			  
			  if ($stok!= "0"){
			  $tombol=$tombolbeli;
			  $status=$tersedia;
			  }else{
			  $tombol=$tombolhabis;
			  $status=$habis;
			  } 
			  
			  echo"
                <h1>$dnama[nama_produk]</h1>
                <p class='description' style='text-align:justify'>";
				 $desk = htmlentities(strip_tags($dnama['deskripsi'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    			 $deskripsi = substr($desk,0,500); // ambil sebanyak 220 karakter
    			 $deskripsi = substr($desk,0,strrpos($deskripsi," ")); // potong per spasi kalimat
                echo"$deskripsi....</p>
                ";
				
            echo"<hr/>";
                
            echo"<ul class='rr prefs clearfix'>
                  <li class='avail clearfix'>
                    <span class='info-title'>Status:</span>
                    <ul class='rr clearfix'>
                      $status
                    </ul>
                  </li>
                </ul>";
                
            echo"<hr/>";
                
            echo"<ul class='rr clearfix buy-wrapper'>
                  <li>";
                  
              echo"$tombol";
                  
              echo"</li> ";                 
               echo"<li class='price-wrapper'>
                  
                    <span class='price'>"; 
					  $harga = format_rupiah($dnama[harga]);
					  $disc     = ($dnama[diskon]/100)*$dnama[harga];
					  $hargadisc     = number_format(($dnama[harga]-$disc),0,",",".");
					  $d=$dnama['diskon'];
					  $htetap="<span class='currency' style='font-size:25px'>Rp.&nbsp;</span><span class='value' style='font-size:25px'>$harga</span>";
					  $hdiskon="<span class='currency' style='font-size:15px'>Rp.&nbsp;</span><span class='value' style='font-size:15px;text-decoration:line-through;'>$harga</span><br>
					  		    <span class='currency' style='font-size:20px'>Rp.&nbsp;</span><span class='value' style='font-size:20px'>$hargadisc</span>";
					  
					  if ($d!= "0"){
					  $divharga=$hdiskon;
					  }else{
					  $divharga=$htetap;
					  } 	
					  
					 $harga    = number_format(($dnama[harga]),0,",",".");
                     //echo "<span class='currency' style='font-size:25px'>Rp.&nbsp;</span><span class='value' style='font-size:25px'>$harga</span>";
					 echo "$divharga";
                    
				echo"</span>
                  
                  </li>
                </ul> ";               
                
               ?>
                
                <div class="share-product">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_pinterest_pinit"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                    </div>
                    <script type="text/javascript" src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508f0d4568c64922"></script>
                    <!-- AddThis Button END -->
                </div>
                
              </div>
              
            </div>
            
            <hr/>
            
            <div class="prod-info clearfix">
              <div class="tabs">
                <ul class="tabs rr clearfix">
                  <li class="current" id="tab-1">Komentar</li>
                  <li id="tab-2">Reviews</li>
                </ul>
              </div>
              <ul class="rr content">
                <li class="current tab-1">
                  <p>
                <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;' border="0">
                <form name='form' action=simpankomentar.php method=POST onSubmit=\"return validasi(this)\" id="form-2">
                <input type=hidden name=id value=<?php echo "$_GET[id]"; ?> >
                <tr><td valign=top>Nama</td><td> : <input type=text name=nama_komentar size=40 maxlength=50 class="tbox"></td></tr>
                <tr><td valign=top>Website</td><td> : <input type=text name=url size=40 maxlength=50 class="tbox"></td></tr>
                <tr><td valign=top>Komentar</td><td> : <textarea name='isi_komentar' class="tarea" rows="20" cols="60"></textarea></td></tr>
                <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
                <tr><td valign=top>&nbsp;</td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 maxlength=6 class="tbox" style="width:90px"><br /></td></tr>
                <tr><td>&nbsp;</td><td><input type=submit name=submit value=Kirim></td></tr>
                </form></table>
                  </p>
                </li>
                <li class="tab-2">                  
					<?php
					echo "$dnama[review]";
                    ?>
                </li>
              </ul>
            </div>            
            
          </div>
          
          <div class="span2 also-like">
            <h5>Produk Lainnya</h5>
            <ul class="rr clearfix">
            <?php
			 $q=mysql_query("select * from produk  where id_produk<>'$_GET[id]' LIMIT 4 ");
            while ($r=mysql_fetch_array($q))
            {
             echo"<li>
                <a href='?hal=detail&id=$r[id_produk]'>
                  <img src='foto_produk/medium_$r[gambar]' width='138' height='179' alt=''/>
                </a>
              </li>";
			}
           ?>   
             
            </ul>
          </div>
        
        </div>
      </div>    
</body>
</html>