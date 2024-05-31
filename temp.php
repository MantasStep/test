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
    margin-bottom: 50px;
  }
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size:.8em;
    text-align: right;
  }
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}

/*delete and edit btns*/
.delete-btn,.edit-btn {
background-color: #f44336;
color: white;
padding: 5px 10px;
text-decoration: none;
border: none;
cursor: pointer;
margin-right: 5px;
}
.delete-btn:hover,.edit-btn:hover {
background-color: #f44336cc;
}
</Style>
<body style="margin: 25px;">
<table class="table">
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
    <?php
    $api_url = 'http://localhost/api.php'; // Replace with your API URL
    $response = json_decode(file_get_contents($api_url), true);

    if ($response) {
        foreach ($response as $row) {
            echo "<tr>
              <td><a href='". $api_url. "?id=". $row["Vartotojo_id"]. "' class='delete-btn'>Ištrinti</a></td>
              <td data-label='Vartotojo ID'>". $row["Vartotojo_id"]. "</td>
              <td data-label='Formos užpildymo laikas'>". $row["Uzpildymo_data"]. "</td>
              <td data-label='Elektros suvartojimas'>". $row["Suvartojimas"]. "</td>
              <td data-label='Elektros tiekėjo kaina'>". $row["Elektros_tiekejo_kaina"]. "</td>
              <td data-label='Rekomenduminimali saulės elektrinės galia'>". $row["Rekomenduojama_galia"]. "</td>
              <td data-label='Elektrinės montavimo vieta'>". $row["Montavimo_vieta"]. "</td>
              <td data-label='Stogo šlaito pusė'>". $row["Stogo_slaito_puse"]. "</td>
              <td data-label='Šešėlio kiekis ant stogo šlaito'>". $row["Seselio_kiekis"]. "</td>
              <td data-label='Stogo danga'>". $row["Stogo_danga"]. "</td>
              <td data-label='Elektros įvadas'>". $row["Elektros_ivadas"]. "</td>
              <td data-label='Elektros įvado galia'>". $row["Ivado_galia"]. "</td>
              <td data-label='Atsiskaitymas už energijos pasaugojima elektros tinkluose'>". $row["Atsiskaitymas"]. "</td>
              <td data-label='Naudijimasis valstybes parama'>". $row["Valstybes_parama"]. "</td>
              <td data-label='Vardas'>". $row["Vardas"]. "</td>
              <td data-label='Pavardė'>". $row["Pavarde"]. "</td>
              <td data-label='Telefono numeris'>". $row["Tel_Nr"]. "</td>
              <td data-label='El paštas'>". $row["El_pastas"]. "</td>
              <td data-label='Gatvė'>". $row["Gatve"]. "</td>
              <td data-label='Namo numeris'>". $row["Namo_nr"]. "</td>
              <td data-label='Miestas'>". $row["Miestas"]. "</td>
              <td data-label='Įmonės pavadinimas'>". $row["Imones_pavadinimas"]. "</td>
              <td data-label='Žinutė'>". $row["Zinute"]. "</td>
              </tr>";
        }
    } else {
        echo "<tr><td colspan='24'>No data found</td></tr>";
    }
    ?>
</table>
</body>
</html>