<?php

define('guvenlik', true);
require_once '../../sistem/fonksiyon.php';

       if (isset($_POST)) {
           $ayarkaydet = $db->prepare('UPDATE ayarlar SET 
                  
                  site_facebook			  =:face,
                  site_twitter		    =:twit,
                  site_instagram      =:insta
                  
                              
                              WHERE site_id=1 	');

           $noldu = $ayarkaydet->execute([

               ':face'  => post('feysbuk'),
               ':twit'  => post('twitter'),
               ':insta' => post('instagram'),
           ]);
       } else {
           header('Location: genelayarlar.php');

           exit(); // you should always do this
       }

       if ($noldu) {
           echo 'ok';
       } else {
           echo 'hata';
       }
