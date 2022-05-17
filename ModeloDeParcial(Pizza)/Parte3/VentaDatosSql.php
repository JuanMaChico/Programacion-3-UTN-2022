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

	 public static function ObtenerVentasDeLaTablaEntreDosFechasOrdenadasPorSabor($fechaDesde, $fechaHasta)
	 {
		$objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE (fecha BETWEEN :fechadesde AND :fechahasta) ORDER BY sabor ASC");
		$consulta->bindValue(':fechadesde', $fechaDesde, PDO::PARAM_STR);
		$consulta->bindValue(':fechahasta', $fechaHasta, PDO::PARAM_STR);
		$consulta->execute();	
		$ventas = array();
		while ($ventaSql = $consulta->fetch(PDO::FETCH_OBJ))
		{
			
			array_push($ventas, new Venta($ventaSql->num_pedido, $ventaSql->mail_usuario, $ventaSql->id_pizza, $ventaSql->sabor, $ventaSql->tipo, $ventaSql->cantidad, $ventaSql->fecha));
		}

		 return $ventas;
	 }

	 public static function ObtenerVentasDeLaTablaPorUsuario($usuario)
	 {
		 $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		 $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE mail_usuario = :usuario");
		 $consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
		 $consulta->execute();	
		 $ventas = array();
		while ($ventaSql = $consulta->fetch(PDO::FETCH_OBJ))
		{
			
			array_push($ventas, new Venta($ventaSql->num_pedido, $ventaSql->mail_usuario, $ventaSql->id_pizza, $ventaSql->sabor, $ventaSql->tipo, $ventaSql->cantidad, $ventaSql->fecha));
		}

		 return $ventas;
	 }

	 public static function ObtenerVentasDeLaTablaPorSabor($sabor)
	 {
		 $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		 $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE sabor = :sabor");
		 $consulta->bindValue(':sabor', $sabor, PDO::PARAM_STR);
		 $consulta->execute();	
		 $ventas = array();
		while ($ventaSql = $consulta->fetch(PDO::FETCH_OBJ))
		{
			
			array_push($ventas, new Venta($ventaSql->num_pedido, $ventaSql->mail_usuario, $ventaSql->id_pizza, $ventaSql->sabor, $ventaSql->tipo, $ventaSql->cantidad, $ventaSql->fecha));
		}

		 return $ventas;
	 }

	
	public static function ObtenerTotalPizzasVendidas(){
		$objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(cantidad) FROM ventas");
		
		$consulta->execute();	
		
		
		return $consulta->fetch(PDO::FETCH_COLUMN);	
	}

	public static function ObtenerUnaVentaPorNumPedido($numPedido)
	 {
		 $objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		 $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM ventas WHERE num_pedido = :numpedido");
		 $consulta->bindValue(':numpedido', $numPedido, PDO::PARAM_INT);
		 $consulta->execute();	
		 $ventaSql = $consulta->fetch(PDO::FETCH_OBJ);
		 if ($ventaSql){
			return new Venta($ventaSql->num_pedido, $ventaSql->mail_usuario, $ventaSql->id_pizza, $ventaSql->sabor, $ventaSql->tipo, $ventaSql->cantidad, $ventaSql->fecha);
		 } else {
			 return false;
		 }

	 }


	 public static function ModificarVentaEnTabla($venta)
	{
		$objetoAccesoDato = AccesoDatosSql::ObtenerObjectoAccesoDatos(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			update ventas 
			set mail_usuario=:mailusuario,
			sabor=:sabor,
			tipo=:tipo,
			cantidad=:cantidad,
			fecha=:fecha

			WHERE num_pedido=:numpedido");

		$consulta->bindValue(':mailusuario', $venta->get_mail(), PDO::PARAM_STR);
		$consulta->bindValue(':sabor', $venta->get_sabor(), PDO::PARAM_STR);
		$consulta->bindValue(':tipo', $venta->get_tipo(), PDO::PARAM_STR);
		$consulta->bindValue(':cantidad', $venta->get_stock(), PDO::PARAM_INT);
		$consulta->bindValue(':fecha', $venta->get_fecha(), PDO::PARAM_STR);
		$consulta->bindValue(':numpedido', $venta->get_numPedido(), PDO::PARAM_INT);

		return $consulta->execute();

	}

	

	
	
	
}

?>