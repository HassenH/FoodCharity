<?php
include 'navbar.php';
 ?>
<div class="container">
  <div class="row m">
    <?php include 'listprofil.php' ?>
<div class="col-12 col-md-9">
  <div class="card border-0">
    <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
      <h1 class="card-title mb-3">Modification de votre profil</h1>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-12 card border-0 bg-transparent">
          <div class="card-header text-center border-bottom-0 bg-light">
            <h3 class="ml-4 mb-0 card-title d-inline-block">Vos informations personnelles</h3>
          </div>
          <div class="row card-body pt-4">
            <div class="col-12 col-sm-6">
              <div class="row">
                <label class="form-check-label mr-2 required">Civilité* :</label>
                <div id="app_user_update_title" class="form-check form-check-inline"><input type="radio" id="app_user_update_title_0" name="app_user_update[title]" required="required" value="3" checked="checked" /><label for="app_user_update_title_0" class="required">M</label><input type="radio" id="app_user_update_title_1" name="app_user_update[title]" required="required" value="1" /><label for="app_user_update_title_1" class="required">Mme</label><input type="radio" id="app_user_update_title_2" name="app_user_update[title]" required="required" value="2" /><label for="app_user_update_title_2" class="required">Mlle</label></div>
              </div>
              <div class="form-group">
                <label class="sr-only required" for="app_user_update_firstname">Prénom* :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-person"></span></div>
                  <input type="text" id="app_user_update_firstname" name="app_user_update[firstname]" required="required" placeholder="Prénom*" class="form-control" value="Hassen" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only required" for="app_user_update_lastname">Nom* :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-person"></span></div>
                  <input type="text" id="app_user_update_lastname" name="app_user_update[lastname]" required="required" placeholder="Nom*" class="form-control" value="Hadhri" />
                </div>
              </div>
              <div class="form-group">
                <label>Date de naissance :</label>
                <div class="row">
                  <div class="col-4"><select id="app_user_update_birthdate_day" name="app_user_update[birthdate][day]" class="form-control"><option value=""></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div>
                  <div class="col-4"><select id="app_user_update_birthdate_month" name="app_user_update[birthdate][month]" class="form-control"><option value=""></option><option value="1">janv.</option><option value="2">févr.</option><option value="3">mars</option><option value="4">avr.</option><option value="5">mai</option><option value="6">juin</option><option value="7">juil.</option><option value="8">août</option><option value="9">sept.</option><option value="10">oct.</option><option value="11">nov.</option><option value="12">déc.</option></select></div>
                  <div class="col-4"><select id="app_user_update_birthdate_year" name="app_user_update[birthdate][year]" class="form-control"><option value=""></option><option value="1919">1919</option><option value="1920">1920</option><option value="1921">1921</option><option value="1922">1922</option><option value="1923">1923</option><option value="1924">1924</option><option value="1925">1925</option><option value="1926">1926</option><option value="1927">1927</option><option value="1928">1928</option><option value="1929">1929</option><option value="1930">1930</option><option value="1931">1931</option><option value="1932">1932</option><option value="1933">1933</option><option value="1934">1934</option><option value="1935">1935</option><option value="1936">1936</option><option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option></select></div>
                </div>
              </div>
              <div class="form-group" id="CompanyName">
                <label class="sr-only" for="app_user_update_company_or_association_name">Nom de l&#039;entreprise :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-home"></span></div>
                  <input type="text" id="app_user_update_company_or_association_name" name="app_user_update[company_or_association_name]" placeholder="Nom de l&#039;entreprise" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only required" for="app_user_update_email">Adresse e-mail* :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon">@</div>
                  <input type="text" id="app_user_update_email" name="app_user_update[email]" required="required" placeholder="Email*" class="form-control" value="hadhri-h@live.fr" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="app_user_update_fixe_phone">Téléphone fixe :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-phone"></span></div>
                  <input type="text" id="app_user_update_fixe_phone" name="app_user_update[fixe_phone]" placeholder="Téléphone fixe" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="app_user_update_mobile_phone">Téléphone mobile :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-phone"></span></div>
                  <input type="text" id="app_user_update_mobile_phone" name="app_user_update[mobile_phone]" placeholder="Téléphone mobile" class="form-control" value="06 09 72 29 16" />
                </div>
              </div>
              <div class="form-group text-left">
                <label class="sr-only" for="app_user_update_password_first">Mot de passe :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-key"></span></div>
                  <input type="password" id="app_user_update_password_first" name="app_user_update[password][first]" placeholder="Mot de passe" class="form-control" />
                </div>
                <small><i class="fa fa-info-circle" aria-hidden="true"></i>
                  <em>Au moins 6 caractères, 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial</em>
                </small>
                <div class="row height-space visible-xs"></div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="app_user_update_password_second">Confirmation du mot de passe :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-key"></span></div>
                  <input type="password" id="app_user_update_password_second" name="app_user_update[password][second]" placeholder="Confirmation du mot de passe" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-home"></span></div>
                  <input type="text" id="input_1299093180" name="input_1299093180" class="form-control" data-input-profile="" data-original-name="app_user_update[address]" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="app_user_update_address_postcode">Code postal</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-home"></span></div>
                  <input type="text" id="app_user_update_address_postcode" name="app_user_update[address_postcode]" placeholder="Code postal" class="form-control" data-toggle="tooltip" data-placement="right" title="Indiquer l’arrondissement si nécessaire" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="app_user_update_address_city_name">Ville :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-home"></span></div>
                  <input type="text" id="app_user_update_address_city_name" name="app_user_update[address_city][name]" placeholder="Ville" class="form-control not-require" data-toggle="tooltip" data-placement="right" title="Indiquer le code postal si besoin" />
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="app_user_update_address_city_country">Pays :</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="oi oi-home"></span></div>
                  <select id="app_user_update_address_city_country" name="app_user_update[address_city][country]" class="form-control"><option value="1">FRANCE</option><option value="2">AFGHANISTAN</option><option value="3">AFRIQUE DU SUD</option><option value="4">ÅLAND, ÎLES</option><option value="5">ALBANIE</option><option value="6">ALGÉRIE</option><option value="7">ALLEMAGNE</option><option value="8">ANDORRE</option><option value="9">ANGOLA</option><option value="10">ANGUILLA</option><option value="11">ANTARCTIQUE</option><option value="12">ANTIGUA ET BARBUDA</option><option value="13">ANTILLES NÉERLANDAISES</option><option value="14">ARABIE SAOUDITE</option><option value="15">ARGENTINE</option><option value="16">ARMÉNIE</option><option value="17">ARUBA</option><option value="18">AUSTRALIE</option><option value="19">AUTRICHE</option><option value="20">AZERBAÏDJAN</option><option value="21">BAHAMAS</option><option value="22">BAHREÏN</option><option value="23">BANGLADESH</option><option value="24">BARBADE</option><option value="25">BÉLARUS</option><option value="26">BELGIQUE</option><option value="27">BELIZE</option><option value="28">BÉNIN</option><option value="29">BERMUDES</option><option value="30">BHOUTAN</option><option value="31">BOLIVIE, l&#039;ÉTAT PLURINATIONAL DE</option><option value="32">BOSNIE-HERZÉGOVINE</option><option value="33">BOTSWANA</option><option value="34">BOUVET, ÎLE</option><option value="35">BRÉSIL</option><option value="36">BRUNÉI DARUSSALAM</option><option value="37">BULGARIE</option><option value="38">BURKINA FASO</option><option value="39">BURUNDI</option><option value="40">CAÏMANES, ÎLES</option><option value="41">CAMBODGE</option><option value="42">CAMEROUN</option><option value="43">CANADA</option><option value="44">CAP-VERT</option><option value="45">CENTRAFRICAINE, RÉPUBLIQUE</option><option value="46">CHILI</option><option value="47">CHINE</option><option value="48">CHRISTMAS, ÎLE</option><option value="49">CHYPRE</option><option value="50">COCOS (KEELING), ÎLES</option><option value="51">COLOMBIE</option><option value="52">COMORES</option><option value="53">CONGO</option><option value="54">CONGO, LA RÉPUBLIQUE DÉMOCRATIQUE DU</option><option value="55">COOK, ÎLES</option><option value="56">CORÉE, RÉPUBLIQUE DE</option><option value="57">CORÉE, RÉPUBLIQUE POPULAIRE DÉMOCRATIQUE DE</option><option value="58">COSTA RICA</option><option value="59">CÔTE D&#039;IVOIRE</option><option value="60">CROATIE</option><option value="61">CUBA</option><option value="62">DANEMARK</option><option value="63">DJIBOUTI</option><option value="64">DOMINICAINE, RÉPUBLIQUE</option><option value="65">DOMINIQUE</option><option value="66">ÉGYPTE</option><option value="67">EL SALVADOR</option><option value="68">ÉMIRATS ARABES UNIS</option><option value="69">ÉQUATEUR</option><option value="70">ÉRYTHRÉE</option><option value="71">ESPAGNE</option><option value="72">ESTONIE</option><option value="73">ÉTATS-UNIS</option><option value="74">ÉTHIOPIE</option><option value="75">FALKLAND, ÎLES (MALVINAS)</option><option value="76">FÉROÉ, ÎLES</option><option value="77">FIDJI</option><option value="78">FINLANDE</option><option value="79">GABON</option><option value="80">GAMBIE</option><option value="81">GÉORGIE</option><option value="82">GÉORGIE DU SUD ET LES ÎLES SANDWICH DU SUD</option><option value="83">GHANA</option><option value="84">GIBRALTAR</option><option value="85">GRÈCE</option><option value="86">GRENADE</option><option value="87">GROENLAND</option><option value="88">GUADELOUPE</option><option value="89">GUAM</option><option value="90">GUATEMALA</option><option value="91">GUERNESEY</option><option value="92">GUINÉE</option><option value="93">GUINÉE-BISSAU</option><option value="94">GUINÉE ÉQUATORIALE</option><option value="95">GUYANA</option><option value="96">GUYANE FRANÇAISE</option><option value="97">HAÏTI</option><option value="98">HEARD, ÎLE ET MCDONALD, ÎLES</option><option value="99">HONDURAS</option><option value="100">HONG-KONG</option><option value="101">HONGRIE</option><option value="102">ÎLE DE MAN</option><option value="103">ÎLES MINEURES ÉLOIGNÉES DES ÉTATS-UNIS</option><option value="104">ÎLES VIERGES BRITANNIQUES</option><option value="105">ÎLES VIERGES DES ÉTATS-UNIS</option><option value="106">INDE</option><option value="107">INDONÉSIE</option><option value="108">IRAN, RÉPUBLIQUE ISLAMIQUE D&#039;</option><option value="109">IRAQ</option><option value="110">IRLANDE</option><option value="111">ISLANDE</option><option value="112">ISRAËL</option><option value="113">ITALIE</option><option value="114">JAMAÏQUE</option><option value="115">JAPON</option><option value="116">JERSEY</option><option value="117">JORDANIE</option><option value="118">KAZAKHSTAN</option><option value="119">KENYA</option><option value="120">KIRGHIZISTAN</option><option value="121">KIRIBATI</option><option value="122">KOWEÏT</option><option value="123">LAO, RÉPUBLIQUE DÉMOCRATIQUE POPULAIRE</option><option value="124">LESOTHO</option><option value="125">LETTONIE</option><option value="126">LIBAN</option><option value="127">LIBÉRIA</option><option value="128">LIBYENNE, JAMAHIRIYA ARABE</option><option value="129">LIECHTENSTEIN</option><option value="130">LITUANIE</option><option value="131">LUXEMBOURG</option><option value="132">MACAO</option><option value="133">MACÉDOINE, L&#039;EX-RÉPUBLIQUE YOUGOSLAVE DE</option><option value="134">MADAGASCAR</option><option value="135">MALAISIE</option><option value="136">MALAWI</option><option value="137">MALDIVES</option><option value="138">MALI</option><option value="139">MALTE</option><option value="140">MARIANNES DU NORD, ÎLES</option><option value="141">MAROC</option><option value="142">MARSHALL, ÎLES</option><option value="143">MARTINIQUE</option><option value="144">MAURICE</option><option value="145">MAURITANIE</option><option value="146">MAYOTTE</option><option value="147">MEXIQUE</option><option value="148">MICRONÉSIE, ÉTATS FÉDÉRÉS DE</option><option value="149">MOLDOVA</option><option value="150">MONACO</option><option value="151">MONGOLIE</option><option value="152">MONTÉNÉGRO</option><option value="153">MONTSERRAT</option><option value="154">MOZAMBIQUE</option><option value="155">MYANMAR</option><option value="156">NAMIBIE</option><option value="157">NAURU</option><option value="158">NÉPAL</option><option value="159">NICARAGUA</option><option value="160">NIGER</option><option value="161">NIGÉRIA</option><option value="162">NIUÉ</option><option value="163">NORFOLK, ÎLE</option><option value="164">NORVÈGE</option><option value="165">NOUVELLE-CALÉDONIE</option><option value="166">NOUVELLE-ZÉLANDE</option><option value="167">OCÉAN INDIEN, TERRITOIRE BRITANNIQUE DE L&#039;</option><option value="168">OMAN</option><option value="169">OUGANDA</option><option value="170">OUZBÉKISTAN</option><option value="171">PAKISTAN</option><option value="172">PALAOS</option><option value="173">PALESTINIEN OCCUPÉ, TERRITOIRE</option><option value="174">PANAMA</option><option value="175">PAPOUASIE-NOUVELLE-GUINÉE</option><option value="176">PARAGUAY</option><option value="177">PAYS-BAS</option><option value="178">PÉROU</option><option value="179">PHILIPPINES</option><option value="180">PITCAIRN</option><option value="181">POLOGNE</option><option value="182">POLYNÉSIE FRANÇAISE</option><option value="183">PORTO RICO</option><option value="184">PORTUGAL</option><option value="185">QATAR</option><option value="186">RÉUNION</option><option value="187">ROUMANIE</option><option value="188">ROYAUME-UNI</option><option value="189">RUSSIE, FÉDÉRATION DE</option><option value="190">RWANDA</option><option value="191">SAHARA OCCIDENTAL</option><option value="192">SAINT-BARTHÉLEMY</option><option value="193">SAINTE-HÉLÈNE</option><option value="194">SAINTE-LUCIE</option><option value="195">SAINT-KITTS-ET-NEVIS</option><option value="196">SAINT-MARIN</option><option value="197">SAINT-MARTIN</option><option value="198">SAINT-PIERRE-ET-MIQUELON</option><option value="199">SAINT-SIÈGE (ÉTAT DE LA CITÉ DU VATICAN)</option><option value="200">SAINT-VINCENT-ET-LES GRENADINES</option><option value="201">SALOMON, ÎLES</option><option value="202">SAMOA</option><option value="203">SAMOA AMÉRICAINES</option><option value="204">SAO TOMÉ-ET-PRINCIPE</option><option value="205">SÉNÉGAL</option><option value="206">SERBIE</option><option value="207">SEYCHELLES</option><option value="208">SIERRA LEONE</option><option value="209">SINGAPOUR</option><option value="210">SLOVAQUIE</option><option value="211">SLOVÉNIE</option><option value="212">SOMALIE</option><option value="213">SOUDAN</option><option value="214">SRI LANKA</option><option value="215">SUÈDE</option><option value="216">SUISSE</option><option value="217">SURINAME</option><option value="218">SVALBARD ET ÎLE JAN MAYEN</option><option value="219">SWAZILAND</option><option value="220">SYRIENNE, RÉPUBLIQUE ARABE</option><option value="221">TADJIKISTAN</option><option value="222">TAÏWAN, PROVINCE DE CHINE</option><option value="223">TANZANIE, RÉPUBLIQUE-UNIE DE</option><option value="224">TCHAD</option><option value="225">TCHÈQUE, RÉPUBLIQUE</option><option value="226">TERRES AUSTRALES FRANÇAISES</option><option value="227">THAÏLANDE</option><option value="228">TIMOR-LESTE</option><option value="229">TOGO</option><option value="230">TOKELAU</option><option value="231">TONGA</option><option value="232">TRINITÉ-ET-TOBAGO</option><option value="233">TUNISIE</option><option value="234">TURKMÉNISTAN</option><option value="235">TURKS ET CAÏQUES, ÎLES</option><option value="236">TURQUIE</option><option value="237">TUVALU</option><option value="238">UKRAINE</option><option value="239">URUGUAY</option><option value="240">VANUATU</option><option value="241">VATICAN, ÉTAT DE LA CITÉ DU</option><option value="242">VENEZUELA, RÉPUBLIQUE BOLIVARIENNE DU</option><option value="243">VIET NAM</option><option value="244">WALLIS ET FUTUNA</option><option value="245">YÉMEN</option><option value="246">ZAMBIE</option><option value="247">ZIMBABWE</option><option value="248">AUTRE/INCONNU</option></select>
                </div>
              </div>
              <div>
                <input type="hidden" id="app_user_update_addressLatitude" name="app_user_update[addressLatitude]" />
                <input type="hidden" id="app_user_update_addressLongitude" name="app_user_update[addressLongitude]" />
              </div>
              <hr />
              <div class="form-group mb-1">
                <input type="radio" id="app_user_update_enableNotificationsDepartments_0" name="app_user_update[enableNotificationsDepartments]" required="required" value="1" />
                <label class="d-inline required" for="app_user_update_enableNotificationsDepartments_0">Je souhaite recevoir un mail par jour contenant des annonces réalisées dans les départements suivants :</label>
              </div>
              <div class="form-group">
                <select id="app_user_update_notificationsDepartments" name="app_user_update[notificationsDepartments][]" class="form-control" disabled="disabled" multiple="multiple"><option value="01">01 - Ain</option><option value="02">02 - Aisne</option><option value="03">03 - Allier</option><option value="05">05 - Hautes-Alpes</option><option value="04">04 - Alpes-de-Haute-Provence</option><option value="06">06 - Alpes-Maritimes</option><option value="07">07 - Ardèche</option><option value="08">08 - Ardennes</option><option value="09">09 - Ariège</option><option value="10">10 - Aube</option><option value="11">11 - Aude</option><option value="12">12 - Aveyron</option><option value="13">13 - Bouches-du-Rhône</option><option value="14">14 - Calvados</option><option value="15">15 - Cantal</option><option value="16">16 - Charente</option><option value="17">17 - Charente-Maritime</option><option value="18">18 - Cher</option><option value="19">19 - Corrèze</option><option value="2A">2A - Corse-du-sud</option><option value="2B">2B - Haute-corse</option><option value="21">21 - Côte-d&#039;or</option><option value="22">22 - Côtes-d&#039;armor</option><option value="23">23 - Creuse</option><option value="24">24 - Dordogne</option><option value="25">25 - Doubs</option><option value="26">26 - Drôme</option><option value="27">27 - Eure</option><option value="28">28 - Eure-et-Loir</option><option value="29">29 - Finistère</option><option value="30">30 - Gard</option><option value="31">31 - Haute-Garonne</option><option value="32">32 - Gers</option><option value="33">33 - Gironde</option><option value="34">34 - Hérault</option><option value="35">35 - Ile-et-Vilaine</option><option value="36">36 - Indre</option><option value="37">37 - Indre-et-Loire</option><option value="38">38 - Isère</option><option value="39">39 - Jura</option><option value="40">40 - Landes</option><option value="41">41 - Loir-et-Cher</option><option value="42">42 - Loire</option><option value="43">43 - Haute-Loire</option><option value="44">44 - Loire-Atlantique</option><option value="45">45 - Loiret</option><option value="46">46 - Lot</option><option value="47">47 - Lot-et-Garonne</option><option value="48">48 - Lozère</option><option value="49">49 - Maine-et-Loire</option><option value="50">50 - Manche</option><option value="51">51 - Marne</option><option value="52">52 - Haute-Marne</option><option value="53">53 - Mayenne</option><option value="54">54 - Meurthe-et-Moselle</option><option value="55">55 - Meuse</option><option value="56">56 - Morbihan</option><option value="57">57 - Moselle</option><option value="58">58 - Nièvre</option><option value="59">59 - Nord</option><option value="60">60 - Oise</option><option value="61">61 - Orne</option><option value="62">62 - Pas-de-Calais</option><option value="63">63 - Puy-de-Dôme</option><option value="64">64 - Pyrénées-Atlantiques</option><option value="65">65 - Hautes-Pyrénées</option><option value="66">66 - Pyrénées-Orientales</option><option value="67">67 - Bas-Rhin</option><option value="68">68 - Haut-Rhin</option><option value="69">69 - Rhône</option><option value="70">70 - Haute-Saône</option><option value="71">71 - Saône-et-Loire</option><option value="72">72 - Sarthe</option><option value="73">73 - Savoie</option><option value="74">74 - Haute-Savoie</option><option value="75">75 - Paris</option><option value="76">76 - Seine-Maritime</option><option value="77">77 - Seine-et-Marne</option><option value="78">78 - Yvelines</option><option value="79">79 - Deux-Sèvres</option><option value="80">80 - Somme</option><option value="81">81 - Tarn</option><option value="82">82 - Tarn-et-Garonne</option><option value="83">83 - Var</option><option value="84">84 - Vaucluse</option><option value="85">85 - Vendée</option><option value="86">86 - Vienne</option><option value="87">87 - Haute-Vienne</option><option value="88">88 - Vosges</option><option value="89">89 - Yonne</option><option value="90">90 - Territoire de Belfort</option><option value="91">91 - Essonne</option><option value="92">92 - Hauts-de-Seine</option><option value="93">93 - Seine-Saint-Denis</option><option value="94">94 - Val-de-Marne</option><option value="95">95 - Val-d&#039;oise</option></select>
              </div>
              <div class="form-group">
                <input type="radio" id="app_user_update_enableNotificationsDepartments_1" name="app_user_update[enableNotificationsDepartments]" required="required" value="0" checked="checked" />
                <label class="d-inline required" for="app_user_update_enableNotificationsDepartments_1">Je ne souhaite pas recevoir les annonces de dons dans ma zone de collecte</label>
              </div>
              <hr />
              <div class="form-group text-center">
                <div class="row">
                  <div class="col-12">
                    <div class="border border-secondary p-2 rounded">
                      <label>Photo de profil : minimum 200px en largeur et 200px en hauteur</label>
                      <div id="app_user_update_photo" class="d-none"><div><label> </label><div id="app_user_update_photo_imageFile"><div><label for="app_user_update_photo_imageFile_file"> </label><input type="file" id="app_user_update_photo_imageFile_file" name="app_user_update[photo][imageFile][file]" /></div>
                    </div></div>
                  </div>
                  <div class="w-100"></div>
                  <img src="/bundles/app/img/addImage.png" alt="Photo de profil" height="100" class="manage-image mb-2" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <hr />
          <div class="form-group mb-0">
            <div class="form-check mb-0">
              <input type="checkbox" id="app_user_update_phone_is_confidential" name="app_user_update[phone_is_confidential]" value="1" />
              <label class="mb-0" for="app_user_update_phone_is_confidential">Rendre mon mobile confidentiel sur mon profil</label>
            </div>
            <div class="form-check d-none">
              <input type="checkbox" id="app_user_update_receive_informations_mail" name="app_user_update[receive_informations_mail]" value="1" checked="checked" />
              <label for="app_user_update_receive_informations_mail">Je souhaite recevoir les mails concernant mes interventions sur mes dons et mes collectes</label>
            </div>
            <div class="form-check d-none">
              <input type="checkbox" id="app_user_update_receive_informations_phone" name="app_user_update[receive_informations_phone]" value="1" checked="checked" />
              <label for="app_user_update_receive_informations_phone">Je souhaite recevoir un SMS un jour avant mon rendez-vous de remise de don et de collecte</label>
            </div>
          </div>
        </div>
        <div class="col-12">
          <hr />
          <span class="text-danger">Vos données nominatives ne seront ni vendues ni communiquées à un tiers. Elles seront uniquement utilisées par notre association (exemple  : votre adresse sera reprise dans la fiche de don par défaut avec possibilité d’en changer…).</span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row form-group mb-5 justify-content-end">
  <div class="col-12 mt-3">
    <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs" type="submit" value="Modifier" />
  </div>
</div>
</div>
</div>
</div>

<?php
include 'footer.php';
 ?>
