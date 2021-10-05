<?php
if (isset($_POST['name'])) {
   $name = $_POST['name'];
   $university = $_POST['university'];
   $class = $_POST['class'];
   $email = $_POST['email'];
   $telephone = $_POST['telephone'];
   $address = $_POST['address'];
   $control = $_POST['control'];
   $hobby = $_POST['hobby'];

   print("<br>Name: $name");
   print("<br>Class: $class");
   print("<br>University: $telephone");
   print("<br>Email: $email");
   print("<br>Telephone: $phone");

    if ( !empty($hobby)) {
    $N = count($hobby);
    for ($i=0; $i < count($hobby); $i++) { 
        $a = $i + 1;
        echo $a.". ".$hobby[$i]."<br/>";
    }
    }
    echo $register;
}