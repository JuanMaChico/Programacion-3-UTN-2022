<?php
/*
Práctica parcial Bacchetta Tomás



Bacchetta, Tomás
*/

require_once("venta.php");
require_once("accesoDatosSql.php");

class VentaDatosSql
{
	public static function InsertarVentaEnTabla($venta)
	{
		$objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (mail_usuario, id_pizza, sabor, tipo, cantidad, fecha)
		values(:mail, :idpizza, :sabor, :tipo, :cantidad, :fecha)");		

		$consulta->bindValue(':mail', $venta->get_mail(), PDO::PARAM_STR);
		$consulta->bindValue(':idpizza', $venta->get_idPizza(), PDO::PARAM_INT);
		$consulta->bindValue(':sabor', $venta->get_sabor(), PDO::PARAM_STR);
		$consulta->bindValue(':tipo', $venta->get_tipo(), PDO::PARAM_STR);
		$consulta->bindValue(':cantidad', $venta->get_cantidad(), PDO::PARAM_INT);
		$consulta->bindValue(':fecha', $venta->get_fecha(), PDO::PARAM_INT);
		
		
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();		
	}

	
	public static function ObtenerTotalPizzasVendidas(){
		$objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(cantidad) FROM ventas");
		
		$consulta->execute();	
		
		
		return $consulta->fetch(PDO::FETCH_COLUMN);	
	}
	
	
}

?>
