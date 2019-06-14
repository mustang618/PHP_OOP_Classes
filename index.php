<!DOCTYPE html>
<html>
<head>
<title>PHP OOP</title>
</head>
<body>

<?php

include "classes.php";

$objAdapter1 = new Adapter;
$objAdapter1->setMake("LG");

$objSE1 = new ScreenElectronics(enumScreenElectronics::TV, "42 inches");

echo "<br/>owner: ";
$objSE1->setOwner("Eva");
echo $objSE1->isOwner("Ann")==TRUE ? "Ann" : "";
echo $objSE1->isOwner("Eva")==TRUE ? "Eva" : "";

echo "<br/>screen size: ";
echo $objSE1->getScreenSize();

echo "<br/>in use time: ";
$objSE1->setInUseTime(10.5);
echo $objSE1->getInUseTime();
echo " hours";

$objSE1->setAdapter($objAdapter1);
echo "<br/>adapter power: ";
echo $objSE1->getAdapter()->getPower();
echo "<br/>adapter make: ";
echo $objSE1->getAdapter()->getMake();

?>

</body>
</html> 
