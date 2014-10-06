<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main-slideshow hidden-phone">
        <div class="container">
          <div class="row">
            <div class="span12">
            
              <ul class="rr slider" id="main-slider">
              
                <li class="slide-1">
                  <div class="slide">
                    <figure>
                      <img src="img/ph/ph-home-banner-1.png" alt=""/>
                    </figure>
                    <div class="content-wrapper">
                      <div class="content">
                        <h1>Koleksi Kemeja</h1>
                        <p>
                          Untuk mendukung penampilan santai, fashionable, serta dinamis. Temukan koleksi berbagai macam kemeja yang keren sesuai penampilan yang anda inginkan.
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="slide-2 current">
                  <div class="slide">
                    <figure>
                      <img src="img/ph/ph-home-banner-2.png" alt=""/>
                    </figure>
                    <div class="content-wrapper">
                      <div class="content">
                        <h1>Aneka Kaos</h1>
                        <p>
                          Tampil Elegan dan menawan dan fashionable adalah idaman setiap pria. Kami sajikan koleksi-koleksi kaos yang sesuai keinginan anda.
                        </p>
                      </div>
                    </div>                    
                  </div>
                </li>
                
                <li class="slide-3">
                  <div class="slide">
                    <figure>
                      <img src="img/ph/ph-home-banner-3.png" alt=""/>
                    </figure>
                    <div class="content-wrapper">
                      <div class="content">
                        <h1>Koleksi Jeans</h1>
                        <p>
                          Temukan koleksi jeans dengan berbagai macam model dan warna untuk mendukung penampilan anda dimanapun dan kapanpun, yang elegan tampil berani dan berbeda.
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="slide-4">
                  <div class="slide">
                    <figure>
                      <img src="img/ph/ph-home-banner-4.png" alt=""/>
                    </figure>
                    <div class="content-wrapper">
                      <div class="content">
                        <h1>Aksesoris Lainnya</h1>
                        <p>
                          Koleksi perlengkapan pria, dengan berbagai macam pilihan warna yang sesuai dengan fashion style terkini.
                        </p>
                      </div>
                    </div>                    
                  </div>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
        
        <div class="slideshow-bottom">
          <div class="menu-gradient gradient">Gradient</div>
          
          <div class="menu-wrapper">
            <div class="container">
              <div class="row-fluid">
                <div class="span12">
                
                  <ul class="rr slider-menu" id="main-slider-menu">
                    <li class="span3 alpha25 current">
                      <div class="triangle ir">Triangle</div>
                      <div class="button" id="open-slide-1">
                        <span class="splitter">Splitter</span>
                        Koleksi Kemeja 2013
                      </div>
                    </li>
                    <li class="span3 alpha25">                    
                      <div class="triangle ir">Triangle</div>
                      <div class="button" id="open-slide-2">
                        <span class="splitter">Splitter</span>
                        Aneka Kaos
                      </div>
                    </li>
                    <li class="span3 alpha25">
                      <div class="triangle ir">Triangle</div>
                      <div class="button" id="open-slide-3">
                        <span class="splitter">Splitter</span>
                        Koleksi Jeans
                      </div>
                    </li>
                    <li class="span3 alpha25">
                      <div class="triangle ir">Triangle</div>
                      <div class="button" id="open-slide-4">
                        <span class="splitter">Splitter</span>
                        Aksesoris Lainnya
                        <span class="splitter secondary">Splitter</span>
                      </div>
                    </li>
                  </ul>
                
                </div>
              </div>
            </div>
          </div>   
        </div>
        
      </div>
      
      
      
      <div role="main" class="homepage container">
        <div class="row">
          <div class="span12 main-heading">
            <div class="heading-line"></div>
            <div class="heading-wrapper">
              <h1>Popular products</h1>
            </div>
          </div>
        </div>
        <ul class="row-fluid clearfix rr popular-products grid-display" style="background:#FFF">
			<?php
            $q=mysql_query("select * from produk where status<>'featured' LIMIT 16");
            while ($r=mysql_fetch_array($q))
            {
			
            echo"<li class='span3 alpha25 desat'>
            <div class='prod-wrapper'>";
			if ($r[status]=="baru")
				{
				 echo "<span class='corner-badge hot-right ir'>Hot</span>";
				}
				else
				{
				 echo "<span class='corner-badge hot-right ir hidden'>Hot</span>";
				}
				
				if ($r[diskon]!="0")
					{
                   //echo"<span class='badge corner-badges-grid'>$r[diskon]%</span>";
					echo "<span class='badge corner-badge off-35'>$r[diskon] % Off</span>";
					}
					else
					{
					  echo "<span class='badge corner-badge off-35 hidden'></span>";	
					}
					
		  $harga = format_rupiah($r[harga]);
		  $disc     = ($r[diskon]/100)*$r[harga];
		  $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
		  $d=$r['diskon'];
		  $htetap="<span>$r[harga]</span>";
		  $hdiskon="<span style='text-decoration:line-through;font-size:0.9em'>$r[harga]</span><span></span>";
		  
		  if ($d!= "0"){
		  $divharga=$hdiskon;
		  }else{
		  $divharga=$htetap;
		  } 	
			
		  $stok=$r['stok'];
		  $tombolbeli="<a href='aksi.php?module=keranjang&act=tambah&id=$r[id_produk]' class='text'>Beli</a>";
		  $tombolhabis="<a href='' class='text'>Stok Habis</a>";
		  if ($stok!= "0"){
		  $tombol=$tombolbeli;
		  }else{
		  $tombol=$tombolhabis;
		  } 
          echo"<span class='badge price-badge'>
                <span class='value'>
                  <span>Rp.</span>
                  $divharga
                </span>
              </span>    
              <a href='?hal=detail&id=$r[id_produk]'>
                <img src='foto_produk/medium_$r[gambar]' class='desat-ie' alt='' width='238' height='288' style='border:0px solid #F03;margin-bottom:3px;'>
              </a>
            
              <span class='info gradient'>
                <span class='title'>$r[nama_produk]</span>
                <span class='add-to-cart clearfix'>
                  <span class='icon ir'>Cart</span>
                  $tombol
                </span>
              </span>
            </div>
          </li>";
}
        ?>  
        </ul>
        
        <div class="row top-spacing">
          <div class="span12 main-heading">
            <div class="heading-line"></div>
            <div class="heading-wrapper">
              <h1>Other products</h1>
            </div>
          </div>
        </div>
        
        <div id="other-prod-slider">
          <div class="navigation"></div>
          <ul class="row-fluid clearfix rr other-products">
        	<?php
			 $f=mysql_query("select * from produk LIMIT 8");
			 while($f1=mysql_fetch_array($f))
			 {	  
			  echo"<li class='span3 alpha25 desat'>
					  <a href='media.php?hal=detail&id=$f1[id_produk]'>
						<span class='badge off ir hidden'>Off</span>              
						<img src='foto_produk/small_$f1[gambar]' alt='' width='50'/>
					  </a>
					  <span class='info'>
						<span class='title'>$f1[nama_produk]</span>
					  </span>
					</li>";
							 }
				  ?>  
          </ul>
        </div>
      </div>
</body>
</html>