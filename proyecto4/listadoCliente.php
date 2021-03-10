<?php
require_once 'cliente.entidad.php';
require_once 'factura.entidad.php';
require_once 'cliente.model.php';

// Logica
$alm = new Cliente();
$model = new ClienteModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('DNI',             $_REQUEST['DNI']);
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Dirección',       $_REQUEST['Dirección']);
			$alm->__SET('Teléfono',		   $_REQUEST['Teléfono']);

			$model->Actualizar($alm);
			header('Location: listadoCliente.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['DNI']);
			header('Location: listadoCliente.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['DNI']);
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
                
                <form action="?action='actualizar'" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    
                    <table style="width:500px;">
						<tr>
                            <th style="text-align:left;">DNI:</th>
                            <td><input type="text" disabled name="DNI" value="<?php echo $alm->__GET('DNI'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Nombre:</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                       <tr>
                            <th style="text-align:left;">Dirección:</th>
                            <td><input type="text" name="Dirección" value="<?php echo $alm->__GET('Dirección'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Teléfono:</th>
                            <td><input type="text" name="Teléfono" value="<?php echo $alm->__GET('Teléfono'); ?>" style="width:100%;" /></td>
                        </tr>
						<tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Dirección</th>
                            <th style="text-align:left;">Teléfono</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Dirección'); ?></td>
							<td><?php echo $r->__GET('Teléfono'); ?></td>
							
                            <td>
                                <a href="?action=editar&DNI=<?php echo $r->DNI; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&DNI=<?php echo $r->DNI; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table> 

				<table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Factura</th>
                            <th style="text-align:left;">Fecha</th>
                            <th style="text-align:left;">Total</th>
                            <th style="text-align:left;">DNI</th>
                            <th style="text-align:left;">Nombre</th>
                        </tr>
                    </thead>
                    <?php foreach($model->ListarFacturas() as $r): ?>
                        <tr>>
                            <td><?php echo $r->__GET('Factura'); ?></td>
                            <td><?php echo $r->__GET('Fecha'); ?></td>
							<td><?php echo $r->__GET('Total'); ?></td>
							<td><?php echo $r->__GET('DNI'); ?></td>
							<td><?php echo $r->__GET('Nombre'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table> 
            </div>
        </div>
		<a href="index.php">Volver al inicio</a>
    </body>
</html>