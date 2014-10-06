      
<hr/>
      
      
      <div role="main" class="container checkout">
        <div class="row">
        
        <div class="span3 progress">
            <h3>Fasilitas Member</h3>
            <ul class="rr">
              <li>
                <a href="#">Transaksi Online</a>
              </li>
              <li>
                <a href="#">Info Diskon</a>
              </li>
              <li>
                <a href="#">Potongan Harga</a>
              </li>
              <li>
                <a href="#">Fasilitas Lainnya</a>
              </li>
            </ul>
          </div>
        
          <div class="span9 checkout-list">
            <ol class="rr">
              <li class="current">
                <h6>Daftar Member Baru</h6>
                <div class="row">
                  <div class="span9 content-wrapper clearfix">
                    <div class="right-col">
                      <form action="simpanuser.php" method="post">
                       <ul class="rr">
                        <table border="0" width="700">
                          <tr><td valign="top">Nama Lengkap</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="nama" placeholder="Nama Lengkap ..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                           <tr><td valign="top">Username</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="username" placeholder="Nama Lengkap ..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">password</td>
                          <td>
                          <li>
                            <label>
                              <input type="password" name="password" placeholder="Password Anda..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">Alamat Pengiriman</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="alamat" placeholder="Alamat Lengkap..." size="80" class="tbox"/><br>
                              *) Alamat pengiriman harus di isi lengkap, termasuk kota/kabupaten dan kode posnya.
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">Telepon</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="telpon" placeholder="Telepon..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">Email</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="email" placeholder="email..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                           <tr><td valign=top>Kota Tujuan</td><td> :  
                              <select name='kota'>
                              <option value=0 selected>- Pilih Kota -</option>
                              <?php
                              $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
                              }
							  ?>
                          </select> <br /><br />*)  Apabila tidak terdapat nama kota tujuan Anda, pilih <b>Lainnya</b>
                                          <br />**) Ongkos kirim dihitung berdasarkan kota tujuan</td></tr>
                                <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
                                <tr><td>&nbsp;</td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=16 maxlength=6><br /></td></tr>
                           <tr><td></td><td>
                      
                          <input type="submit" class="btn secondary" value="Daftar">
                        </a>
                           </td></tr>

                          </table>
                        </ul>
                        
                        
                      
                      </form>
                    
                    </div>  
                  </div>                      
                </div>
              </li>
            </ol>
          </div>
        
        </div>
      </div>    
      
      