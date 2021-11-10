<?php session_start(); ?>

<html>
<head>
    <title>Front Door</title>
</head>
<?php
    $bg = htmlspecialchars($_SESSION['bg_name']);
    $fg = htmlspecialchars($_SESSION['fg_name']);
?>
<body bgcolor="<?= $bg ?>" text="<?= $fg ?>">
    <h1>Welcome to the Store</h1>

We have many fine products for you to view. Please fell free to browse
the aisles and stop an assistant at any time. But remember, you break it you bought it !
    <p>
        Would you like to <a href="prefSelection.html">change your preferences ?</a>
    </p>
</body>
</html>
