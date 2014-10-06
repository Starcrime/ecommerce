  <?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/pagingproduk.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
  include "hapus_orderfiktif.php";
  
  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  $user="Pengunjung";
  }
  else
  {
	$user="$_SESSION[namalengkap]";  
  }
  ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gte IE 9]>         <html class="no-js gte-ie9"> <![endif]-->
<!--[if gt IE 99]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
      <title>..:: FathStudio ::..</title>
      <meta name="description" content="">
  
      <meta name="viewport" content="width=device-width">

      <link rel="stylesheet" href="css/normalize.min.css">
      <link rel="stylesheet" href="css/main.css">		
      <link rel="stylesheet" href="css/media-queries.css">		
      <link rel="stylesheet" href="css/bootstrap.css">		

      <script src="js/vendor/modernizr-2.6.1.min.js"></script>
      
    
    <link rel="stylesheet" href="css_ticker/style.css">  
    <script type="text/javascript" src="js_ticker/jquery.min.js"></script>
	<script type="text/javascript" src="js_ticker/jquery.totemticker.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
			});
		});
	</script>


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

		
		
		
      <div class="top-bar">
        <div class="container">
          <div class="row">
          
            <div class="span3 shipping">
			<SCRIPT language=JavaScript>var d = new Date();
            var h = d.getHours();
            if (h < 11) { document.write('Selamat pagi, pengunjung...'); }
            else { if (h < 15) { document.write('Selamat siang, pengunjung...'); }
            else { if (h < 19) { document.write('Selamat sore, pengunjung...'); }
            else { if (h <= 23) { document.write('Selamat malam, pengunjung...'); }
            }}}</SCRIPT> 
            </div>
            
            <div class="span9 menu clearfix">
              <ul class="clearfix rr">
                <li>
                  <a href="">
                    <span class="ir icon my-account"></span>
                    <span style="color:#FFF; font-size:10px"><?php echo "Halo, &nbsp; $user"; ?></span>
                  </a>
                </li>
               <?php
               if (!empty($_SESSION['namauser']) AND !empty($_SESSION['passuser'])){
				?>
                <li>
                  <a href="logout.php">
                    <span class="ir icon log-in"></span>
                    <span style="color:#FFF;font-size:10px">&nbsp;Logout</span>
                  </a>
                </li>
                <?php
			    }
			    
                if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
				?>  
                <li>
                  <a href="?hal=login">
                    <span class="ir icon log-in"></span>
                    <span style="color:#FFF;font-size:10px">&nbsp;Log in</span>
                  </a>
                </li>
                <?php
				}
				?>
              </ul>
            </div>
            
          </div>
        </div>
      </div>
      
      
      <header class="container">      
        <div class="row">
        
          <div class="span3 logo-wrapper">
            <a href="?hal=home" class="logo">
              <span class="icon ir">FathStudio</span>
              <h1>FathStudio</h1>
            </a>
          </div>
          
          <div class="span5 collections">
            <div><span class="ir arrow up">Up</span></div>
            <div>
              <ul class="content rr">
                <li class="current"><a href="">Koleksi Terbaru Tahun 2013</a></li>
                <li><a href="">Fashion Trendy Dan Bergaya Untuk Anda</a></li>
                <li><a href="">Jangan Lewatkan Kesempatan Untuk Mendapat Diskon</a></li>
              </ul>
            </div>
            <div><span class="ir arrow down">Down</span></div>
          </div>
          
          <div class="span4">
           <div class="searchspan">
            <input type="text" class="search-box" placeholder="Search..." value="" style="background:#FFF"/>
           </div>
              
                           
            </div>
           
            
            <div class="shopping-cart">
              <span class="icon ir">Cart</span>
               <?php
				$sid = session_id();
				$sql = mysql_query("SELECT SUM(jumlah*harga) as total,SUM(jumlah) as totaljumlah FROM orders_temp, produk 
								WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
					$r=mysql_fetch_array($sql);
					if ($r['totaljumlah'] != ""){
					$total_rp    = format_rupiah($r[total]);	
				    echo "<span class='text'><a href='?hal=cart'><span class='title'>Shopping Cart</span></a> (<span>$r[totaljumlah]</span> items) - </span>
					  <span class='price'><span>Rp.</span><span>$total_rp</span></span>";
					}
					else
					{
					echo "<span class='text'><a href='?hal=cart'><span class='title'>Shopping Cart</span></a> (<span>0</span> items) - </span>
					  <span class='price'><span>Rp.</span><span>0</span></span>";	
					}
			  ?>
            </div>
            
          </div>
          
        </div>  

        <div class="row main-menu-wrapper">
          
          <div class="span9">
            <ul class="main-menu clearfix rr" id="main-menu">
              <li><a href="?hal=home" class="current">Home</a></li>
              <li id="shop-submenu-area">
                <a href="#" id="shop-submenu-trigger">Kategori</a>
                <ul class="row shop-submenu rr">
                  <li class="arrow ir">Arrow</li>
            <?php  
			$kategori=mysql_query("select * from kategori");
			while($k=mysql_fetch_array($kategori))
			{    
            echo"<li class='span2 beta'>
                    <ul class='rr'>
                      <li>
                        <span class='category' style='margin-bottom:-10px;'>$k[nama_kategori]</span>
                      </li>";
					  $prod=mysql_query("select * from produk where id_kategori='$k[id_kategori]' LIMIT 5 ");
					  while ($dp=mysql_fetch_array($prod))
					  {
					  echo"<li style='border:0px solid;margin-top:px;'><a href='?hal=detail&id=$dp[id_produk]'>$dp[nama_produk]</a></li>";
					  }
                echo"</ul>
                  </li>";
			}
              ?>   
                  
                </ul>
              </li>
              <li><a href="?hal=carabeli">Cara Pembelian</a></li>
              <li><a href="?hal=produk-lists">Produk Kami</a></li>
              <li><a href="?hal=cart">Cart</a></li>
              <li><a href="?hal=contact">Contact</a></li>
            </ul>
          </div>          
        </div>
      </header>
      
      <?php
	   include "konten.php";
	  ?>
      
      
      
      <footer>
        <div class="top">
          <div class="container">
            <div class="row">
            
              <div class="span6">
                <div class="row-fluid">
                  <form action="#" method="post" class="subscribe-form">
                    <input type="text" class="span4" placeholder="Enter your email for exclusive offers" value="" style="background:#FFF;border:1px solid #CCC"/>
                    <input type="submit" class="span2" value="Subscribe"/>
                  </form>
                </div>
              </div>
              
              <div class="span6 clearfix social-wrapper">
                <ul class="social rr clearfix">
                  <li><span>Follow us</span></li>
                  <li><a href="#" class="ir icon tw">Twitter</a></li>
                  <li><a href="http://www.facebook.com/TeoThemes" class="ir icon fb">Facebook</a></li>
                  <li><a href="#" class="ir icon gp">Google plus</a></li>
                  <li><a href="#" class="ir icon rss">RSS</a></li> 
                </ul>
              </div>
              
            </div>
          </div>
        </div>
        
        <div class="middle">
          <div class="container">
            <div class="row footer-menu">
            
              <div class="span3" style="color:#FFF;font-size:0.8em">
                <?php
				include "statistik.php";	
				?>
              </div>
              
              <div class="span3">
                <h2>My Account</h2>
                <ul class="rr">
                  <li><a href="?hal=home">Beranda</a></li>
                  <li><a href="?hal=carabeli">Cara Pembelian</a></li>
                  <li><a href="?hal=produk-lists">Produk Kami</a></li>
                  <li><a href="?hal=cart">Shopping Cart</a></li>
                  <li><a href="?hal=contact">Kontak Kami</a></li>
                </ul>
              </div>
              
              <div class="span3">
                <h2>Sekilas Info</h2>
                	<ul id="vertical-ticker">
                    <?php
					$sekilas=mysql_query("select * from sekilasinfo");
					while($s=mysql_fetch_array($sekilas))
					{
                     echo"<li>$s[info]e</li>";
					}
					?>
		            </ul>

              </div>
              
              <div class="span3">
                <h2>Connect with Us</h2>
                <ul class="connect rr">
                  <li>
                    <a href="#" class="clearfix">
                      <span class="ir icon phone">Phone</span>
                      <span class="phone-no">(021)5574 97 06</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="clearfix">
                      <span class="ir icon mobile">Mobile</span>
                      <span class="phone-no">088210078693(sms only)</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="clearfix">
                      <span class="ir icon mail">Mail</span>
                      <span>mail@fathtsudio.com</span>
                    </a>
                  </li>
                </ul>
              </div>
              
            </div>
            
            <div class="row">
              <div class="span12 credit-cards">
                <ul class="rr">
                <?php
				$bank=mysql_query("select gambar from bank order by id_bank ASC");
				while($b=mysql_fetch_array($bank)){
                  echo "<li><img src='foto_banner/$b[gambar]'></li>";
				}
				?>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
        
        <div class="bottom">
          Copyright &copy; 2013. fathstudio.com
        </div>
      </footer>
      
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
