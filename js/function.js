// función que cambia el contenido principal de todas las pantallas recibiendo un string para saber que contendido llamar
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
}

// función que da configuraciones extra al cargar el contenido de la vista
function configPage(page) {
    if (page == 'welcome') {
        // contentNav('Welcome');
        $('#titlePage').html(`Bienvenido`);
        $('.nav-item').removeClass('active');
        $('.nav-itemInicio').addClass('active');
    }
}

// función que carga la barra de navegación central
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

// función que optiene el contenido de tablas dependiendo de su id
function tablas(tabla) {
    if (tabla == 'tblLista') {
        $.ajax({
            type: "POST",
            url: "pages/tablas.php",
            data: "tabla=" + tabla,
            success: function(r) {
                $('#tblContent').html(r);
                tblInit(tabla);
            }
        });
    }
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

// función que cambia de formularios para iniciar sesion, recuperar contraseña
function changeForm(form) {
    if (form == 'olvidoPass') {
        $('#box-sesion').addClass('dp-none');
        $('#box-olvidoPass').removeClass('dp-none');
    }else if (form == 'ini'){
        $('#box-olvidoPass').addClass('dp-none');
        $('#box-sesion').removeClass('dp-none');
    }
}

// función que inserta un nuevo registro
function insertarNuevoRegistro(reload) {

    var tipo = "nuevoRegistro";
    
    if (reload == 1) {
        // Aquí recogemos los datos de los campos que tengamos en los formularios
        var Registro1 = $('#Registro1').val();
        var Registro2 = $('#Registro2').val();
    }

    $.ajax({
        type: "POST",
        url: "php/controler.php",
        data: "tipo=" + tipo + "&Registro1=" + Registro1 + "&Registro2=" + Registro2 + "&reload=" + reload,
        success: function(r) {
            if (reload == 1) {
                if (r == 'success') {
                    // con esta función creamos alertas, debe enviarse el tipo de alerta y la página a recargar 
                    // *(Al enviar success como primer parametro le indicamos a la función 
                    // que me cree la alerta y que después de su confirmación se recargue la página)*
                    sweetAlertType('success','welcome');
                    // con esta función creamos modales, debe enviarse el id del botón que cerraría el modal de manera manual
                    cerrarModal('closemodalNuevoRegistro');
                }else if(r == 'error'){
                    // con esta función creamos alertas, debe enviarse el tipo de alerta y la página a recargar 
                    // *(Al ser de este tipo no recarga la página nunca)*
                    sweetAlertType('error','welcome');
                }else if(r == 'info'){
                    // con esta función creamos alertas, debe enviarse el tipo de alerta y la página a recargar 
                    // *(Al ser de este tipo no recarga la página nunca)*
                    sweetAlertType('info','welcome');
                }
            }else{
                if(r == 'error'){
                    sweetAlertType('error','contactos');
                }else if(r == 'info'){
                    sweetAlertType('info','contactos');
                }else {
                    if (reload == 'op') {
                        var contactosExistentes = $('#choice4Oportunidades').val().toString();
                        r = contactosExistentes+','+r;
                        optionSelects('optionsContactos','optionsContactosOp',r ,'choice4Oportunidades',reload);
                        sweetAlertType('successNoReload','optionsContactosOp');
                        cerrarModal('closemodalNuevoContacto');
                    }else if (reload == 'org') {
                        var contactosExistentes = $('#choice1Organizaciones').val().toString();
                        r = contactosExistentes+','+r;
                        
                        optionSelects('optionsContactos','optionsContactosOrg',r,'choice1Organizaciones',reload);
                        sweetAlertType('successNoReload','optionsContactosOrg');
                        cerrarModal('closemodalNuevoContactoOrg');
                        
                    }
                }
            }
        }
    });
}

// función que inserta un nuevo Producto
function insertarNuevoProducto(reload) {

    var tipo = "nuevoProducto";

    if (reload == 1) {
        var selectLineaNegocioProd = $('#selectLineaNegocioProd').val();
        var nombreProducto = $('#nombreProducto').val();
    }else if(reload == 'op'){
        var selectLineaNegocioProd = $('#selectLineaNegocioProdOp').val();
        var nombreProducto = $('#nombreProductoOp').val();
        var iniModal='Op'
    }else if(reload == 'org'){
        var selectLineaNegocioProd = $('#selectLineaNegocioProdOrg').val();
        var nombreProducto = $('#nombreProductoOrg').val();
        var iniModal='Org'
    }

    $.ajax({
        type: "POST",
        url: "php/controler.php",
        data: "tipo=" + tipo + "&nombreProducto=" + nombreProducto + "&selectLineaNegocioProd=" + selectLineaNegocioProd + "&reload=" + reload,
        success: function(r) {
            if (reload == 1) {
                if (r == 'success') {
                    sweetAlertType('success','productos');
                    cerrarModal('modalNuevoProducto');
                }else if(r == 'error'){
                    sweetAlertType('error','productos');
                }else if(r == 'info'){
                    sweetAlertType('info','productos');
                }
            }else{
                if(r == 'error'){
                    sweetAlertType('error','productos');
                }else if(r == 'info'){
                    sweetAlertType('info','productos');
                }else {
                    if (reload == 'op') {
                        var productosExistentes = $('#choice5Oportunidades').val().toString();
                        r = productosExistentes+','+r;
                        console.log(r);
                        optionSelects('optionsProductos','choice5Oportunidades',r ,'choice5Oportunidades',reload);
                        sweetAlertType('successNoReload','optionsProductosOp');
                        cerrarModal('modalNuevoProducto');
                    }
                }
            }
        }
    });
}

// función para editar por id y tipo de edición
function editar(id,tipo) {
    if (tipo == 'producto') {
        $.ajax({
            type: "POST",
            url: "pages/editar.php",
            data: "tipo=" + tipo + "&id=" + id,
            success: function(r) {

                $('#editProducto').html(r);
                
            }
        });
    }
}

// función para eliminar por id y tipo
function eliminar(id,tipo) {
    if (tipo == 'contacto') { 
        sweetAlertType('eliminar','contactos',id);
    }
    if (tipo == 'lineaNegocio') {
        sweetAlertType('eliminar','lineaNegocio',id);
    }
    if (tipo == 'producto') {
        sweetAlertType('eliminar','productos',id);
    }
    if (tipo == 'oportunidades') {
        sweetAlertType('eliminar','oportunidades',id);
    }
    if (tipo == 'organizaciones') {
        sweetAlertType('eliminar','organizaciones',id);
    }
}

// función para eliminar por id y tipo
function ConfirmEliminar(id,tipo) {
    if (tipo == 'contactos') { 
        type = 'eliminarContacto';
        $.ajax({
            type: "POST",
            url: "php/controler.php",
            data: "tipo=" + type + "&idEliminar=" + id,
            success: function(r) {
                if (r == 'success') {
                    sweetAlertType('success','contactos');
                }else if(r == 'error'){
                    sweetAlertType('error','contactos');
                }else if(r == 'info'){
                    sweetAlertType('info','contactos');
                }
            }
        });
    }
    if (tipo == 'lineaNegocio') {
        
        type = 'eliminarLineaNegocio';
        $.ajax({
            type: "POST",
            url: "php/controler.php",
            data: "tipo=" + type + "&idEliminar=" + id,
            success: function(r) {
                if (r == 'success') {
                    sweetAlertType('success','productos');
                }else if(r == 'error'){
                    sweetAlertType('error','productos');
                }else if(r == 'info'){
                    sweetAlertType('info','productos');
                }
            }
        });
    }
    if (tipo == 'productos') {
        
        type = 'eliminarProducto';
        $.ajax({
            type: "POST",
            url: "php/controler.php",
            data: "tipo=" + type + "&idEliminar=" + id,
            success: function(r) {
                if (r == 'success') {
                    sweetAlertType('success','productos');
                }else if(r == 'error'){
                    sweetAlertType('error','productos');
                }else if(r == 'info'){
                    sweetAlertType('info','productos');
                }
            }
        });
    }
    if (tipo == 'oportunidades') {
        
        type = 'eliminarOportunidad';
        $.ajax({
            type: "POST",
            url: "php/controler.php",
            data: "tipo=" + type + "&idEliminar=" + id,
            success: function(r) {
                if (r == 'success') {
                    sweetAlertType('success','oportunidades');
                }else if(r == 'error'){
                    sweetAlertType('error','oportunidades');
                }else if(r == 'info'){
                    sweetAlertType('info','oportunidades');
                }
            }
        });
    }
    if (tipo == 'organizaciones') {
        
        type = 'eliminarOrganizacion';
        $.ajax({
            type: "POST",
            url: "php/controler.php",
            data: "tipo=" + type + "&idEliminar=" + id,
            success: function(r) {
                if (r == 'success') {
                    sweetAlertType('success','organizaciones');
                }else if(r == 'error'){
                    sweetAlertType('error','organizaciones');
                }else if(r == 'info'){
                    sweetAlertType('info','organizaciones');
                }
            }
        });
    }
}

// función para editar Productos
function editarProducto(id) {
    
    var tipo = "editarProducto";
    var selectLineaNegocioProdE = $('#selectLineaNegocioProdE').val();
    var nombreProductoE = $('#nombreProductoE').val();

    $.ajax({
        type: "POST",
        url: "php/controler.php",
        data: "tipo=" + tipo + "&idProducto=" + id + "&nombreProductoE=" + nombreProductoE + "&selectLineaNegocioProdE=" + selectLineaNegocioProdE,
        success: function(r) {
            if (r == 'success') {
                sweetAlertType('success','productos');
                cerrarModal('closemodalEditProducto');
            }else if(r == 'error'){
                sweetAlertType('error','productos');
            }else if(r == 'info'){
                sweetAlertType('info','productos');
            }
        }
    });
}

// función que limpia formularios por id
function limpiarFormulario(nombre) {
    document.getElementById(nombre).reset();
}

// datatables
function tblInit(tabla) {
    $(function(){
        if (tabla == 'tblLisContactos') {
            // datatable de tabla contactos
            var table =  $('#tblListaContactos').DataTable({
                "language": {
                    "url": "extensions/datatables/Spanish.json"
                },
                responsive: "true",
                scrollCollapse: true,
                scrollX: true,
                scrollY: "400px",
                dom: 'lfrBtip',
                buttons: [
                    {
                        extend:     'excelHtml5',
                        text:       '<i class="fas fa-file-excel"></i>',
                        titleattr:  'Exportar a Excel',
                        className:  'btn btn-success mr-4 ml-3',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    // {
                    //     extend:     'pdfHtml5',
                    //     text:       '<i class="bi bi-file-post"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-danger'
                    // },
                    // {
                    //     extend:     'print',
                    //     text:       '<i class="bi bi-printer"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-info'
                    // },
                ]
            });
            $('.toggle-vis').on( 'click', function () {
                
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
         
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        }
        if (tabla == 'tblLisLineaNegocio') {
            // datatable de tabla productos
            var table =  $('#tblListaLineaNegocio').DataTable({
                "language": {
                    "url": "extensions/datatables/Spanish.json"
                },
                responsive: "true",
                dom: 'Blfrtip',
                scrollCollapse: true,
                scrollY: "400px",
                buttons: [
                    {
                        extend:     'excelHtml5',
                        text:       '<i class="fas fa-file-excel"></i>',
                        titleattr:  'Exportar a Excel',
                        className:  'btn btn-success mr-4 ml-3',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    // {
                    //     extend:     'pdfHtml5',
                    //     text:       '<i class="bi bi-file-post"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-danger'
                    // },
                    // {
                    //     extend:     'print',
                    //     text:       '<i class="bi bi-printer"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-info'
                    // },
                ]
            });
            $('.toggle-vis').on( 'click', function () {
        
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
        
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        }
        if (tabla == 'tblLisProductos') {
            // datatable de tabla productos
            var table =  $('#tblListaProductos').DataTable({
                "language": {
                    "url": "extensions/datatables/Spanish.json"
                },
                responsive: "true",
                dom: 'Blfrtip',
                scrollCollapse: true,
                scrollX: true,
                scrollY: "400px",
                buttons: [
                    {
                        extend:     'excelHtml5',
                        text:       '<i class="fas fa-file-excel"></i>',
                        titleattr:  'Exportar a Excel',
                        className:  'btn btn-success mr-4 ml-3',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    // {
                    //     extend:     'pdfHtml5',
                    //     text:       '<i class="bi bi-file-post"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-danger'
                    // },
                    // {
                    //     extend:     'print',
                    //     text:       '<i class="bi bi-printer"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-info'
                    // },
                ]
            });
            $('.toggle-vis').on( 'click', function () {
        
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
        
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        }
        if (tabla == 'tblLisOportunidades') {
            // datatable de tabla Oportunidades
            var table =  $('#tblListaOportunidades').DataTable({
                "language": {
                    "url": "extensions/datatables/Spanish.json"
                },
                responsive: "true",
                dom: 'Blfrtip',
                scrollCollapse: true,
                scrollX: true,
                scrollY: "400px",
                buttons: [
                    {
                        extend:     'excelHtml5',
                        text:       '<i class="fas fa-file-excel"></i>',
                        titleattr:  'Exportar a Excel',
                        className:  'btn btn-success mr-4 ml-3',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    // {
                    //     extend:     'pdfHtml5',
                    //     text:       '<i class="bi bi-file-post"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-danger'
                    // },
                    // {
                    //     extend:     'print',
                    //     text:       '<i class="bi bi-printer"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-info'
                    // },
                ]
            });
            $('.toggle-vis').on( 'click', function () {
        
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
        
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        }
        if (tabla == 'tblLisOrganizaciones') {
            // datatable de tabla Oportunidades
            var table =  $('#tblListaOrganizaciones').DataTable({
                "language": {
                    "url": "extensions/datatables/Spanish.json"
                },
                responsive: "true",
                dom: 'Blfrtip',
                scrollCollapse: true,
                scrollY: "400px",
                buttons: [
                    {
                        extend:     'excelHtml5',
                        text:       '<i class="fas fa-file-excel"></i>',
                        titleattr:  'Exportar a Excel',
                        className:  'btn btn-success mr-4 ml-3',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    // {
                    //     extend:     'pdfHtml5',
                    //     text:       '<i class="bi bi-file-post"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-danger'
                    // },
                    // {
                    //     extend:     'print',
                    //     text:       '<i class="bi bi-printer"></i>',
                    //     titleattr:  'Exportar a Excel',
                    //     className:  'btn btn-info'
                    // },
                ]
            });
            $('.toggle-vis').on( 'click', function () {
        
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
        
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        }
    });
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

// necesario para abrir cualquier modal

function abrirModal(idModal) {
    $('.overlay').addClass('active');
    $('#'+idModal).addClass('active');
}

// necesario para cerrar cualquier modal

function cerrarModal(idModal) {
    $('.overlay').removeClass('active');
    $('#'+idModal).removeClass('active');
}