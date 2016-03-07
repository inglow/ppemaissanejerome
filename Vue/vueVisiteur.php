<?php $this->titre = "Mon Blog - "; ?>

    <header>
        <h1>Les visiteur</h1>

    </header>

	<h2>Le nombre de visiteur par jours <h2>

<?php 

echo $result;
echo "<table  height=\"10px\" border=1<tr><td>Id</td><td>Ip</td><td>Ordinateur, OS</td><td>Lien entrant</td><td>Url</td></tr>";
	foreach($resultat1 as $unResultat)
	{

		echo "<tr><td>".$unResultat["id"]."</td>";
		echo "<td>".$unResultat["ip"]."</td>";
		echo "<td>".$unResultat["agent"]."</td>";
		echo "<td>".$unResultat["reference"]."</td>";
		
		
		echo "<td>".$unResultat["url"]."</td>";


		
	}
echo '</table>';

?>

