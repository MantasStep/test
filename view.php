<!DOCTYPE html>
<html lang="lt">
<head>
    <title>Duomenų lentelė</title>
    <!-- <link href="styles12.css" rel="stylesheet"> -->
    <meta charset="utf-8"/>
    <meta name="robots" content="NOINDEX,NOFOLLOW"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="format-detection" content="telephone=no"/>
</head>
<style>
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}
table caption {
  font-size: 16px;
  margin: .5em 0 .75em;
}
table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}
table th,
table td {
  padding: 5px;
  text-align: center;
}
table th {
  font-size: 10px;
  letter-spacing: .1em;
  text-transform: uppercase;
}
@media screen and (max-width: 600px) {
  .mobile-hidden{
    display:none;
  }
  table {
    border: 0;
  }
  table caption {
    font-size: 1.3em;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: 14px;
    text-align: right;
  }
  table td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
<body>
<h2>Duomenų lentelė</h2>
<table>
  <thead>
    <tr class="mobile-hidden">

      <th scope="col"></th>

      <th scope="col">Vartotojo id</th>
      <th scope="col">Formos užpildymo laikas</th>
      <th scope="col">Suvartojimas</th>
      <th scope="col">Elektros tiekėjo kaina</th>
      <th scope="col">Rekomenduojama minimali saulės elektrinės galia</th>
      <th scope="col">Kur norėtumete sumontuoti įsigytą saulės elektrinę?</th>
      <th scope="col">Stogo šlaitas ant kurio montuojama elektrine atsuktas i:</th>
      <th scope="col">Kiek seselio krenta ant stogo slaito?</th>
      <th scope="col">Kokia yra stogo danga?</th>
      <th scope="col">El. įvadas prie kurio planuojama jungti saules elektrinę yra:</th>
      <th scope="col">ESO numatyta elektros ivado galia:</th>
      <th scope="col">Kaip atsiskaitysite uz energijos pasaugojima elektros tinkluose?</th>
      <th scope="col">Noriu pasinaudoti valstybes parama</th>
      <th scope="col">Vardas</th>
      <th scope="col">Pavarde</th>
      <th scope="col">Telefono Numeris</th>
      <th scope="col">El pastas</th>
      <th scope="col">Gatve</th>
      <th scope="col">Namo numeris</th>
      <th scope="col">Miestas</th>
      <th scope="col">Imones pavadinimas</th>
      <th scope="col" class="text-message">Žinutė</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Fetch all forms from the API
    $response = file_get_contents('http://localhost/api.php?action=getAllForms');
    $forms = json_decode($response, true);

    if (is_array($forms)) {
      foreach ($forms as $form) {

        if (!isset($form["Vartotojo_id"]) || !is_numeric($form["Vartotojo_id"])) {
          echo "Vartotojo ID yra tuščias arba netinkamas tipas.";
          continue;
        }

        $deleteUrl = "http://localhost/api.php?action=deleteForm&Vartotojo_id=" . $form["Vartotojo_id"];
        
        echo '<tr>';
        echo '<td><a href="' . $deleteUrl . '" class="delete-btn">Ištrinti</a></td>';
        echo '<td>'.htmlspecialchars($form["Vartotojo_id"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Uzpildymo_data"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Suvartojimas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Elektros_tiekejo_kaina"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Rekomenduojama_galia"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Montavimo_vieta"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Stogo_slaito_puse"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Seselio_kiekis"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Stogo_danga"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Elektros_ivadas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Ivado_galia"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Atsiskaitymas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Valstybes_parama"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Vardas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Pavarde"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Tel_Nr"]).'</td>';
        echo '<td>'.htmlspecialchars($form["El_pastas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Gatve"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Namo_nr"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Miestas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Imones_pavadinimas"]).'</td>';
        echo '<td>'.htmlspecialchars($form["Zinute"]).'</td>';
        echo '</tr>';
      }
    } else {
      echo "API returns null or empty.";
    }
    ?>
  </tbody>
</table>
</body>
</html>