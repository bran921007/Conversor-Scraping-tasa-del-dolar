<?php

$todo = file_get_contents("http://www.banreservas.com.do/Pages/ComercialDavidOrtiz.aspx");

//echo "<textarea>".$todo."</textarea>";

$inicio = strpos($todo, 'id="ctl00_m_g_a6605a42_9d12_436e_a07a_d862f308ba90_ctl00_cpUS"');

//echo $inicio;

$precio = substr($todo, $inicio+63, 100);
$precio = substr($precio, 0, strpos($precio,'">'));

echo $precio;

?>