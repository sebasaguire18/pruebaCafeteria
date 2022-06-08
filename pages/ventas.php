<div class="content">
    <div class="rwg hvh-100">
        <div class="g-reg-2 pdx-3">
        </div>
        <div class="g-reg-10 pdx-3">
            <h0 class="txt-info">Realizar Venta</h0>
            <hr>
            <div class="mgy-5">
                <h4>Producto</h4>
                <div class="ruler-input mgt-4">
                    <select class="ruler-input_child-lg" id="productoAVender">
                        <?php selectProductos(); ?>
                    </select>
                </div>
                <div class="ruler-input mgt-4">
                    <input type="number" id="cantidadProd" class="ruler-input_child-lg bg-trs-6" placeholder="Cantidad" autocomplete="off">
                    <span class="txt-danger dp-none" id="spanCantidadProd"> Por favor ingresa ls cantidad a vender</span>
                    <span class="txt-danger dp-none" id="spanCantidadProdError"></span>
                </div>
                <div class="ruler-button">
                    <a id="btnIniciarSesion" type="submit" class="ruler-button_child-lg ruler-button-block bg-primary txt-white">Validar</a>
                </div>
            </div>
        </div>
        <div class="g-reg-2 pdx-3"> 
        </div>
    </div>
</div>
