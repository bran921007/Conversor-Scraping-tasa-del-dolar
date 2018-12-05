<?php

$resultado ="";

if($_POST)
{
	$moneda1 = $_POST['txtOpcion1'];
	$moneda2 = $_POST['txtOpcion2'];
	$valor = $_POST['txtCantidad'];
	$resultado= currencyConversor($moneda1, $moneda2, $valor)." ".$moneda2;
	file_get_contents("http://adamix.net/practica/?m=web-grupo1&t=9&e=0000-0000&op={$valor}{$moneda1}={$resultado}{$moneda2}");
}
function currencyConversor($moneda_origen,$moneda_destino,$cantidad) {
    $get = file_get_contents("https://www.google.com/finance/converter?a=$cantidad&from=$moneda_origen&to=$moneda_destino");
    $get = explode("<span class=bld>",$get);
    $get = explode("</span>",$get[1]);  
    return preg_replace("/[^0-9\.]/", null, $get[0]);
    
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Conversor de Divisas</title>
	<style>
		body{
			background-color: #FF8040;
			font-size: 16px;
			font-color: #FFFFFF;
			text-decoration: white;
		}
		#tlbDatos{
			background: white;
			padding: 1em;
			margin; 1em, 0.5em, 0.1em, 1em;
			border-radius: 0.5em;

		}
	</style>
</head>
<body>
	<header id="header" class="">
		
	</header><!-- /header -->
	<h1>Conversor </h1>
	<form action="conversor.php" method="POST"/>
	<table id="tlbDatos">
		<caption>Dolar EstadoUnidense(USD)- Peso Dominicano(DOP)</caption>
		<tr>
			<th>Ingrese la cantidad:</th>
			<td><input type="text" value="" name="txtCantidad"/></td>
		</tr>
		<tr>
			<td><select name="txtOpcion1"/>
				<option name="txtOpcion1" value="DOP">Peso Dominicano (DOP)</option>
				<option name="txtOpcion1" value="USD">Dolar Estado Unidense (USD)</option>
				</select> ->
			</td>
		
			<td><select name="txtOpcion2"/>
				<option name="txtOpcion2" value="USD">Dolar Estado Unidense (USD)</option>
				<option name="txtOpcion2" value="DOP">Peso Dominicano (DOP)</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit"/></td>
		</tr>
		<tr>
			<td><input readonly="readonly" type="label" value="<?php if(isset($resultado)){ echo $resultado; }else{ echo "";}  ?>"</td>
		</tr>
	</table>
	</form>

	<section>
		<article>
			<?php
			include('tasa.php');
			?>
			<p id="tasa"><strong>La tasa de hoy es: <?php echo $precio; ?></strong></p>

		</article>
	</section>
	<footer>
		
	</footer>

</body>
</html>
