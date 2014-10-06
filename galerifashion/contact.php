<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
      
      <div role="main" class="container contact">        
        <div class="row">
        
          <div class="span5">
            <h1>Contact with us</h1>
            
            <form action="simpan_hubungi.php" method="post" class="clearfix">
              <label>
                <input class="text-input" type="text" name="nama" placeholder="Nama..."/>
              </label>
              <label>
                <input class="text-input" type="text" name="email" placeholder="Email..."/>
              </label>
              <label>
                <input class="text-input" type="text" name="subjek" placeholder="Subjek..."/>
              </label>
              <label>
                <img src='captcha.php'>
              </label>
              <br />
              <label>
               (masukkan 6 kode di atas) <input class="text-input" type="text" name="kode" size="10" maxlength="6"/>
              </label>
              <textarea class="text-input" name="pesan" placeholder="Your Message...">Pesan Anda...</textarea>
              <a href="#" class="btn"><span class="gradient"><input type="image" value="Submit" /></span></a>
            </form>
          </div>
          
          <div class="span6 offset1">
            <h1>Location on map</h1>
            
            <figure class="map">
              <div class="wrapper">
                <div class="shadow">Shadow</div>
                <img src="img/ph/ph-map.png" alt="Map"/>
              </div>
            </figure>
          </div>
        
        </div> 
        
        <div class="row top-spacing">
          <div class="span5">
          
            <h1>Misi Kami</h1>
            
            <p align="justify">
             Fathstudio adalah sebuah lembaga untuk para web programmer muda, untuk mengembangkan kreativitas dan potensi mereka. dengan metode yang sederhana diharapkan dapat menjadikan para calon web programmer menjadi web programmer sesungguhnya.  
            </p>
          
          </div>
          
          <div class="span6 offset1">
            
            <h1>Contact details</h1>
            
            <p>
              Kecamatan pinang kota tangerang. beberapa menit dari perumahan alam sutera dan beberapa menit dari tol kebon nanas.
            </p>
            
            <ul class="rr info clearfix">
              <li>
                Phone: <span class="val">08.777.106.3961</span>
              </li>
               <li>
                Email: <span class="val">mail@fathstudio.com</span>
              </li>
              <li>
                Fax: <span class="val">0123.456.789</span>
              </li>             
              <li>
                Web: <span class="val">www.fathstudio.com</span>
              </li>
            </ul>
            
          </div>
        </div>
      </div>    
</body>
</html>