<?php
require_once 'cliente.entidad.php';
require_once 'cliente.model.php';

// Logica
$alm = new Cliente();
$model = new ClienteModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'registrar':
			$alm->__SET('DNI',             $_REQUEST['DNI']);
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Dirección',       $_REQUEST['Dirección']);
			$alm->__SET('Teléfono',		   $_REQUEST['Teléfono']);

			$model->Registrar($alm);
			header('Location: nuevoCliente.php');
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>PRACTICA CRUD 2DAW</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">  
                <form action="?action='registrar'" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <table style="width:500px;">
						<tr>
                            <th style="text-align:left;">DNI:</th>
                            <td><input type="text" name="DNI" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Nombre:</th>
                            <td><input type="text" name="Nombre" style="width:100%;" /></td>
                        </tr>
                       <tr>
                            <th style="text-align:left;">Dirección:</th>
                            <td><input type="text" name="Dirección" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Teléfono:</th>
                            <td><input type="text" name="Teléfono" style="width:100%;" /></td>
                        </tr>
						<tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>                  
            </div>
        </div>
		<a href="index.php">Volver al inicio</a>
    </body>
</html>