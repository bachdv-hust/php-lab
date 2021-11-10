<?php session_start(); ?>

<?php
    $color = array('balck' => '#000000',
                    'white' => '#ffffff',
                    'red' => '#ff0000',
                    'blue' => '#0000ff');
    $bg_name = htmlspecialchars($_POST['background']);
    $fg_name = htmlspecialchars($_POST['foreground']);

    $_SESSION['bg_name']=$bg_name;
    $_SESSION['fg_name']=$fg_name;

    $username = htmlspecialchars($_SESSION["username"]);
?>

<html>
<head><title>Preferences Set</title></head>

<body>
Thank you. Your preferences have been changed to: <br />
Background: <?= $bg_name ?><br />
Foreground: <?= $fg_name ?><br />

Click <a href="prefs-demo-session.php">here</a> to see the preferences in action.
</body>
</html>
