<?php
if (!isset($_COOKIE['access_token'])) {
    header('Location: http://serg.razumno.com/index.php');
    exit;
}

/*$userId = $_COOKIE['user_id']
$userName = $_COOKIE['user_name'];
$email = $_COOKIE['email'];*/

$user = [];
/*array_push($user, $userId);
array_push($user, $userName);
array_push($user, $email);*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="wrapper">        
        <section class="m-3" id="content-section">
            <div class="container">
                <div><?= implode(', ', $user) ?></div>
                <a id="logout-link" href="#" class="btn btn-primary">Logout</a>
            </div>
        </section>
    </div>

    <!-- Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script type="text/javascript" src="scripts.js"></script>
</body>
</html>
