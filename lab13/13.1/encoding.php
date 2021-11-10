<?php
$input = <<< End
"Stop pulling my hair!" Jane's eyes flashed.<p>
End;
$double = htmlentities($input);
echo $double . "<br>"; //&quot;Stop pulling my hair!&quot; Jane's eyes flashed.&lt;p&gt;

$both = htmlentities($input, ENT_QUOTES);
echo $both . "<br>"; //&quot;Stop pulling my hair!&quot; Jane&#039;s eyes flashed.&lt;p&gt;

$neither = htmlentities($input, ENT_NOQUOTES);
echo $neither . "<br>"; // "Stop pulling my hair!" Jane's eyes flashed.&lt;p&gt;