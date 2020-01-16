<?php 

define("guvenlik", true);
require_once '../../sistem/fonksiyon.php' ;

       if(isset($_POST)) {
       	

              $ayarkaydet = $db->prepare('UPDATE ayarlar SET 
                  
                  site_url			       =:url,
                  site_baslik		       =:sbaslik,
                  site_anahtarkelime   =:siteanahtar,
                  site_aciklama        =:sicaklama,
                  site_hakkinda        =:sihakkinda
                              
                              WHERE site_id=1 	');

             $noldu = $ayarkaydet->execute(array(

                 ':url'         =>  $_POST['surl'],
                 ':sbaslik'     =>  $_POST['sibas'],
                 ':siteanahtar' => $_POST['sinah'],
                 ':sicaklama'   =>  $_POST['sicak'],
				         ':sihakkinda'  => $_POST['sitehak']


              	));
 
      		 }	else {
       	 
           	 header("Location: genelayarlar.php");
			
       	 		
       }

       if ($noldu) {
    
       	       echo 'ok';
                 

       } else {

       echo 'hata';


       }

?>