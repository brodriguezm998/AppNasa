<?php if(isset($_SESSION['access_token'])):?>
<?php include("Acceder-Camara-Movil.html");
?>

<?php else:?>
	
<html lang="es">
	<head>
		<title>WEB APP NASA</title>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" href="css/main.css">
		<style type="text/css">
				.container{
					height: 450px;
				}
				#map{
					align: center;
					width: 500px;
					height: 550px;
					border: 1px solid blue;
				}
			</style>
		
	</head>
	<body>
		<div id="map"class="container">
			<h1>WELCOME WEB APP</h1>
			<?php include("./Google/index.php");?>
		</div>
	</body>	
	
<?php endif;?>
