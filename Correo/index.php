head>
	<script type="text/javascript">
			function loadLocation () {
				//inicializamos la funcion y definimos  el tiempo maximo ,las funciones de error y exito.
				navigator.geolocation.getCurrentPosition(viewMap,ViewError,{timeout:1000});
			}

			//Funcion de exito
			function viewMap (position) {
				
				var lon = position.coords.longitude;	//guardamos la longitud
				var lat = position.coords.latitude;		//guardamos la latitud
				var link = "http://maps.google.com/?ll="+lat+","+lon+"&z=14";
				
				document.getElementById("long").innerHTML = "Longitud: "+lon;
				document.getElementById("latitud").innerHTML = "Latitud: "+lat;
				document.getElementById("link").href = link;

			}



			function ViewError (error) {
				alert(error.code+". Ocurrió un error, recargue la pagina nuevamente");
				reload();
			}	
	</script>
</head>

<body>
	<div>
			<body onload="loadLocation();">
			<label id="long"></label> <br/>
			<label id="latitud"></label> <br/>
			<a id="link" target="_blank">Click para visitar el mapa</a>
		</div>
</body>

<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$PHPLong = "<script> document.write(lon) </script>";
	
	$mail = new PHPMailer();
	
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	
	$mail->Username = 'brodriguezm998@gmail.com'; //Correo de donde enviaremos los correos
	$mail->Password = 'Bboybladi2998BM3'; // Password de la cuenta de envío
	
	$mail->setFrom('brodriguezm998@gmail.com', 'Bladimir Rodriguez');
	$mail->addAddress('kcuadros@ipac.edu.ec', 'UNIDAD EDUCATIVA IPAC'); //Correo receptor
	
	
	$mail->Subject = 'PRUEBA DE FUNCIONAMIENTO';
	$mail->Body    = 'PRUEBA NUMERO 2';
	
	if($mail->send()) {
		echo 'Correo Enviado';
		} else {
		echo 'Error al enviar correo';
	}
?>
