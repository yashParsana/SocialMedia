<!DOCTYPE html>
<html lang="en">
<?php
include "config.php";
session_start();
$str = file_get_contents('JSONData/Login.JSON');
$json = json_decode($str, true);
$userDetails = $json['data'];

if (!isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    header('Location: Login.php');
} else {
    $uname = $_SESSION['uname'];
    foreach ($userDetails as $key => $value) {
        if ($uname == $value['userDetails']['username']) {
            $userDetail = $value['userDetails'];
            $posts = $value['userDetails']['posts'];
        }
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: Login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css" />
</head>

<body>
<header>
		<div class="center">
			<nav>
				<ul>
					<li>
						<a href="home.php"><img width="30" height="30" src="https://img.icons8.com/material-outlined/24/000000/home--v2.png" href="home.php" /></a>
					</li>
					<li>
						<a href="feed.php"><img width="30" height="30" src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-feed-devices-flatart-icons-outline-flatarticons.png" /></a>
					</li>
					<li>
						<a href="Contact.php">
							<img width="30" height="30" src="https://img.icons8.com/ios-filled/50/000000/apple-contacts.png" />
						</a>
					</li>
					<li>
						<a href="about.php">
							<img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/000000/info.png" />
						</a>
					</li>
					<li>
						<a href="Profile.php">
							<img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/000000/administrator-male.png" />
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
    <main><h1></h1></main>
</body>

</html>