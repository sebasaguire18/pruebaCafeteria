
<div class="rwg hvh-100">
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
    <div class="g-reg-8 pdx-3">
        <h4 class="mg-2">Lista de productos</h4>
        <table class="tbl tbl-striped pdy-4" id="tblListaProductos">
            <thead>
                <tr>
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
    <div class="g-reg-3 pdx-3">
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
        <h4>3</h4>
    </div>
</div>



<!-- modal  -->
<div class="overlay" id="overlay">
    <div class="popup part bg-trs-6 pd-6" id="popup">
        <a href="#" class="btn-cerrar-popup" onclick="cerrarModal('popup')"><i class="icon-cross"></i></a>
        <form action="#" method="post">
            <div class="ruler-title">
                <h3>Iniciar Sesión</h3>
            </div>
            <div class="ruler-input mgt-4 contenedor-inputs">
                <input type="email" id="usernameLoging" class="ruler-input_child-lg bg-trs-6" placeholder="Email" autocomplete="off">
                <span class="txt-danger dp-none" id="spanUsernameLoging"> Por favor ingresa un email valido</span>
                <span class="txt-danger dp-none" id="spanUsernameLogingError">Email no encontrado</span>
            </div>
            <div class="ruler-input mgb-4 contenedor-inputs">
                <input type="password" id="passLoging" class="ruler-input_child-lg bg-trs-6" placeholder="Contraseña" autocomplete="off">
                <span class="txt-danger dp-none" id="spanPassLoging">Por favor ingresa la contraseña</span>
                <span class="txt-danger dp-none" id="spanPassLogingError">Contraseña erronea</span>
            </div>
            <div class="ruler-link">
                <a id="olvidoPassword" onclick="changeForm('olvidoPass')" class="ruler-link_child">¿Olvidó la contraseña?</a>
            </div>
            <div class="ruler-button">
                <input type="submit" class="ruler-button_child-lg ruler-button-block bg-primary txt-white" value="Validar">
            </div>
        </form>
    </div>
</div>
