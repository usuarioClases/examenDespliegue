<?php
class ClienteModel
{
	private $cn;

	public function __CONSTRUCT()
	{
		try
		{
			$this->cn = new PDO('mysql:host=localhost;dbname=examenDespliegue', 'usuario', 'usuario');
			$this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->cn->prepare("SELECT * FROM clientes");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Cliente();

				$alm->__SET('DNI', $r->DNI);
				$alm->__SET('Nombre', $r->Nombre);
				$alm->__SET('Dirección', $r->Dirección);
				$alm->__SET('Teléfono', $r->Teléfono);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarFacturas()
	{
		try
		{
			$result = array();

			$stm = $this->cn->prepare("SELECT Factura, Fecha, Total, clientes.DNI, Nombre FROM clientes join cabecera_de_ventas on cabecera_de_ventas.DNI = clientes.DNI;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Factura();

				$alm->__SET('Factura', $r->Factura);
				$alm->__SET('Fecha', $r->Fecha);
				$alm->__SET('Total', $r->Total);
				$alm->__SET('DNI', $r->DNI);
				$alm->__SET('Nombre', $r->Nombre);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($DNI)
	{
		try 
		{
			$stm = $this->cn->prepare("SELECT * FROM clientes WHERE DNI = ?");
			          

			$stm->execute(array($DNI));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Cliente();

			$alm->__SET('DNI', $r->DNI);
			$alm->__SET('Nombre', $r->Nombre);
			$alm->__SET('Dirección', $r->Dirección);
			$alm->__SET('Teléfono', $r->Teléfono);
			
			return $alm;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($DNI)
	{
		try 
		{
			$stm = $this->cn->prepare("DELETE FROM clientes WHERE DNI = ?");			          

			$stm->execute(array($DNI));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Cliente $data)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						Nombre = ?, 
						Dirección = ?, 
						Teléfono = ?,
				    WHERE DNI = ? ";

			$this->cn->prepare($sql)->execute(
				array(	
					$data->__GET('Nombre'), 
					$data->__GET('Dirección'),
					$data->__GET('Teléfono'),
					$data->__GET('DNI'),
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
			$sql = "INSERT INTO clientes (DNI,Nombre,Dirección,Teléfono) VALUES (?, ?, ?, ?)";

			$this->cn->prepare($sql)->execute(
				array(
					$data->__GET('DNI'),
					$data->__GET('Nombre'), 
					$data->__GET('Dirección'),
					$data->__GET('Teléfono')
				)
			);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}