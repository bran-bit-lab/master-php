<?php 


$contador= 1;

echo "n \t10 \t100 \t10000 \n";

while ($contador <= 5) {
		echo $contador ."\t". ($contador *10) ."\t". ($contador *100) ."\t". ($contador *1000) ."\n";
		$contador++;
}

echo "\n";

for ($aterisco1 = 0; $aterisco1 <= 9 ; $aterisco1++) { 
	
	for ($aterisco2 = 0; $aterisco2 <= $aterisco1 ; $aterisco2++) { 
	
	echo "*";
	}
	echo "\n";
}



?>