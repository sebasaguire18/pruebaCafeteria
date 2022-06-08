// Función que cambia el contenido principal de todas las pantallas recibiendo un string para saber que contendido llamar
function contenido(ventana) {
    $('#contentPrincipal').html(``);
    if (ventana == 'welcome') {
        $.ajax({
            type: "POST",
            url: "pages/welcome.php",
            data: "ventana=" + ventana,
            success: function(r) {
                configPage('welcome');
                $('#contentPrincipal').html(r);
            }
        });        
    }
    if (ventana == 'ventas') {
        $.ajax({
            type: "POST",
            url: "pages/ventas.php",
            data: "ventana=" + ventana,
            success: function(r) {
                configPage('ventas');
                $('#contentPrincipal').html(r);
            }
        });        
    }
}

// Función que da configuraciones extra al cargar el contenido de la vista
function configPage(page) {
    if (page == 'welcome') {
        $('#titlePage').html(`Bienvenido`);
        $('.nav-item').removeClass('active');
        $('.nav-itemInicio').addClass('active');
        tablas('tblListaProductos');
    }
    if (page == 'ventas') {
        $('#titlePage').html(`Ventas`);
        $('.nav-item').removeClass('active');
        $('.nav-itemVentas').addClass('active');
    }
}

// Función que carga la barra de navegación central
function contentNav(nav) {
    $('#contentNav').html(``);
    $.ajax({
        type: "POST",
        url: "pages/nav.php",
        data: "nav=" + nav,
        success: function(r) {
            $('#contentNav').html(r);
        }
    });
}

// Función que optiene el contenido de tablas dependiendo de su id
function tablas(tabla) {
    if (tabla == 'tblListaProductos') {
        $.ajax({
            type: "POST",
            url: "pages/tablas.php",
            data: "tabla=" + tabla,
            success: function(r) {
                $('#tblProductos').html(r);
                tblInit(tabla);
            }
        });
    }
}

// datatables
function tblInit(tabla) {
    $(function(){
        if (tabla == 'tblListaProductos') {
            // datatable de tabla contactos
            $('#tblListaProductos').DataTable({
                "language": {
                    "url": "extensions/datatables/Spanish.json"
                },
                responsive: "true",
                scrollCollapse: true,
                scrollX: true,
                dom: 'lfBrtip',
                buttons: [
                    {
                        extend:     'excelHtml5',
                        text:       '<span class="txt-white icon-file-excel"></span>',
                        titleattr:  'Exportar a Excel',
                        className:  'ruler-button_child bg-success'
                    },
                    {
                        extend:     'pdfHtml5',
                        text:       '<span class="txt-white icon-file-pdf"></span>',
                        titleattr:  'Exportar a Excel',
                        className:  'ruler-button_child bg-danger'
                    },
                    {
                        extend:     'print',
                        text:       '<span class="txt-white icon-printer"></span>',
                        titleattr:  'Exportar a Excel',
                        className:  'ruler-button_child bg-info'
                    },
                ]
            });
        }
    });
}

// Función para iniciar sesión
function iniciarSesion(usernameLoging,passLoging) {

    $('#btnIniciarSesion').text('Validando datos...');
    $('#usernameLoging','#passLoging').removeClass('bd-danger');
    $('#spanUsernameLogingError').addClass('dp-none');
    $('#spanPassLogingError').addClass('dp-none');

    $.ajax({
        type: "POST",
        url: "php/iniciosesion.php",
        data: "usernameLoging=" + usernameLoging + "&passLoging=" + passLoging,
        success: function(r) {
            setTimeout(function(){
                if (r == 'errorPassword') {
                    $('#passLoging').addClass('bd-danger');
                    $('#spanPassLogingError').removeClass('dp-none');
                    $('#btnIniciarSesion').text('Validar');
                }
                if(r == 'errorUsername'){
                    $('#usernameLoging').addClass('bd-danger');
                    $('#spanUsernameLogingError').removeClass('dp-none');
                    $('#btnIniciarSesion').text('Validar');
                }

                if (r == 'successSesion') {
                    window.location.href = 'welcome.php';
                }
            }, 500);
        }
    });
}

// Función que cambia de formularios para iniciar sesion, recuperar contraseña
function changeForm(form) {
    if (form == 'olvidoPass') {
        $('#box-sesion').addClass('dp-none');
        $('#box-olvidoPass').removeClass('dp-none');
    }else if (form == 'ini'){
        $('#box-olvidoPass').addClass('dp-none');
        $('#box-sesion').removeClass('dp-none');
    }
}

// Función que inserta un nuevo Producto
function insertarNuevoProducto() {

    let tipo = "nuevoProducto";

	let exprNumber = /^[a-zA-Z0-9.]+$/;

    let nombreNuevoProd = $('#nombreNuevoProd').val();
    let referenciaNuevoProd = $('#referenciaNuevoProd').val();
    let precioNuevoProd = $('#precioNuevoProd').val();
    let pesoNuevoProd = $('#pesoNuevoProd').val();
    let categoríaNuevoProd = $('#categoríaNuevoProd').val();
    let stockNuevoProd = $('#stockNuevoProd').val();


    $('#nombreNuevoProd','#referenciaNuevoProd','#precioNuevoProd','#pesoNuevoProd','#categoríaNuevoProd','#stockNuevoProd').removeClass('bd-danger');
    $('#spanNombreNuevoProd','#spanReferenciaNuevoProd','#spanPrecioNuevoProd','#spanPesoNuevoProd','#spanCategoríaNuevoProd','#spanStockNuevoProd').addClass('dp-none');


    if(nombreNuevoProd == ''){
        $('#nombreNuevoProd').addClass('bd-danger');
        $('#spanNombreNuevoProd').removeClass('dp-none');
        return false;
    }else{
        $('#nombreNuevoProd').removeClass('bd-danger');
        $('#spanNombreNuevoProd').addClass('dp-none');

        if(referenciaNuevoProd == ''){
            $('#referenciaNuevoProd').addClass('bd-danger');
            $('#spanReferenciaNuevoProd').removeClass('dp-none');
            return false;
        }else{
            $('#referenciaNuevoProd').removeClass('bd-danger');
            $('#spanReferenciaNuevoProd').addClass('dp-none');
            
            if(precioNuevoProd == '' || !exprNumber.test(precioNuevoProd)){
                $('#precioNuevoProd').addClass('bd-danger');
                $('#spanPrecioNuevoProd').removeClass('dp-none');
                return false;
            }else{
                $('#precioNuevoProd').removeClass('bd-danger');
                $('#spanPrecioNuevoProd').addClass('dp-none'); 
                
                if(pesoNuevoProd == '' || !exprNumber.test(pesoNuevoProd)){
                    $('#pesoNuevoProd').addClass('bd-danger');
                    $('#spanPesoNuevoProd').removeClass('dp-none');
                    return false;
                }else{
                    $('#pesoNuevoProd').removeClass('bd-danger');
                    $('#spanPesoNuevoProd').addClass('dp-none'); 

                    if(categoríaNuevoProd == ''){
                        $('#categoríaNuevoProd').addClass('bd-danger');
                        $('#spanCategoríaNuevoProd').removeClass('dp-none');
                        return false;
                    }else{
                        $('#categoríaNuevoProd').removeClass('bd-danger');
                        $('#spanCategoríaNuevoProd').addClass('dp-none');
                        
                        if(stockNuevoProd == '' || !exprNumber.test(precioNuevoProd)){
                            $('#stockNuevoProd').addClass('bd-danger');
                            $('#spanStockNuevoProd').removeClass('dp-none');
                            return false;
                        }else{
                            $('#stockNuevoProd').removeClass('bd-danger');
                            $('#spanStockNuevoProd').addClass('dp-none');

                            // En este punto ya con el formulario validado podemos enviar los datos al servidor.
                            cerrarModal('crearProducto');
                            $.ajax({
                                type: "POST",
                                url: "php/controler.php",
                                data: "tipo=" + tipo + "&nombreNuevoProd=" + nombreNuevoProd + "&referenciaNuevoProd=" + referenciaNuevoProd + "&precioNuevoProd=" + precioNuevoProd + "&pesoNuevoProd=" + pesoNuevoProd + "&categoríaNuevoProd=" + categoríaNuevoProd + "&stockNuevoProd=" + stockNuevoProd,
                                success: function(r) {
                                    if (r == 'success') {
                                        sweetAlertType('success','welcome');
                                        cerrarModal('modalNuevoProducto');
                                    }else if(r == 'error'){
                                        sweetAlertType('error','welcome');
                                    }else if(r == 'info'){
                                        sweetAlertType('info','welcome');
                                    }
                                }
                            });
                        }
                    }
                }
            }
        }
    }
}

// Función para editar por id y tipo de edición
function editar(id,tipo) {
    if (tipo == 'producto') {
        $.ajax({
            type: "POST",
            url: "pages/extrapages/editar.php",
            data: "tipo=" + tipo + "&id=" + id,
            success: function(r) {
                $('#editarProdBody').html(r);
                abrirModal('editarProducto');
            }
        });
    }
}

// Función para eliminar por id y tipo
function eliminar(id,tipo) {
    if (tipo == 'producto') {
        sweetAlertType('eliminar','productos',id);
    }
}

// Función para eliminar por id y tipo
function ConfirmEliminar(id,tipo) {
    if (tipo == 'productos') {
        
        type = 'eliminarProducto';
        $.ajax({
            type: "POST",
            url: "php/controler.php",
            data: "tipo=" + type + "&idEliminar=" + id,
            success: function(r) {
                if (r == 'success') {
                    sweetAlertType('success','welcome');
                }else if(r == 'error'){
                    sweetAlertType('error','welcome');
                }else if(r == 'info'){
                    sweetAlertType('info','welcome');
                }
            }
        });
    }
}

// Función para editar Productos
function editarProducto(id) {
    
    let tipo = "editarProducto";

    let exprNumber = /^[a-zA-Z0-9.]+$/;

    let nombreNuevoProdE = $('#nombreNuevoProdE').val();
    let referenciaNuevoProdE = $('#referenciaNuevoProdE').val();
    let precioNuevoProdE = $('#precioNuevoProdE').val();
    let pesoNuevoProdE = $('#pesoNuevoProdE').val();
    let categoríaNuevoProdE = $('#categoríaNuevoProdE').val();
    let stockNuevoProdE = $('#stockNuevoProdE').val();


    $('#nombreNuevoProdE','#referenciaNuevoProdE','#precioNuevoProdE','#pesoNuevoProdE','#categoríaNuevoProdE','#stockNuevoProdE').removeClass('bd-danger');
    $('#spanNombreNuevoProdE','#spanReferenciaNuevoProdE','#spanPrecioNuevoProdE','#spanPesoNuevoProdE','#spanCategoríaNuevoProdE','#spanStockNuevoProdE').addClass('dp-none');


    if(nombreNuevoProdE == ''){
        $('#nombreNuevoProdE').addClass('bd-danger');
        $('#spanNombreNuevoProdE').removeClass('dp-none');
        return false;
    }else{
        $('#nombreNuevoProdE').removeClass('bd-danger');
        $('#spanNombreNuevoProdE').addClass('dp-none');

        if(referenciaNuevoProdE == ''){
            $('#referenciaNuevoProdE').addClass('bd-danger');
            $('#spanReferenciaNuevoProdE').removeClass('dp-none');
            return false;
        }else{
            $('#referenciaNuevoProdE').removeClass('bd-danger');
            $('#spanReferenciaNuevoProdE').addClass('dp-none');
            
            if(precioNuevoProdE == '' || !exprNumber.test(precioNuevoProdE)){
                $('#precioNuevoProdE').addClass('bd-danger');
                $('#spanPrecioNuevoProdE').removeClass('dp-none');
                return false;
            }else{
                $('#precioNuevoProdE').removeClass('bd-danger');
                $('#spanPrecioNuevoProdE').addClass('dp-none'); 
                
                if(pesoNuevoProdE == '' || !exprNumber.test(pesoNuevoProdE)){
                    $('#pesoNuevoProdE').addClass('bd-danger');
                    $('#spanPesoNuevoProdE').removeClass('dp-none');
                    return false;
                }else{
                    $('#pesoNuevoProdE').removeClass('bd-danger');
                    $('#spanPesoNuevoProdE').addClass('dp-none'); 

                    if(categoríaNuevoProdE == ''){
                        $('#categoríaNuevoProdE').addClass('bd-danger');
                        $('#spanCategoríaNuevoProdE').removeClass('dp-none');
                        return false;
                    }else{
                        $('#categoríaNuevoProdE').removeClass('bd-danger');
                        $('#spanCategoríaNuevoProdE').addClass('dp-none');
                        
                        if(stockNuevoProdE == '' || !exprNumber.test(precioNuevoProdE)){
                            $('#stockNuevoProdE').addClass('bd-danger');
                            $('#spanStockNuevoProdE').removeClass('dp-none');
                            return false;
                        }else{
                            $('#stockNuevoProdE').removeClass('bd-danger');
                            $('#spanStockNuevoProdE').addClass('dp-none');

                            // En este punto ya con el formulario validado podemos enviar los datos al servidor.
                            cerrarModal('editarProducto');
                            $.ajax({
                                type: "POST",
                                url: "php/controler.php",
                                data: "tipo=" + tipo + "&idProducto=" + id + "&nombreNuevoProdE=" + nombreNuevoProdE + "&referenciaNuevoProdE=" + referenciaNuevoProdE + "&precioNuevoProdE=" + precioNuevoProdE + "&pesoNuevoProdE=" + pesoNuevoProdE + "&categoríaNuevoProdE=" + categoríaNuevoProdE + "&stockNuevoProdE=" + stockNuevoProdE,
                                success: function(r) {
                                    if (r == 'success') {
                                        sweetAlertType('success','welcome');
                                        cerrarModal('closemodalEditProducto');
                                    }else if(r == 'error'){
                                        sweetAlertType('error','welcome');
                                    }else if(r == 'info'){
                                        sweetAlertType('info','welcome');
                                    }
                                }
                            });
                        }
                    }
                }
            }
        }
    }

    
}

// Función que limpia formularios por id
function limpiarFormulario(nombre) {
    document.getElementById(nombre).reset();
}


// sweetAlert
function sweetAlertType(type,page, id = false) {
    $(function(){
        if (type == 'success') {
            Swal.fire({
                icon: "success",
                title: "Registrado correctamente"
            }).then(() => {
                contenido(page);
            });
        }
        if (type == 'successNoReload') {
            Swal.fire({
                icon: "success",
                title: "Registrado correctamente"
            }).then(() => {
                limpiarFormulario('formNuevoContactoOp');
                limpiarFormulario('formNuevoProductoOp');
                limpiarFormulario('formNuevoProductoOrg');
                limpiarFormulario('formNuevoContactoOrg');
            });
        }
        if (type == 'error') {
            Swal.fire({
                icon: "error",
                title: "El registro no se pudo realizar"
            });
        }
        if (type == 'info') {
            Swal.fire({
                icon: "info",
                title: "Algunos campos obligatorios deben contener valores"
            });
        }
        if (type == 'eliminado') {
            Swal.fire({
                icon: "success",
                title: "Eliminado correctamente"
            }).then(() => {
                contenido(page);
            });
        }
        if (type == 'eliminar') {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Quieres eliminar el registro seleccionado?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    ConfirmEliminar(id,page);
                }
            });
        }
    });
}

// Necesario para abrir cualquier modal
function abrirModal(idModal) {
    $('.overlay'+idModal).addClass('activeP');
    $('#'+idModal).addClass('activeP');
}

// Necesario para cerrar cualquier modal
function cerrarModal(idModal) {
    $('.overlay'+idModal).removeClass('activeP');
    $('#'+idModal).removeClass('activeP');
}