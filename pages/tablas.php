<?php

include '../php/conexion-bd.php';

include '../php/function.php';

include '../php/modelo.php';

$tabla = $_POST['tabla'];

if ($tabla == 'tblListaProductos') {
    $seleccionarProductos = mysqli_query($conexion,"SELECT * FROM productos WHERE prod_status = 1 ORDER BY prod_fecha ASC");

    while ($producto = mysqli_fetch_array($seleccionarProductos)) {
    
    ?>
            <tr>
                <td><?php echo $producto['prod_id']; ?></td>
                <td><?php echo $producto['prod_nombre']; ?></td>
                <td><?php echo $producto['prod_ref']; ?></td>
                <td><?php echo formatoAPrecio($producto['prod_precio']); ?></td>
                <td><?php echo $producto['prod_peso'].' Lb'; ?></td>
                <td><?php echo $producto['prod_cat']; ?></td>
                <td><?php echo $producto['prod_stock']; ?></td>
                <td><?php echo formatoAFecha($producto['prod_fecha']); ?></td>
                <td class="px-4 dp-flex alg-itm-center ">
                    <button title="Editar" value="<?php echo $producto['prod_id']; ?>" onclick="editar('<?php echo $producto['prod_id']; ?>','producto')" class="ruler-button_child bg-warning txt-white pd-2 mgr-2"><i class="icon-pencil"></i></button>
                    <button title="Eliminar" value="<?php echo $producto['prod_id']; ?>" onclick="eliminar('<?php echo $producto['prod_id']; ?>','producto')" class="ruler-button_child bg-danger txt-white pd-2 mgl-2"><i class="icon-bin"></i></button>
                </td>
            </tr>
    <?php   
    }
}

if ($tabla == 'tblListaVentas') {
    $seleccionarVentas = mysqli_query($conexion,"SELECT * FROM ventas INNER JOIN productos ON ventas.venta_id_producto = productos.prod_id WHERE venta_status = 1 ORDER BY venta_fecha ASC");

    while ($venta = mysqli_fetch_array($seleccionarVentas)) {
    
    ?>
            <tr>
                <td><?php echo $venta['venta_id']; ?></td>
                <td><?php echo $venta['venta_id_producto']; ?></td>
                <td><?php echo $venta['prod_nombre']; ?></td>
                <td><?php echo $venta['venta_cantidad']; ?></td>
                <td><?php echo formatoAPrecio($venta['prod_precio'] * $venta['venta_cantidad']); ?></td>
                <td><?php echo formatoAFecha($venta['venta_fecha']); ?></td>
                
            </tr>
    <?php   
    }
}

?>