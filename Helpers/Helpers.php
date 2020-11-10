<?php  

    function base_url()
    {
    	return BASE_URL;
    }
    function media()
    {
      return BASE_URL."Public/";
    }

    function headerAdmin($data="")
    {
      $view_header = "Views/Plantillas/header_admin.php";
      require_once ($view_header);
    }

    function footerAdmin($data="")
    {
      $view_footer = "Views/Plantillas/footer_admin.php";
      require_once ($view_footer);
    }
    function navAdmin($data="")
    {
      $view_nav = "Views/Plantillas/nav_admin.php";
      require_once ($view_nav);
    }

    function getModal(string $nameModal, $data)
    {
      $view_modal = "Views/Plantillas/Modal/{$nameModal}.php";
      require_once ($view_modal);
    }

    function dep($data)
    {
    	$format = print_r('<pre>');
    	$format .=print_r($data);
    	$format .=print_r('</pre>');
    	return $format;
    }


    function strClean($strcadena)
    {
    	  $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strcadena);
        $string = trim($string);
        $string =stripslashes($string);
        $string =str_ireplace("<script>", "", $string);
        $string =str_ireplace("</script>", "", $string);
        $string =str_ireplace("<script src>", "", $string);
        $string =str_ireplace("<script tupe=>", "", $string);
        $string =str_ireplace("SELECT * FROM", "", $string);
        $string =str_ireplace("DELETE FROM", "", $string);
        $string =str_ireplace("INSERT INTO", "", $string);
        $string =str_ireplace("SELECT COUNT(*) FROM", "", $string);
        $string =str_ireplace("DROP TABLE", "", $string);
        $string =str_ireplace("OR '1'='1", "", $string);
        $string =str_ireplace('OR "1"="1"', "", $string);
        $string =str_ireplace('OR ´1´=´1´', "", $string);
        $string =str_ireplace("is NULL; --", "", $string);
        $string =str_ireplace("is NULL; --", "", $string);
        $string =str_ireplace("LIKE '", "", $string);
        $string =str_ireplace('LIKE "', "", $string);
        $string =str_ireplace("LIKE ´", "", $string);
        $string =str_ireplace("OR 'a'='a", "", $string);
        $string =str_ireplace('OR "a"="a', "", $string);
        $string =str_ireplace("OR ´a´=´a", "", $string);
        $string =str_ireplace("--", "", $string);
        $string =str_ireplace("^", "", $string);
        $string =str_ireplace("[", "", $string);
        $string =str_ireplace("]", "", $string);
        $string =str_ireplace("==", "", $string);
        return $string;
    }

    function passGenerator($Length = 10)
    {
    	$pass ="";
    	$longitudPass = $Length;
    	$cadena = "ABCDEFGHIJKLMNÑOPQRSTWVXYZabcdefghijklmnñopqrstwvxyz1234567890";
    	$logitudCadena = strlen($cadena);
    	for($i =1; $i<=$longitudPass; $i++)
    	{
          $pos = rand(0,$logitudCadena-1);
          $pass .=substr($cadena, $pos, 1);
    	}
    	return $pass;
    }
     function token()
     {
     	$r1 = bin2hex(random_bytes(10));
     	$r2 = bin2hex(random_bytes(10));
     	$r3 = bin2hex(random_bytes(10));
     	$r4 = bin2hex(random_bytes(10));
     	$token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
     	return $token;
     }
     function formatMoney($cantidad)
     {
     	$cantidad = number_format($cantidad,2, SPD,SPM);
     	return $cantidad;
     }

?>