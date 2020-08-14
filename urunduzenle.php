  <?php

include("baglan.php");

            
   $query_Kategoriler = "SELECT * FROM kategoriler";
   $rsKategoriler = pg_query($query_Kategoriler);
   $row_rsKategoriler = pg_fetch_object($rsKategoriler);
   $num_row_rsKategoriler = pg_num_rows($rsKategoriler);
   
   $query_Beden = "SELECT * FROM beden ";
   $rsBeden= pg_query($query_Beden );
   $row_rsBeden  = pg_fetch_object($rsBeden );
   $num_row_rsBeden  = pg_num_rows($rsBeden );

   $query_Marka = "SELECT * FROM markalar ";
   $rsMarka= pg_query($query_Marka );
   $row_rsMarka  = pg_fetch_object($rsMarka );
   $num_row_rsMarka  = pg_num_rows($rsMarka );

    $query_Renk = "SELECT * FROM renk ";
    $rsRenk= pg_query($query_Renk );
   $row_rsRenk  = pg_fetch_object($rsRenk );
   $num_row_rsRenk  = pg_num_rows($rsRenk );
   
   $query_Resim = "SELECT * FROM resim ";
    $rsResim= pg_query($query_Resim );
   $row_rsResim  = pg_fetch_object($rsResim );
   $num_row_rsResim  = pg_num_rows($rsResim );






      
if(isset($_GET["id"])){
    $_id=$_GET["id"]; 
    $sorgu=pg_query("SELECT * FROM urunler where urun_id='$_id'");
    $kayit=pg_fetch_array($sorgu);
 
}




if(isset($_POST['urunDuzenleSubmit'])){
     
      $urunAdi = pg_escape_string($_POST['Adi']);
       $urunDetay=  pg_escape_string($_POST['Detay']);
       $kategoriRefID = pg_escape_string($_POST['KategoriRefID']);
       $urunMarka = pg_escape_string($_POST['markarefid']);
       $urunBeden = pg_escape_string($_POST['bedenrefid']);
       $urunRenk = pg_escape_string($_POST['renkrefid']);
       $urunResim = pg_escape_string($_POST['resimrefid']);
       
     
     
     
     
     $urunID = pg_escape_string($_POST['ID']);
    
    
     $sorgu=pg_query("UPDATE urunler SET urun_adi='$urunAdi',urun_aciklama='$urunDetay',kategori_refid='$kategoriRefID',marka_refid='$urunMarka',beden_refid='$urunBeden',renk_refid='$urunRenk',resim_refid='$urunResim'
   where urun_id='$urunID'");
      if($sorgu){   
         
            header ("Location:urunListe.php");
               
              
           }
              
          
}
          
        



   ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Update</title>
      
    
</head>
<body>
   <div class="ortala">
    
    
    <div class="yasla solSide">

 
    
    </div>
    <div class="yasla icerik">     
       
       <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
           <input type="hidden" name="ID" id="ID" value="<?=$kayit['urun_id'] ?>" />
        <fieldset>
            <legend>Ürün EKLEME</legend>    
            <label for="KategoriRefID">Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->kategori_id;?>" >
                    <?= $row_rsKategoriler->kategori_adi;?>
                </option>
                <?php }while($row_rsKategoriler= pg_fetch_object($rsKategoriler));?>
 
            </select>
            <br/>
              <br/>
              <br/>
              <br/>
               
            <label for="markarefid">Markalar</label>
            <select name="markarefid" id="bedenrefid">
                 <?php do { ?>
                <option value="<?= $row_rsMarka->marka_id;?>" >
                    <?= $row_rsMarka->marka_adi?>
                </option>
                <?php }while($row_rsMarka= pg_fetch_object($rsMarka));?>
 
            </select>
          <br/>
              <br/>
            <br/>
              <br/>
              
            <label for="bedenrefid">Bedenler</label>
            <select name="bedenrefid" id="bedenrefid">
                 <?php do { ?>
                <option value="<?= $row_rsBeden->beden_id;?>" >
                    <?= $row_rsBeden->beden;?>
                </option>
                <?php }while($row_rsBeden= pg_fetch_object($rsBeden));?>
 
            </select>
          <br/>
              <br/>
               <br/>
              <br/>
                
            <label for="renkrefid">Renkler</label>
            <select name="renkrefid" id="renkrefid">
                 <?php do { ?>
                <option value="<?= $row_rsRenk->renk_id;?>" >
                    <?= $row_rsRenk->renk_adi;?>
                </option>
                <?php }while($row_rsRenk= pg_fetch_object($rsRenk));?>
 
            </select>
          <br/>
              <br/>
                 <label for="resimrefid">Resimler</label>
            <select name="resimrefid" id="resimrefid">
                 <?php do { ?>
                <option value="<?= $row_rsResim->resim_id;?>" >
                    <?= $row_rsResim->resim_yol;?>
                </option>
                <?php }while($row_rsResim= pg_fetch_object($rsResim));?>
 
            </select>
          <br/>
              <br/>
              <br/>
              <br/>
            <label for="Adi">Ürün Adı:</label> 
           <input type="text" name="Adi" id="Adi" />
              <br/>
              <br/>
              <br/>
              <br/>
           <label for="Detay">Açıklama :</label> 
           <textarea id="TypeHere" name="Detay"></textarea>
          
            
        </fieldset>
         ---------------------------------><input type="submit" name="urunDuzenleSubmit" value="Ürün Update" />
    </form>
       
         
          
   
          
  </div> 
              
              
          </div>
      

</html>
