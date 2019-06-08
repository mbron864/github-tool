<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

$authorizeUrl = 'https://github.com/login/oauth/authorize';
$tokenUrl = 'https://github.com/login/oauth/access_token';
$apiUrlBase = 'https://api.github.com/';

// Create new Plates instance
$templates = new League\Plates\Engine(__DIR__ . '/../templates/');

session_start();

// Start the login process by sending the use to Github's authorization page
if (get('action') == 'login') {
	// Generate a random hash and store in the session for security
	$_SESSION['state'] = hash('sha256', microtime(TRUE).rand().$_SERVER['REMOTE_ADDR']);
	unset($_SESSION['access_token']);
	
	$params = array(
		'client_id' => getenv('GITHUB_CLIENT_ID'),
		'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'],
		'scope' => 'user',
		'state' => $_SESSION['state']
	);
	
	// Redirect the user to Github's authorization page
	header('Location: ' . $authorizeUrl . '?' . http_build_query($params));
	die();
}

// When Github redirects the user back here, there will be a "code" and "state" parameter in the query string
if (get('code')) {
	// Verify the state matches our stored state
	if (!get('state') || $_SESSION['state'] != get('state')) {
		header('Location: ' . $_SERVER['PHP_SELF']);
		die();
	}
	
	// Exchange the auth code for a token
	$token = apiRequest($tokenUrl, array(
		'client_id' => getenv('GITHUB_CLIENT_ID'),
		'client_secret' => getenv('GITHUB_CLIENT_SECRET'),
		'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'],
		'state' => $_SESSION['state'],
		'code' => get('code')
	));
	
	$_SESSION['access_token'] = $token->access_token;
	$_SESSION['token_type'] = $token->token_type;
	
	header('Location: ' . $_SERVER['PHP_SELF']);
}

if (session('access_token')) {
	$user = apiRequest($apiUrlBase . 'user');
	
	// Render a template
	echo $templates->render('profile', ['user' => $user->login]);
}



// ============== Utility Functions ==============================================

function apiRequest($url, $post=FALSE, $headers=array()) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
	if ($post) curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	
	$headers[] = 'Accept: application/json';
	$headers[] = 'User-Agent: MVWC Github Tool';
	
	if (session('access_token'))
		$headers[] = 'Authorization: Bearer ' . session('access_token');
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);
	return json_decode($response);
}

function get($key, $default=NULL) {
	return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
	return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}