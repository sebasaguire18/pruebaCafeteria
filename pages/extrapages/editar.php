<?php

include '../../php/conexion-bd.php';

include '../../php/function.php';

$tipo = $_POST['tipo'];

if ($tipo == 'producto') {
    $id = $_POST['id'];
    $consultaProductoEdit=mysqli_query($conexion,"SELECT * FROM productos WHERE prod_id = '$id'");

    while ($produtoE = mysqli_fetch_array($consultaProductoEdit)) {

    ?>
        
        <i>(Los campos que no desees modificar dejalos como están)</i>
        <form id="formNuevoProductoEdit">
            <div class="row">
                <div class="ruler-input mgt-4 contenedor-inputs">
                    <label for="nombreNuevoProdE" class="txt-black">Nombre:</label>
                    <input type="text" id="nombreNuevoProdE" class="ruler-input_child-lg bg-trs-6" placeholder="Nombre" value="<?php echo $produtoE['prod_nombre'] ?>" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanNombreNuevoProdE"> Por favor ingresa el nombre del producto</span>
                </div>
                <div class="ruler-input contenedor-inputs">
                    <label for="referenciaNuevoProdE" class="txt-black">Referencia:</label>
                    <input type="text" id="referenciaNuevoProdE" class="ruler-input_child-lg bg-trs-6" placeholder="Referencia" value="<?php echo $produtoE['prod_ref'] ?>" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanReferenciaNuevoProdE">Por favor ingresa la referencia</span>
                </div>
                <div class="ruler-input contenedor-inputs">
                    <label for="precioNuevoProdE" class="txt-black">Precio:</label>
                    <input type="number" id="precioNuevoProdE" class="ruler-input_child-lg bg-trs-6" placeholder="Precio" value="<?php echo $produtoE['prod_precio'] ?>" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanPrecioNuevoProdE">Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
                </div>
                <div class="ruler-input contenedor-inputs">
                    <label for="pesoNuevoProdE" class="txt-black">Peso en Lb (libras):</label>
                    <input type="number" id="pesoNuevoProdE" class="ruler-input_child-lg bg-trs-6" placeholder="Peso en Lb (libras)" value="<?php echo $produtoE['prod_peso'] ?>" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanPesoNuevoProdE">Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
                </div>
                <div class="ruler-input contenedor-inputs">
                    <label for="categoríaNuevoProdE" class="txt-black">Categoría:</label>
                    <input type="text" id="categoríaNuevoProdE" class="ruler-input_child-lg bg-trs-6" placeholder="Categoría" value="<?php echo $produtoE['prod_cat'] ?>" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanCategoríaNuevoProdE">Por favor ingresa la categoría</span>
                </div>
                <div class="ruler-input mgb-4 contenedor-inputs">
                    <label for="stockNuevoProdE" class="txt-black">Unidades en Stock:</label>
                    <input type="number" id="stockNuevoProdE" class="ruler-input_child-lg bg-trs-6" placeholder="Unidades en Stock" value="<?php echo $produtoE['prod_stock'] ?>" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanStockNuevoProdE">Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
                </div>
                <div class="ruler-button">
                    <input class="ruler-button_child-lg ruler-button-block bg-primary txt-white" onclick="editarProducto('<?php echo $produtoE['prod_id']; ?>')" value="Editar">
                </div>
            </div>
        </form>
    <?php

    }
}

?>