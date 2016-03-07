<?php
include("modele.ajax.php");
 $requeteajax= new Ajax;
 $pseudo=$_POST['pseudo'];
 $sql=$requeteajax->verifpseudo($pseudo);
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
