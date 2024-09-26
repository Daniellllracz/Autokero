<?php
require "../connect.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// Adatbázis kapcsolati részleteket tartalmazó fájl beolvasása

// Ellenőrizze, hogy a kérési módszer GET-e
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Válassza ki az összes sort a 'auto$autok' táblából
        $sql = "SELECT * FROM auto_dekor";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Kezelje a lekérdezési hibát
            http_response_code(500); // Belső szerverhiba
            die("Hiba a kiválasztásnál: " . mysqli_error($conn));
        }

        // Fetch minden sort asszociatív tömbként
        $auto = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $auto[] = $row;
        }

        // Zárja le az adatbázis kapcsolatot
        mysqli_close($conn);

        // Küldje el a JSON választ
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($auto, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        // Kezelje a többi kivételt
        http_response_code(500); // Belső szerverhiba
        echo "Hiba: " . $e->getMessage();
    }
} else {
    // Kezelje az érvénytelen kérési módszert
    http_response_code(405); // Nem megengedett kérési módszer
}
