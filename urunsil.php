  <?php

include("baglan.php");
//silme işlem, tamamlanacak
$id=$_GET['id'];
$sorgu_Sil="DELETE FROM urunler WHERE urun_id=$id;";
        $_sonuc=pg_query($sorgu_Sil);
        if ($_sonuc) {
            echo 'Urun Silindi';
             header ("Location:UrunListe.php"); 
            
    
}
 else {
    echo 'Silme işlemi başarısız';}
        

?>
