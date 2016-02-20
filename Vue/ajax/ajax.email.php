<?php
include("modele.ajax.php");
 $requeteajax= new Ajax;
 $email=$_POST['email'];
 $sql=$requeteajax->verifemail($email);
 foreach ($sql as $row){

 
}
 if($row['idpcl'])
 {
echo "0";

}

else
{

echo "1";

}

?>
