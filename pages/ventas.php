<?php include '../php/function.php'; ?>
<div class="rwg hvh-100">
    <div class="g-reg-1 pdx-3">
    </div>
    <div class="g-reg-5 pdx-3">
        <h0 class="txt-info">Realizar Venta</h0>
        <hr>
        <div class="mgy-5">
            <h4>Producto</h4>
            <div class="ruler-input mgt-4">
                <select class="ruler-input_child-lg" id="productoAVender">
                    <?php selectProductos(1); ?>
                </select>
                <span class="txt-danger dp-none" id="spanProductoAVender"> Por favor elige un producto</span>
            </div>
            <div class="ruler-input mgt-4">
                <input type="number" id="cantidadProdVender" class="ruler-input_child-lg bg-trs-6" placeholder="Cantidad" autocomplete="off">
                <span class="txt-danger dp-none" id="spanCantidadProdVender"> Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
            </div>
            <div class="ruler-button">
                <a class="ruler-button_child-lg ruler-button-block bg-primary txt-white" onclick="insertarNuevaVenta()">Registrar Venta</a>
            </div>
        </div>
    </div>
    <div class="g-reg-7">
        <div class="rwg">
            <div class="g-reg-7 dp-flex jfy-ctn-start alg-itm-center">
                <h4 class="mg-2 mgb-5">Lista de Ventas</h4>
            </div>
        </div>
        <table class="tbl tbl-striped" id="tblListaVentas">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>ID Producto</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad vendido</th>
                    <th>Precio total vendido</th>
                    <th>Fecha creación</th>
                </tr>
            </thead>
            <tbody id="tblVentas">
            </tbody>
        </table>
    </div>
    <div class="g-reg-1 pdx-3"> 
    </div>
</div>
