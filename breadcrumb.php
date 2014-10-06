<?php
if ($_GET['hal']=='home')
{ echo "home";}
else
if  ($_GET['hal']=='detail')
{ echo "detail";}
else
if  ($_GET['hal']=='produk-lists')
{ echo "produk-lists";}
else
if  ($_GET['hal']=='produk-grid')
{ echo "home/produk-grid";}
else
if  ($_GET['hal']=='cart')
{ echo "cart";}
else
if  ($_GET['hal']=='produk-lists-kategori')
{ echo "produk-lists-kategori";}
else
if  ($_GET['hal']=='contact')
{echo "contact";}
else
if  ($_GET['hal']=='produk-lists-harga')
{echo "produk-lists-harga";}
else
if  ($_GET['hal']=='carabeli')
{echo "cara-beli";}
else
if  ($_GET['hal']=='daftar')
{echo "daftar";}
else
if  ($_GET['hal']=='login')
{echo "login";}
else
if  ($_GET['hal']=='profil')
{echo "user_profile";}
else
if  ($_GET['hal']=='simpantransaksi')
{echo "simpantransaksi";}

?>