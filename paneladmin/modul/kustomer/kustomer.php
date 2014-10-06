<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/kustomer/aksi_kustomer.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
<!--		  <p align='right'><a href='?p=kustomer&aksi=tambah' role='button' class='btn'>Input Kustomer Baru</a></p> -->
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Kustomer</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='10%'>Id</th>
                                    <th width='23%'>Nama Kustomer</th>
									<th width='23%'>Alamat</th>
									<!-- <th width='13%'>Email</th> -->
                                    <th width='23%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query("SELECT * FROM kustomer ORDER BY id_kustomer ASC");
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[id_kustomer]</td>
                                    <td>$r[nama_lengkap]</td>
									<td>$r[alamat]</td>
									<!-- <td>$r[email]</td> -->
                                  <td><a href='?p=kustomer&aksi=edit&id=$r[id_kustomer]'>EDIT</a>
								    </td>							
								<!-- <td><a href='?p=kustomer&aksi=edit&id_kustomer=$r[id_kustomer]'>EDIT</a>|<a href='$aksi?act=hapus&id_kustomer=$r[id_kustomer]'>HAPUS</td>		-->
										
                                </tr>";
							}
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/kustomer/aksi_kustomer.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Kustomer</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_kustomer]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama</div>
                            <div class='span9'><input type='text' name='nama_lengkap' value='$r[nama_lengkap]'/>											                      </div>
                      </div>
					  
					  <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='text' name='password' value='$r[password]'/></div>
                     </div>
					  
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><input type='text' name='alamat' value='$r[alamat]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Telpon</div>
                            <div class='span9'><input type='text' name='telpon' value='$r[telpon]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]'/></div>
                     </div> 
						 
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>                           
			<input type=button class=btn value=Batal onclick=self.history.back()>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;

case "tambah":
echo "<form method='post' action='modul/kustomer/aksi_kustomer.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input Kostumer Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama</div>
                            <div class='span9'><input type='text' name='nama_lengkap'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='text' name='password'/></div>
                     </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><input type='text' name='alamat'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Telpon</div>
                            <div class='span9'><input type='text' name='telpon'/></div>
                     </div>
					 
					  <div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email'/></div>
                     </div>
					 
						 
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'> 
			
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>