<?php
	function Upload($nm,$tmp,$dir) {
        move_uploaded_file($tmp, "$dir/$nm");
        return ;
    }

    function AcakId($panjang){
    	    $karakter = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890";
            $string = "";

            for($i=0;$i<$panjang;$i++)
            {
                $pos = rand(0, strlen($karakter)-1);
                $string .= $karakter{$pos};
            }
            return $string;
    }

    function AcakSandi($panjang){
            $karakter = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuioplkjhgfdsazxcvbnm";
            $string = "";

            for($i=0;$i<$panjang;$i++)
            {
                $pos = rand(0, strlen($karakter)-1);
                $string .= $karakter{$pos};
            }
            return $string;
    }
?>