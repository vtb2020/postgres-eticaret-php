  <?php
    // put your code here
include("baglan.php");


   $query_Markalar = "SELECT * FROM markalar";
   $rsMarkalar = pg_query($query_Markalar);
   $row_rsMarkalar = pg_fetch_object($rsMarkalar);
   $num_row_rsMarkalar = pg_num_rows($rsMarkalar);

   
  function getirMarka($_id) {   
    $Sorgu_MarkaAdi="SELECT marka_adi FROM markalar Where marka_id=$_id limit 1";
   $Marka_Adi = pg_query($Sorgu_MarkaAdi);
   while($sutun= pg_fetch_array($Marka_Adi))
   {
     echo $sutun['marka_adi'];
    }
}
   
   
   
    ?>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8" />
	<title>E-ticaret</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css" />
	<![endif]-->
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="css/ie6.css" />
	<![endif]-->
</head>
<body>
	<div id="header">
		<ul>
			<li class="current"><a href="index.html"><span>Anasayfa</span></a></li>
			<li><a href="kategoriler.php"><span>Kategoriler</span></a></li>
			<li><a href="markalar.php"><span>Markalar</span></a></li>
			<li><a href="hakkimizda.html"><span>Hakkımızda</span></a></li>
			<li><a href="iletisim.html"><span>İletişim</span></a></li>
                        <li><a href="urunListe.php"><span>Ürünler</span></a></li>
            			<li><a href="login.html"><span>Üye Giriş</span></a></li>
			
		</ul>
		<span id="background"></span>
		<div id="home">
			<div class="section">
				<a href="index.html"><img src="images/logo.png" alt="Logo" /></a>
				<div>
					E Ticaret
					<a href="index.html">Üye OL!!</a>
				</div>
			</div>
			<div id="featured">
			<h1>Markalar</h1>
              <table id="tablom"> <tr>
                <th>Marka</th>
                 
            </tr>
            <?php  do { ?>
            <tr class="alt1">
                <td> <?= $row_rsMarkalar->marka_adi; ?></td>
                
                
            </tr>
            
             
          
        
            
           <?php }while($row_rsMarkalar= pg_fetch_object($rsMarkalar));?>
        
       
            
        </table>
			  <p>&nbsp;</p>
          </div>
		</div>
	</div>
	<div id="content">
		<ul class="first">
			<li class="first">
				<h3><a href="index.html">Bu site <span>tam size göre</span></a></h3>
				<p>Bu sitemizde ihtiyacınıza uygun ürünleri en uygun fiyata bulup,vakit kaybetmeden sipariş edebilir, kendinize ve sevdiklerinize mutluluk dağıtabilirsiniz.</p>
			</li>
			<li>
				<h3><a href="index.html">İşimiz<span>Kalite</span></a></h3>
				<p>Sitemizde satılan ürünler ve satış yapan satıcılar hep üst klas ürünlerden ve satıcılardan oluşmaktadır.</p>
			</li>
		</ul>
		<ul>
			<li class="first">
				<h3><a href="index.html">Tam <span>DESTEK</span></a></h3>
				<p>Baktığınız ve satın aldığınız ürünler ile ilgili tüm sorularınızı zamanında ve doğru yanıtlamak için destek ekbimiz iş başında.</p>
			</li>
			<li>
				<h3><a href="index.html">İndirimler: <span>İndirimler</span></a></h3>
				<p>Sitemiz de her zaman için indirim bulunur.Olmasa dahi fiyatları yükseltip indirim yapabiliriz.:)</p>
			</li>
		</ul>
	</div>
	<div id="footer">
		<div>
			<div></div>
		</div>
	</div>
</body>
</html>