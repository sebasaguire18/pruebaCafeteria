
<div class="rwg hvh-100">
    <div class="g-reg-1 pd-3">
    </div>
    <div class="g-reg-3 pdx-3">
        <div class="rwg h-50">
            <div class="g-reg-14">
                <h4 class="mg-2">Producto más vendido</h4>
                <hr>
                <div class="dp-flex jfy-ctn-center alg-itm-center">
                    <div class="part">
                        <h6>Nombre Producto</h6>
                        <p>precio</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rwg h-50">
            <div class="g-reg-14">
                <h4 class="mg-2">Producto con mayor stock</h4>
                <hr>
                <div class="dp-flex jfy-ctn-center alg-itm-center">
                    <div class="part">
                        <h6>Nombre Producto</h6>
                        <p>precio</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="g-reg-9 pdx-3">
        <div class="rwg">
            <div class="g-reg-7 dp-flex jfy-ctn-start alg-itm-center">
                <h4 class="mg-2 mgb-5">Lista de productos</h4>
            </div>
            <div class="g-reg-7 dp-flex jfy-ctn-end alg-itm-center">
                <a class="ruler-button_child bg-success txt-white" onclick="abrirModal('crearProducto')" title="Crear Producto"> <span class="icon-plus"></span></a>
            </div>
        </div>
        <table class="tbl tbl-striped" id="tblListaProductos">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Fecha creación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tblProductos">
            </tbody>
        </table>
    </div>
    <div class="g-reg-1 pd-3">
    </div>
</div>



<!-- modal crear producto -->
<div class="overlay overlaycrearProducto" id="overlay">
    <div class="popup part bg-light pd-6" id="crearProducto">
        <a href="#" class="btn-cerrar-popup" onclick="cerrarModal('crearProducto')"><i class="icon-cross"></i></a>
        <form >
            <div class="ruler-title">
                <h3>Añadir Nuevo Producto</h3>
            </div>
            <div class="ruler-input mgt-4 contenedor-inputs">
                <input type="text" id="nombreNuevoProd" class="ruler-input_child-lg bg-trs-6" placeholder="Nombre" autocomplete="off">
                <span class="txt-danger dp-none" id="spanNombreNuevoProd"> Por favor ingresa el nombre del producto</span>
            </div>
            <div class="ruler-input contenedor-inputs">
                <input type="text" id="referenciaNuevoProd" class="ruler-input_child-lg bg-trs-6" placeholder="Referencia" autocomplete="off">
                <span class="txt-danger dp-none" id="spanReferenciaNuevoProd">Por favor ingresa la referencia</span>
            </div>
            <div class="ruler-input contenedor-inputs">
                <input type="number" id="precioNuevoProd" class="ruler-input_child-lg bg-trs-6" placeholder="Precio" autocomplete="off">
                <span class="txt-danger dp-none" id="spanPrecioNuevoProd">Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
            </div>
            <div class="ruler-input contenedor-inputs">
                <input type="number" id="pesoNuevoProd" class="ruler-input_child-lg bg-trs-6" placeholder="Peso en Lb (libras)" autocomplete="off">
                <span class="txt-danger dp-none" id="spanPesoNuevoProd">Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
            </div>
            <div class="ruler-input contenedor-inputs">
                <input type="text" id="categoríaNuevoProd" class="ruler-input_child-lg bg-trs-6" placeholder="Categoría" autocomplete="off">
                <span class="txt-danger dp-none" id="spanCategoríaNuevoProd">Por favor ingresa la categoría</span>
            </div>
            <div class="ruler-input mgb-4 contenedor-inputs">
                <input type="number" id="stockNuevoProd" class="ruler-input_child-lg bg-trs-6" placeholder="Unidades en Stock" autocomplete="off">
                <span class="txt-danger dp-none" id="spanStockNuevoProd">Digita un valor numérico o la cantidad no puede ser 0 (cero)</span>
            </div>
            <div class="ruler-button">
                <a class="ruler-button_child-lg ruler-button-block bg-primary txt-white" onclick="insertarNuevoProducto()">Validar</a>
            </div>
        </form>
    </div>
</div>

<!-- modal editar -->
<div class="overlay overlayeditarProducto" id="overlay">
    <div class="popup part bg-light pd-6" id="editarProducto">
        <a href="#" class="btn-cerrar-popup" onclick="cerrarModal('editarProducto')"><i class="icon-cross"></i></a>
        <div id="editarProdBody">

        </div>
    </div>
</div>
