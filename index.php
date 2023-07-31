<?php

if (isset($_COOKIE['access_token'])) {
    header('Location: http://serg.razumno.com/logout.php');
    exit;
}

require_once 'settings.php';

// Array of parameters that will be passed in the GET request via the authentication link
$parameters = [
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'client_id'     => GOOGLE_CLIENT_ID,
    'scope'         => implode(' ', GOOGLE_SCOPES),
];

// Link for link button "Login with Google"
$uri = GOOGLE_AUTH_URI . '?' . urldecode(http_build_query($parameters));

// Check if the "code" parameter was passed in the GET request.
// This is the code that will help you get the access token (Access Token)
if (!isset($_COOKIE['access_token']) && isset($_GET['code'])) {
    $result = false;

    // An array of parameters that will be passed in a POST request using a link to get a token
    // and in a GET request using a link to get user information
    $parameters = [
        'client_id'     => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'redirect_uri'  => GOOGLE_REDIRECT_URI,
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code'],
    ];

    // POST request to get a token
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, GOOGLE_TOKEN_URI);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($parameters)));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    curl_close($curl);

    $tokenInfo = json_decode($result, true);

    // Getting information about a user
    if (isset($tokenInfo['access_token'])) {
        $parameters['access_token'] = $tokenInfo['access_token'];
        setcookie('access_token', $tokenInfo['access_token'], time() + $tokenInfo['expires_in']);

        $uri2 = GOOGLE_USER_INFO_URI . '?' . urldecode(http_build_query($parameters));
        $userInfo = json_decode(file_get_contents($uri2), true);
        if (isset($userInfo['id'])) {
            $userInfo = $userInfo;
            $result = true;
        }
    }

    if ($result) {
        setcookie('user_id', $tokenInfo['id'], time() + $tokenInfo['expires_in']);
        setcookie('user_name', $tokenInfo['name'], time() + $tokenInfo['expires_in']);
        setcookie('email', $tokenInfo['email'], time() + $tokenInfo['expires_in']);
        /*echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
        echo "Имя пользователя: " . $userInfo['name'] . '<br />';
        echo "Email: " . $userInfo['email'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['link'] . '<br />';
        echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
        echo '<img src="' . $userInfo['picture'] . '" />'; echo "<br />";*/
        header('Location: http://serg.razumno.com/logout.php');
        exit;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google SSO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="wrapper">
        <section class="m-3" id="content-section">
            <div class="container">
                <a id="google-login-link" href="<?= $uri ?>" class="btn btn-primary">Login with Google</a>
                <!--<a id="gitgub-login-link" href="#" class="btn btn-primary">Login with GitHub</a>-->
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script type="text/javascript" src="scripts.js"></script>
</body>
</html>
