<?php
  error_reporting(0);
  session_start();
  
  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){

?>
   <hr/>
      <div role="main" class="container checkout">
        <div class="row">
          <div class="span9 checkout-list">
            <ol class="rr">
              <li class="current">
                <h6>Login Atau Daftar</h6>
                <div class="row">
                  <div class="span9 content-wrapper clearfix">
                    <div class="left-col">
                  
                      <h6>Belum menjadi member?<br>
                       Silahkan Daftar</h6>
                      <p>
                        Jadilah Member untuk mendapatkan berbagai fasilitas menarik
                      </p>
                        <a href="?hal=daftar" class="btn secondary">
                          <span class="gradient">Daftar</span>
                        </a>
                    </div>
                    <div class="right-col">
                    
                      <h6>Login</h6>
                      <p>
                        Already registered
                      </p>
                      
                      <form action="cek_login.php" method="post" id="form-2">
                        <ul class="rr">
                          <li>
                            <label>
                              <input type="text" name="email" placeholder="email anda..." size="30"/>
                            </label>
                          </li>
                          <li>
                            <label>
                              <input type="password" name="password" placeholder="Password..." size="30"/>
                            </label>
                          </li>
                        </ul>
                        
                        <a href="#" class="forgot">Lupa password?</a>
                        
                        
                          <span class="gradient"><input type="submit" class="btn secondary" value="Login"></span>
                        </a>
                      </form>
                    
                    </div>  
                  </div>                      
                </div>
              </li>
            </ol>
          </div>
        
        </div>
      </div>    
      
 <?php
  }
  else
  {
   echo "<script>window.alert('anda sudah melakukan login')</script>";
   echo "<meta http-equiv='refresh' content='0; url=index.php?hal=home'>";

  }
 ?>     