<?php 

for ($aterisco1 = 0; $aterisco1 <= 9 ; $aterisco1++) { 
	
	for ($aterisco2 = 0; $aterisco2 <= $aterisco1 ; $aterisco2++) { 
	
	echo "*";
	}
	echo "\n";
}

echo "\n";

$viñeta= " *";
	$espacio= "  ";

	for ($aterisco1 = 0; $aterisco1 <= 34 ; $aterisco1++) { 
		
	for ($aterisco2 = 0; $aterisco2 <= 1 ; $aterisco2++) { 
		
		if (($aterisco1 == 4 && $aterisco2 == 0) || ($aterisco1 == 8 && $aterisco2 == 1) || ($aterisco1 == 13 && $aterisco2 == 0) || ($aterisco1 == 17 && $aterisco2 == 1) || ($aterisco1 == 22 && $aterisco2 == 0) || ($aterisco1 == 26 && $aterisco2 == 1) || ($aterisco1 == 31 && $aterisco2 == 0)){
			echo "\n";
			continue;
		}elseif ($aterisco2 == 0) {
			echo $espacio;
		}else{
			echo $viñeta;
		}
	
	}
	}
?>