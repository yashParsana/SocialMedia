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
        <span id="spanLogout"><a class="aHeader" href="logout.php">Logout</a></span>
        <!-- main header -->
        <div class="container">
            <div class="profile">
                <div class="profile-image">

                    <img src="https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=152&h=152&q=80&fit=crop" alt="">
                </div>

                <div class="profile-user-settings">

                    <h1 class="profile-user-name"><?php echo $uname; ?></h1>

                    <button class="btn profile-edit-btn">Edit Profile</button>

                    <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>

                </div>

                <div class="profile-stats">

                    <ul>
                        <li><span class="profile-stat-count"><?php echo count($userDetail['posts']) ?></span> posts</li>
                        <li><span class="profile-stat-count"><?php echo $userDetail['followers']; ?></span> followers</li>
                        <li><span class="profile-stat-count"><?php echo $userDetail['following']; ?></span> following</li>
                    </ul>

                </div>

                <div class="profile-bio">

                    <p><span class="profile-real-name"><?php echo $userDetail['firstName']; ?> <?php echo $userDetail['lastName']; ?></span><br /> <?php echo $userDetail['bio']; ?></p>

                </div>

            </div>
            <!-- End of profile section -->

        </div>
        <!-- End of container -->

    </header>
    <main>
        <div class="container">
            <div class="gallery">
                <?php foreach ($posts as $key => $value) : ?>
                    <div class="gallery-item" tabindex="0">
                        <img src="<?php echo $value['url']; ?>" class="gallery-image" alt="">
                        <div class="gallery-item-info">
                            <ul>
                                <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 56</li>
                                <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>

</html>