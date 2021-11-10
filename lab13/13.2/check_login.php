<?php session_start(); ?>

<?php
$server = "localhost";
$username = "dangnam739";
$password = "123456";
$my_db = "Lab12";
$table = "Users";

// Create connection
$conn = mysqli_connect($server, $username, $password, $my_db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset(htmlspecialchars($_POST["submit"]))) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $sql = "SELECT * FROM users WHERE UserName='$username'";

    $result = mysqli_query($conn, $sql);
    if($result) {
        $row = $result->fetch_assoc();
        if($password == $row["Password"]){
            print "Login successfully.";
            print "<h1>Welcome to store, ".$row["DisplayName"]."</h1>";
        }
        else{
            print "Invalid Password. Please <a href='login.php'>login</a> again !";
        }
    }
    else{
        print "Invalid username. Please <a href='login.php'>login</a> again !";
    }

}
?>
