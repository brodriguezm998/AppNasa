<!DOCTYPE html>
<html lang="es">

<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'Users.php';


if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
	
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
	include("../header2.php");
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new Users();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'picture'       => $gpUserProfile['picture']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    if(!empty($userData)){
        $output ='<div class="container-fluid">';
			$output .='<div class="row">';
				$output .= '<div class="col-12 border2">';
					$output .= '<h1>Profile Details </h1><br>';
					$output .= '<br/><img class="rounded-circle float-center" src="'.$userData['picture'].'" width="200px">';
					$output .= '<hr>';
					$output .= '<h3><strong>' . $userData['first_name'].' '.$userData['last_name'].'</strong></h3>';
					$output .= '<hr>';
					$output .= 'Google ID : ' . $userData['oauth_uid'];
					$output .= '<hr>';
					$output .= 'Email : ' . $userData['email'];
					$output .= '<hr>';
					$output .= 'Logged in with : Google';
					$output .= '<hr>';
					$output .= '<a href="./Camara/fotos/index.html" class="btn btn-success"> <span class="glyphicon glyphicon-picture"></span> continuous to take a picture</a><br/>';
				$output .= '</div>';	
			$output .= '</div>';
		$output .= '</div>';	
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again later.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a id="Log_G+" class="btn btn-danger" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><span class="glyphicon glyphicon-user"></span> Sign In</a>';
}
?>	
<body>
	<!-- Mostrar información del perfil y botón de login -->
	<br><?php echo $output;?></div>
</body>
</html>