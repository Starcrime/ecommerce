<?php
if ($_GET['hal']=='home')
{ include "home.php";}
else
if  ($_GET['hal']=='detail')
{ include "detail.php";}
else
if  ($_GET['hal']=='produk-lists')
{ include "produk-lists.php";}
else
if  ($_GET['hal']=='produk-grid')
{ include "produk-grid.php";}
else
if  ($_GET['hal']=='cart')
{ include "cart.php";}
else
if  ($_GET['hal']=='produk-lists-kategori')
{ include "produk-lists-kategori.php";}
else
if  ($_GET['hal']=='contact')
{include "contact.php";}
else
if  ($_GET['hal']=='produk-lists-harga')
{include "produk-lists-harga.php";}
else
if  ($_GET['hal']=='carabeli')
{include "cara-beli.php";}
else
if  ($_GET['hal']=='daftar')
{include "daftar.php";}
else
if  ($_GET['hal']=='login')
{include "login.php";}
else
if  ($_GET['hal']=='profil')
{include "user_profile.php";}
else
if  ($_GET['hal']=='simpantransaksi')
{include "simpantransaksi2.php";}

?>