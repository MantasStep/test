<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="script.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script></head>
<body>
    <div data-multi-step>
        <form action="form-process.php" method="post" id="myForm">
            <div class="card" data-step>
                <header>
                    <h1 class="title">Saulės elektrinės skaičiuoklė</h1>
                    <h2 class="info">Įvesk trūkstamą informaciją ir Sužinok kokios galios elektrinė tau yra reikalinga ir gauk pasiūlymą</h2>
                </header>
                <div class="form-group-trumpi">
                    <label for="suvartojimas" class="stori">Kiek elektros sunaudojama per mėn.?</label>
                    <input type="text" class="trumpi_inputs" name="suvartojimas" id="suvartojimas" placeholder="pvz 300" required="required" pattern="[0-9]+" maxlength="6" oninvalid="this.setCustomValidity('Įveskite kiek suvartojate elektros per mėnesį')" oninput="this.setCustomValidity('')">
                    <span class="priedas">Kw/mėn</span>
                </div>
                <div class="form-group-trumpi">
                    <label for="kaina" class="stori">Kiek šiuo metu mokama už 1kWh?</label>
                    <input type="text" class="trumpi_inputs" name="kaina" id="kaina" placeholder="pvz 48"required="required" pattern="[0-9,]+" maxlength="25" oninvalid="this.setCustomValidity('Įveskite kokia jūsų elektros tiekėjo kWh kaina')" oninput="this.setCustomValidity('')">
                    <span class="ilgas_priedas">Centai/kwh</span>
                </div>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="save1()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Kur norėtumėte įrengti įsigytą saulės elektrinę?</h3>    
                    <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="montavimas" value="Ant šlaitino stogo " required class="montavimas"/>Ant šlaitinio stogo</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="montavimas" value="Ant plokščio stogo" class="montavimas"/>Ant plokščio stogo</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="montavimas" value="Ant žemes" class="montavimas"/>Ant žemės</label>
                        </div>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" name="toliau" data-next onclick="validateMontavimas()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Stogo šlaitas ant kurio montuojama elektrinė atsuktas į:</h3>
                    <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="puse" class="puse" onclick="calculateResult2()" value="Pietus (efektyvumas 98-100%)" required/>Pietus (efektyvumas 98-100%)</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="puse" class="puse" onclick="calculateResult2()" value="Pietryčių ir pietvakarių (efektyvumas 80-90%)"/>Pietryčių ir pietvakarių (efektyvumas 80-90%)</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="puse" class="puse" onclick="calculateResult2()" value="Rytų ir vakarų (efektyvumas 72-82%)"/>Rytų ir vakarų (efektyvumas 72-82%)</label>
                        </div>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="calculateResult2(); save2(); validatePuse()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Kiek šešėlio krenta ant stogo šlaito / teritorijos kur bus montuojamos saulės panelės?</h3>
                    <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="seselis" class="seselis" onclick="calculateResult3()" value="Šešėlio nera" required/>Šešėlio nėra</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="seselis" class="seselis" onclick="calculateResult3()" value="Šešėlis - 15%"/>Šešėlis - 15%</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="seselis" class="seselis" onclick="calculateResult3()" value="Šešėlis - 25%"/>Šešėlis - 25%</label>
                        </div>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="calculateResult3(); save3(); validateSeselis()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Kokia yra stogo danga?</h3>
                    <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="danga" class="danga" value="Bitumas (plokščias stogas)" required/>Bitumas (plokščias stogas)</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="danga" class="danga" value="Skarda"/>Skarda</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="danga" class="danga" value="Banguoti lakštai (pvz. Šiferis)"/>Banguoti lakštai (pvz. Šiferis)</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="danga" class="danga" value="Cerpes"/>Čerpės</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="danga" class="danga" value="" id="kita"/>Kita:</label>
                            <input type="text" id="kita_danga" name="kita_danga" maxlength="25" class="trumpi_inputs" oninvalid="this.setCustomValidity('Įvesskite kokia jūsų stogo danga')" oninput="this.setCustomValidity('')"/>
                        </div>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="validateDanga()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Elektros įvadas objekte / pastate prie kurio planuojama jungiama saulės elektrinė yra:</h3>
                <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="ivadas" class="ivadas" value="Vienfazis elektros įvadas" required/>Vienfazis elektros įvadas</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="ivadas" class="ivadas" value="Trifazis elektros įvadas"/>Trifazis elektros įvadas</label>
                        </div>
                    <div class="form_group-trumpi">
                        <label for="numatyta_galia">ESO numatyta elektros įvado galia:</label>
                        <input type="text" id="numatyta_galia" name="numatyta_galia" maxlength="8" placeholder="Elektros įvado galia kW" class="trumpi_inputs">
                        <span class="trumpas_priedas">Kw</span>
                    </div>
                </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="validateIvadas()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Kaip atsiskaitysite už energijos pasaugojimą elektros tinkluose?</h3>
                    <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="atsiskaitymas" class="atsiskaitymas" onclick="calculateResult4()" value="Už pasaugojimą apmokėsiu pinigiais" required/>Už pasaugojimą apmokėsiu pinigiais</label>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="atsiskaitymas" class="atsiskaitymas" onclick="calculateResult4()" value="Už elektros pasaugojimą tinkluose atsiskaitysiu kWh (+20%)"/>Už elektros pasaugojimą tinkluose atsiskaitysiu kWh (+20%)</label>
                        </div>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="calculateResult4(); validateAtsiskaitymas()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Noriu pasinaudoti valstybės parama</h3>
                    <div class="form-group">
                        <div class="form_group_radio">
                            <label><input type="radio" name="parama" class="parama" value="Tik domiuosi" required/>Tik domiuosi</label><br>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="parama" class="parama" value="Planuoju prašyti paramos artimiausiame šaukime"/>Planuoju prašyti paramos artimiausiame šaukime</label><br>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="parama" class="parama" value="Užpildžiau prašymą paramai gauti"/>Užpildžiau prašymą paramai gauti</label><br>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="parama" class="parama" value="Gavau paramos patvirtinimą"/>Gavau paramos patvirtinimą</label><br>
                        </div>
                        <div class="form_group_radio">
                            <label><input type="radio" name="parama" class="parama" value="Statysiu be paramos"/>Statysiu be paramos</label><br>
                        </div>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="button" name="toliau" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" data-next onclick="validateParama()">Toliau</button>
            </div>
            <div class="card" data-step>
                <h3 class="title">Įveskite savo kontaktus</h3>
                    <div class="form-group">
                        <input type="text" required name="vardas" id="vardas" placeholder="Vardas" maxlength="25" oninvalid="this.setCustomValidity('Įveskite savo vardą')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="text" required name="pavarde" id="pavarde" placeholder="Pavardė" maxlength="25" oninvalid="this.setCustomValidity('Įveskite savo pavardę')" oninput="this.setCustomValidity('')">
                    </div>
                        <div class="form-group">
                        <input type="tel" required name="numeris" id="numeris" placeholder="Tel. Nr. pvz. +37066666666"  pattern="^\+\d{11}$" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="email" required name="email" id="email" placeholder="El. pašto adresas" maxlength="50" oninvalid="this.setCustomValidity('Įveskite savo el. paštą')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="text" name="gatve" id="gatve" placeholder="Gatvė" maxlength="25">
                    </div>
                    <div class="form-group">
                        <input type="text" name="namo_numeris" id="namo_numeris" placeholder="Namo numeris" pattern="[0-9]+" maxlength="5">
                    </div>
                    <div class="form-group">
                        <input type="text" required name="miestas" id="miestas" placeholder="Miestas (Elektrinės montavimo vieta)"maxlength="25" oninvalid="this.setCustomValidity('Įveskite savo miestą')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="text" name="imones_pavadinimas" id="imones_pavadinimas" placeholder="Įmonės pavadinimas" maxlength="50">
                    </div>
                    <div class="form-group">
                        <textarea name="zinute" id="zinute" maxlength="300" placeholder="Palikite trumpą žinutę, pastabą į ką turėtumėme atkreipti dėmesį (iki 300 simbolių)"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="apsauga" class="stori">
                            <span id="number1"></span> + <span id="number2"></span> = ?
                            <span id="TeisingasNumeris"></span>
                        </label>
                        <input type="text" name="apsauga" id="apsauga" maxlength="4" required oninvalid="this.setCustomValidity('Įveskite teisingą skaičių')", placeholder="Įveskite teisingą skaičių">
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="politika" id="politika" oninput="this.setCustomValidity('')"> Sutinku, kad mano asmens duomenys būtų naudojami pasiūlymams ir naujienoms gauti. Susipažinau ir sutinku su <a href="https://origopower.lt/privatumo-politika/">privatumo politika.</a></label>
                    </div>
                <button type="button" class="bg-gray-300 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-l" name="atgal" data-previous>Atgal</button>
                <button type="submit" name="submit" class="bg-teal-500 text-white hover:bg-teal-700 font-bold py-2 px-4 rounded-r" value="Send">Siųsti</button>
            </div>
            <div class="rekomenduojama_galia">
                <body onload="calculateResult1()"></body>
                <span class="galia_tekstas">Sunaudojant <span type="text" id="sunaudojimas" class="sunaudojimas"></span> kWh/mėn rekomenduojama minimali saulės elektrinės galia</span>
                <span type="text" name="galia" class="galia" id="galia"></span>
                <input type="hidden" name="galia_input" id="galia_input" class="galia_input" value="">
              </div>              
        </form>
    </div>
</body>
</html>