<?php
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['submit'])) 
{
    include("config.php");
    extract($_POST);
    $suvartojimas = mysqli_real_escape_string($conn, $_POST['suvartojimas']);
    $kaina = mysqli_real_escape_string($conn, $_POST['kaina']);
    $galia = $_POST['galia_input'];
    $montavimas = $_POST['montavimas'];
    $puse = $_POST['puse'];
    $seselis = $_POST['seselis'];
    $danga = $_POST['danga'];
    if(empty($danga))
    {
        $danga = mysqli_real_escape_string($conn, $_POST['kita_danga']);
    }
    $ivadas = $_POST['ivadas'];
    $numatyta_galia = mysqli_real_escape_string($conn, $_POST['numatyta_galia']);
    $atsiskaitymas = $_POST['atsiskaitymas'];
    $parama = $_POST['parama'];
    $vardas = mysqli_real_escape_string($conn, $_POST['vardas']);
    $pavarde = mysqli_real_escape_string($conn, $_POST['pavarde']);
    $numeris = mysqli_real_escape_string($conn, $_POST['numeris']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gatve = mysqli_real_escape_string($conn, $_POST['gatve']);
    $namo_numeris = mysqli_real_escape_string($conn, $_POST['namo_numeris']);
    $miestas = mysqli_real_escape_string($conn, $_POST['miestas']);
    $imones_pavadinimas = mysqli_real_escape_string($conn, $_POST['imones_pavadinimas']);
    $zinute = mysqli_real_escape_string($conn, $_POST['zinute']);
    $sql = "INSERT INTO forma (Uzpildymo_data, Suvartojimas, Elektros_tiekejo_kaina, Rekomenduojama_galia, Montavimo_vieta, Stogo_slaito_puse, Seselio_kiekis, Stogo_danga, Elektros_ivadas, Ivado_galia, Atsiskaitymas, Valstybes_parama, Vardas, Pavarde, Tel_Nr, El_pastas, Gatve, Namo_nr, Miestas, Imones_pavadinimas, Zinute) 
    VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        echo "SQL error";
    } 
    else 
    {
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $suvartojimas, $kaina, $galia, $montavimas, $puse, $seselis, $danga, $ivadas, $numatyta_galia, $atsiskaitymas, $parama, $vardas, $pavarde, $numeris, $email, $gatve, $namo_numeris, $miestas, $imones_pavadinimas, $zinute);
        mysqli_stmt_execute($stmt);
        // Get the entry date
        $entryDate = date("Y-m-d H:i:s");
    }
}
$conn->query("ALTER TABLE forma CONVERT TO CHARACTER SET utf8 COLLATE utf8_General_ci;");
echo "<h2 style='text-align: center;'>Ačiū, informaciją gavome.</h2>";
echo "<p class='info'>Artimiausiu metu su Jumis susisieks Origo Power projektų vadovas.</p>";
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My PHP Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
</body>
</html>