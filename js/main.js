$(document).ready(function() {

	// Seteamos la pantalla por defecto al abrir nuestra aplicación.
	contentNav('welcome');
	contenido('welcome');

	setInterval(() => {

	}, 1000);


	// En esta parte del código valido los formularios de inicio de sesión y de olvidó la contraseña. 
	// Teniendo en cuenta que, hay una expresión regular para un correo electrónico válido. Y su vez se valida que los campos no estén vacíos.
	
	let exprEmail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-z0-9\-\.]+$/;

	$('#btnIniciarSesion').click(function() {

		$('#usernameLoging','#passLoging').removeClass('bd-danger');
		$('#spanUsernameLoging','#spanPassLoging').addClass('dp-none');

		// para el inicio de sesion desde el archivo index
		let usernameLoging = $('#usernameLoging').val();
		let passLoging = $('#passLoging').val();

		if(usernameLoging == '' || !exprEmail.test(usernameLoging)){
			$('#usernameLoging').addClass('bd-danger');
			$('#spanUsernameLoging').removeClass('dp-none');
			return false;
		}else{
			$('#usernameLoging').removeClass('bd-danger');
			$('#spanUsernameLoging').addClass('dp-none');

			if(passLoging == ''){
				$('#passLoging').addClass('bd-danger');
				$('#spanPassLoging').removeClass('dp-none');
				return false;
			}else{
				$('#passLoging').removeClass('bd-danger');
				$('#spanPassLoging').addClass('dp-none');
			}

			// En este punto ya con el formulario validado podemos enviar los datos para consultarlos al servidor.
			iniciarSesion(usernameLoging,passLoging);
		}
	});

	$('#btnRegistrarCuenta').click(function() {

		let name = $('#name').val();
		let usernameRegis = $('#usernameRegis').val();
		let passRegis = $('#passRegis').val();
		let pass2 = $('#pass2').val();

		if(name == ''){
			$('#name').addClass('dp-none');
			return false;
		}else{
			$('#name').removeClass('dp-none');

			if(usernameRegis == '' || !exprEmail.test(usernameRegis)){
				$('#usernameRegis').addClass('dp-none');
				return false;
			}else{
				$('#usernameRegis').removeClass('dp-none');

				if(passRegis == ''){
					$('#passRegis').addClass('dp-none');
					return false;
				}else{
					$('#passRegis').removeClass('dp-none');
					if(pass2 == ''){
						$('#pass2').addClass('dp-none');
						return false;
					}else{
						$('#pass2').removeClass('dp-none');

						if(passRegis != pass2){
							$('#textPassNoIgual').removeClass('d-none');
							return false;
						}else{
							$('#textPassNoIgual').addClass('d-none');
						}
					}
				}
			}
		}
		
	});

});	
