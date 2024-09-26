
<?php

// Űrlap feldolgozása
if (isset($_POST['submit-btn'])) {

	$marka    = htmlspecialchars(trim(ucwords(strtolower($_POST['marka']))));
    $model    = htmlspecialchars(trim(ucwords(strtolower($_POST['model']))));
	$kivitel    = htmlspecialchars(trim(ucwords(strtolower($_POST['kivitel']))));
    $km    = htmlspecialchars(trim($_POST['km']));
    $le    = htmlspecialchars(trim($_POST['le']));
    $ar    = htmlspecialchars(trim($_POST['ar']));
    $fueltype    = htmlspecialchars(trim(ucwords(strtolower($_POST['fueltype']))));
    $gearbox    = htmlspecialchars(trim(ucwords(strtolower($_POST['gearbox']))));
    $mime = array('jpg', 'jpeg', 'png', 'gif', "webp", );



	// Változók vizsgálata
	if (empty($marka))
		$hibak[] = "Nem adott meg nevet!";

    if (empty($model))
		$hibak[] = "Nem adott meg nevet!";
    	
    if (empty($kivitel))
		$hibak[] = "Nem adott meg nevet!";

    if (empty($km))
        $hibak[] = "Nem adott meg km-t!";

    if (empty($le))
        $hibak[] = "Nem adott meg a légésszámát!";

    if (empty($ar))
        $hibak[] = "Nem adott meg az árat!";

    if (empty($fueltype))
        $hibak[] = "Nem adott meg a típusát!";

    if (empty($gearbox))
        $hibak[] = "Nem adott meg a váltót!";
	


	// Hibaüzenetet összeállítása
	if (isset($hibak)) {
		$kimenet = "<ul>\n";
		foreach($hibak as $hiba) {
			$kimenet.= "<li>{$hiba}</li>\n";
		}
		$kimenet.= "</ul>\n";
	}
	else {
		// Felvitel az adatbázisba
		require("connect.php");
		$sql = "INSERT INTO auto_dekor
            (marka, model, kivitel, km, le, ar, fueltype, gearbox)
				VALUES
				('{$marka}', {$model}, {$kivitel}, {$km}, {$le}, {$ar}, '{$fueltype}', '{$gearbox}')";
		mysqli_query($conn, $sql);
		header("Location: lista.php");
	}
}

// Űrlap megjelenítése
