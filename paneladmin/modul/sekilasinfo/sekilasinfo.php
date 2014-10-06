<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/sekilasinfo/aksi_sekilasinfo.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=sekilasinfo&aksi=tambah' role='button' class='btn'>Input Sekilas Info Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Sekilas Info</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='5%'>No</th>
                                    <th width='45%'>Sekilas Info</th>
                                    <th width='25%'>Tgl Posting</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM sekilasinfo ORDER BY id_sekilas ASC');
							$no=1;
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$no</td>
                                    <td>$r[info]</td>
                                    <td>$r[tgl_posting]</td>
                                    <td><a href='?p=sekilasinfo&aksi=edit&id=$r[id_sekilas]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_sekilas]'>HAPUS</td>
                                    
                                </tr>";
							$no++;
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
	$edit = mysql_query("SELECT * FROM sekilasinfo WHERE id_sekilas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/sekilasinfo/aksi_sekilasinfo.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Sekilas Info</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_sekilas]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Sekilas Info</div>
                            <div class='span9'><input type='text' name='info' value='$r[info]'/></div>
                        </div>
					
                      <div class='row-form clearfix'>
                            <div class='span3'>Tgl Posting</div>
                            <div class='span9'><input type='text' name='tgl_posting' value='$r[tgl_posting]'/></div>
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
echo "<form method='post' action='modul/sekilasinfo/aksi_sekilasinfo.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input Sekilas Info Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Sekilas</div>
                            <div class='span9'><input type='text' name='info'/></div>
                        </div>
						 <div class='row-form clearfix'>
                            <div class='span3'>Tgl Posting</div>
                            <div class='span9'><input type='text' name='tgl_posting'/></div>
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
			}//penutup switch
}//penutup session
?>    
</body>
</html>