  <?php
include("baglan.php");

   $query_Urunler = "SELECT * FROM urunler";
   $rsUrunler = pg_query($query_Urunler);
   $row_rsUrunler = pg_fetch_object($rsUrunler);
   $num_row_rsUrunler = pg_num_rows($rsUrunler);
   
   
   function getirKategori($_id) {   
    $Sorgu_KatagoriAdi="SELECT kategori_adi FROM kategoriler Where kategori_id=$_id limit 1";
   $Kategori_Adi = pg_query($Sorgu_KatagoriAdi);
   while($sutun= pg_fetch_array($Kategori_Adi))
   {
     echo $sutun['kategori_adi'];
    }
}
   function getirMarka($_id) {   
    $Sorgu_MarkaAdi="SELECT marka_adi FROM markalar Where marka_id=$_id limit 1";
   $Marka_Adi = pg_query($Sorgu_MarkaAdi);
   while($sutun= pg_fetch_array($Marka_Adi))
   {
     echo $sutun['marka_adi'];
    }
}
   
function getirRenk($_id) {   
    $Sorgu_RenkAdi="SELECT renk_adi FROM renk Where renk_id=$_id limit 1";
   $Renk_Adi = pg_query($Sorgu_RenkAdi);
   while($sutun= pg_fetch_array($Renk_Adi))
   {
     echo $sutun['renk_adi'];
    }
} 

function getirBeden($_id) {   
    $Sorgu_BedenkAdi="SELECT beden FROM beden Where beden_id=$_id limit 1";
   $Beden_Adi= pg_query($Sorgu_BedenkAdi);
   while($sutun= pg_fetch_array($Beden_Adi))
   {
     echo $sutun['beden'];
    }
} 

function getirResim($_id) {   
    $Sorgu_ResimkAdi="SELECT resim_yol FROM resim Where resim_id=$_id limit 1";
   $Resim_Adi= pg_query($Sorgu_ResimkAdi);
   while($sutun= pg_fetch_array($Resim_Adi))
   {
     echo $sutun['resim_yol'];
    }
}

    ?>
<html>
    <head></div>
          <style>
            table tr,th,td {
                border: 1px solid;
            }
        </style>
        <style>
#personel {
border-collapse: collapse;
width: 100%;
}
 
#personel td, #personel th {
border: 1px solid #ddd;
padding: 8px;
}
 
#personel tr:nth-child(even){background-color: #f2f2f2;}
 
#personel tr:hover {
background-color: #2ecc71;
color:#fff;
}
 
#personel th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #2c3e50;
color: white;
}
</style>
                <script type="text/javascript">
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}
</script>
        <meta charset="UTF-8">
    <title>Ürünler</title>
  
    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   <div>
    <div class="ortala">
    
    
    <div class="yasla solSide">
       

    
    </div>
    <div class="yasla icerik">
    <table id="personel"> <tr>
           
                <th>Ürün Adı</th>
                <th>Ürün Açıklaması</th>
                <th>Kategori Adı</th>
                <th>Markası</th>
                <th>Renk</th>
                <th>Beden</th>
                <th>Ürün Resim</th>
                
            </tr>
             <?php $sayac=0; do { ?>
           
             <?php  $sayac=$sayac+1; if($sayac%2==0){?>
            <tr>
               
                <td> <?= $row_rsUrunler->urun_adi; ?></td>
                <td> <?= $row_rsUrunler->urun_aciklama; ?></td>
                <td><?= getirKategori($row_rsUrunler->kategori_refid) ?></td>
                  <td><?= getirMarka($row_rsUrunler->marka_refid) ?></td>
                    <td><?= getirRenk($row_rsUrunler->renk_refid) ?></td>
                      <td><?= getirBeden($row_rsUrunler->beden_refid) ?></td>
                 <td> <img height="75px" width="50px" src="Resimler/<?= getirResim($row_rsUrunler->resim_refid) ?>"/></td>
                 <td><a href=urunduzenle.php?id=<?=$row_rsUrunler->urun_id;?>>Güncelle</a>   ||  <a href=urunsil.php?id=<?=$row_rsUrunler->urun_id;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
            
            
            <?php ;}    else{?>
            <tr>
               <td> <?= $row_rsUrunler->urun_adi; ?></td>
                <td> <?= $row_rsUrunler->urun_aciklama; ?></td>
                <td><?= getirKategori($row_rsUrunler->kategori_refid) ?></td>
                  <td><?= getirMarka($row_rsUrunler->marka_refid) ?></td>
                    <td><?= getirRenk($row_rsUrunler->renk_refid) ?></td>
                      <td><?= getirBeden($row_rsUrunler->beden_refid) ?></td>
                 <td> <img height="75px" width="50px" src="Resimler/<?= getirResim($row_rsUrunler->resim_refid) ?>"/></td>
                 <td><a href=urunduzenle.php?id=<?=$row_rsUrunler->urun_id;?>>Güncelle</a>   ||  <a href=urunsil.php?id=<?=$row_rsUrunler->urun_id;?> onclick="return silOnayla();">Sil</a>||</td>
                
            </tr>
           
             <?php } ?>
          <?php }while($row_rsUrunler= pg_fetch_object($rsUrunler));?>            
                  <tr>
                <td>
                    <a href=urun_ekle.php>Yeni Ürün Ekle</a>
                </td>
            </tr>                   
        </table>
    </div>   
    </div>
   </div>
</body>
</html>
