<div class="container my-5">
        <form name="make_donation" method="post" class="make_donation" enctype="multipart/form-data">
            <div id="makeDonationPage" class="row justify-content-center">
                                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
                            <h1 class="card-title mb-3">
                                Faire un don                            </h1>
                        </div>
                        <div class="card-body p-0">
                            <div class="row justify-content-center my-2">
                                                                                            </div>
                            <nav class="my-5">
                                <ol class="cd-multi-steps text-bottom count">
                                    <li class="current"><em>Description du don</em></li>
                                                                                                                        <li id="identifierAssoLi"><em>Identifier votre association</em></li>

                                                                                                                        <li><em>Prise de rendez-vous</em></li>
                                                                                                                                                        <li><em>Finalisation</em></li>
                                                                    </ol>
                            </nav>
                            <div class="col-12 card border-0">
                                <div class="row card-body p-0 pt-2">
                                    <div class="col-12 col-sm-8">
                                        <label for="make_donation_packages___name___title" class="required font-weight-bold">Titre de l'annonce* : </label>

                                        <input type="text" id="make_donation_title" name="make_donation[title]" required="required" placeholder="Titre (50 caractères maximum)" class="form-control" value="Fruits" />
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label for="make_donation_packages___name___number" class="required font-weight-bold">Catégories* (les produits ne doivent pas être périmés) : </label>
                                        <div class="form-group" id="make_donation_category">
                                                                                                                                <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="1">
                                                <label class="form-check-label">
                                                    <img src="/images/150x150/5a747ba4c2c96.png" alt="Fruits et légumes" class="img-thumbnail category-1-checked" width="100" data-toggle="tooltip" data-placement="bottom" title="Fruits et légumes"/><input class="form-check-input d-none make_donation_category" type="checkbox" name="make_donation[categories][]" value="1" checked/><span class="oi oi-check category-1-checked" style="color:#39a935;    position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Fruits et légumes<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les produits d&amp;eacute;t&amp;eacute;rior&amp;eacute;s ou susceptibles de repr&amp;eacute;senter un danger &amp;agrave; la consommation sont refus&amp;eacute;s. Quelques conseils de conservation pour donner des fruits et l&amp;eacute;gumes dans de bonnes conditions : http://agriculture.gouv.fr/comment-bien-conserver-ses-legumes"></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="2">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5a747bb38dbb8.png" alt="Produits frais" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="(viande, fromage, poisson, yaourts…)"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="2" /><span class="oi oi-check category-2-checked d-none" style="color:#cc1111; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Produits frais<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les produits d&amp;eacute;ball&amp;eacute;s, d&amp;eacute;t&amp;eacute;rior&amp;eacute;s ou susceptibles de repr&amp;eacute;senter un danger &amp;agrave; la consommation sont refus&amp;eacute;s. La Date limite de consommation (DLC) ne doit pas &amp;ecirc;tre d&amp;eacute;pass&amp;eacute;e (cf. &amp;laquo; A consommer jusqu&amp;rsquo;au &amp;raquo;. La cha&amp;icirc;ne du froid doit avoir &amp;eacute;t&amp;eacute; respect&amp;eacute;e. Retrouvez plus d&#039;informations sur notre guide des dons. Quelques conseils de conservation pour donner des produits frais dans de bonnes conditions : https://www.economie.gouv.fr/dgccrf/Publications/Vie-pratique/Fiches-pratiques/Temperature-de-conservation"></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="7">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5a747bd5558c1.png" alt="Produits secs" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="(Farine, riz…)"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="7" /><span class="oi oi-check category-7-checked d-none" style="color:#EE72B4; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Produits secs<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les produits d&amp;eacute;t&amp;eacute;rior&amp;eacute;s, ayant pris l&amp;rsquo;humidit&amp;eacute; ou susceptibles de repr&amp;eacute;senter un danger &amp;agrave; la consommation sont refus&amp;eacute;s."></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="3">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5a747bbb88b85.png" alt="Produits congelés" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="Produits congelés"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="3" /><span class="oi oi-check category-3-checked d-none" style="color:#274B7E; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Produits congelés<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Le respect de la cha&amp;icirc;ne du froid et des bonnes conditions de conservation sont les conditions sine qua none pour pouvoir donner des produits congel&amp;eacute;s. Retrouvez plus d&#039;informations sur notre guide des dons. Quelques conseils de conservation pour donner des produits congel&amp;eacute;s dans de bonnes conditions https://www.economie.gouv.fr/dgccrf/Publications/Vie-pratique/Fiches-pratiques/Temperature-de-conservation"></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="5">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5a747bc8aeae6.png" alt="Boissons" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="Boissons"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="5" /><span class="oi oi-check category-5-checked d-none" style="color:#06cefd; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Boissons<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les bouteilles ne doivent pas avoir &amp;eacute;t&amp;eacute; ouvertes. La date limite d&#039;utilisation optimale (DLUO) ne signifie pas que le produit ne peut pas &amp;ecirc;tre propos&amp;eacute;. Seuls les articles d&amp;eacute;t&amp;eacute;rior&amp;eacute;s ou susceptibles de repr&amp;eacute;senter un danger &amp;agrave; la consommation sont refus&amp;eacute;s (ex. couleur anormale, etc.). Si la DLUO est d&amp;eacute;pass&amp;eacute;e, regardez l&amp;rsquo;&amp;eacute;tat du produit et jugez s&amp;rsquo;il peut &amp;ecirc;tre donner. Dans ce cas, merci de le pr&amp;eacute;ciser dans le texte de l&amp;rsquo;annonce. Retrouvez plus d&#039;informations sur notre guide des dons."></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="4">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5a747bc20e706.png" alt="Autres aliments" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="(boites de conserve, gâteaux…)"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="4" /><span class="oi oi-check category-4-checked d-none" style="color:#e5790e; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Autres aliments<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les produits emball&amp;eacute;s ou ferm&amp;eacute;s ne doivent pas avoir &amp;eacute;t&amp;eacute; ouverts. Les produits d&amp;eacute;t&amp;eacute;rior&amp;eacute;s ou susceptibles de repr&amp;eacute;senter un danger &amp;agrave; la consommation sont refus&amp;eacute;s (ex. emballage perfor&amp;eacute;, bo&amp;icirc;tes de conserve bomb&amp;eacute;es, couleur anormale, etc.). La Date limite de consommation (DLC) ne doit pas &amp;ecirc;tre d&amp;eacute;pass&amp;eacute;e (cf. &amp;laquo; A consommer jusqu&amp;rsquo;au &amp;raquo;). La date limite d&#039;utilisation optimale (DLUO) (cf. &quot; A consommer de pr&amp;eacute;f&amp;eacute;rence avant le :&quot;) ne signifie pas que le produit ne peut pas &amp;ecirc;tre propos&amp;eacute;. Si cette date est d&amp;eacute;pass&amp;eacute;e, regardez l&amp;rsquo;&amp;eacute;tat du produit et jugez s&amp;rsquo;il peut &amp;ecirc;tre donn&amp;eacute;. Dans ce cas, merci de le pr&amp;eacute;ciser dans le texte de l&amp;rsquo;annonce. Retrouvez plus d&#039;informations sur notre guide des dons."></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="6">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5a747bcfc077d.png" alt="Hygiène" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="Hygiène"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="6" /><span class="oi oi-check category-6-checked d-none" style="color:#CADB27; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Hygiène<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les produits ferm&amp;eacute;s ne doivent pas avoir &amp;eacute;t&amp;eacute; ouverts. Prendre en compte les dates d&amp;rsquo;utilisation indiqu&amp;eacute;es sur les produits. Si elles sont d&amp;eacute;pass&amp;eacute;es, merci de le pr&amp;eacute;ciser dans le texte de l&amp;rsquo;annonce."></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="8">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5b1e2d16b1c07.png" alt="Aliments Animaux" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="Aliments Animaux"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="8" /><span class="oi oi-check category-8-checked d-none" style="color:#a6b4b6; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Aliments Animaux<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="Les produits d&amp;eacute;ball&amp;eacute;s, d&amp;eacute;t&amp;eacute;rior&amp;eacute;s ou susceptibles de repr&amp;eacute;senter un danger &amp;agrave; la consommation sont refus&amp;eacute;s. Si les dates de consommation sont d&amp;eacute;pass&amp;eacute;es, merci de pr&amp;eacute;ciser dans la zone de texte de l&amp;rsquo;annonce."></span></p>
                                            </div>
                                                                                                                                                                            <div class="form-check form-check-inline ml-0 text-center category-checkbox" data-id="9">
                                                <label class="form-check-label">
                                                        <img src="/images/150x150/5b1e2d6958fd6.png" alt="Hygiène Animaux" class="img-thumbnail" width="100" data-toggle="tooltip" data-placement="bottom" title="Hygiène Animaux"/><input class="form-check-input make_donation_category" type="checkbox" name="make_donation[categories][]" value="9" /><span class="oi oi-check category-9-checked d-none" style="color:#f19eae; position: absolute; right: 19px;"></span>
                                                </label>
                                                <p class="mb-0">Hygiène Animaux<span class="oi oi-info cursor-pointer text-primary ml-1" data-toggle="popover" title="Informations" data-content="les produits ferm&amp;eacute;s ne doivent pas avoir &amp;eacute;t&amp;eacute; ouverts. Prendre en compte les dates d&amp;rsquo;utilisation indiqu&amp;eacute;es sur les produits. Si elles sont d&amp;eacute;pass&amp;eacute;es, merci de le pr&amp;eacute;ciser dans le texte de l&amp;rsquo;annonce"></span></p>
                                            </div>
                                                                                                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="make_donation_packages___name___details" class="required font-weight-bold">Texte de l'annonce : </label>

                                <textarea id="make_donation_details" name="make_donation[details]" class="form-control" rows="5" placeholder="Votre texte"></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="make_donation_packages___name___number" class="required font-weight-bold">Nombre de colis* : </label>
                                <button type="button" class="btn btn-outline-primary addPackage"><span class="oi oi-plus"></span></button>

                                <div class="container-packages" data-prototype="<div class='form-inline my-3 package-container package-__name__'>&lt;input&#x20;type&#x3D;&quot;text&quot;&#x20;id&#x3D;&quot;make_donation_packages___name___number&quot;&#x20;name&#x3D;&quot;make_donation&#x5B;packages&#x5D;&#x5B;__name__&#x5D;&#x5B;number&#x5D;&quot;&#x20;required&#x3D;&quot;required&quot;&#x20;class&#x3D;&quot;mr-2&#x20;mr-md-3&#x20;mb-2&#x20;mb-sm-0&#x20;form-control&quot;&#x20;&#x2F;&gt;&lt;select&#x20;id&#x3D;&quot;make_donation_packages___name___type&quot;&#x20;name&#x3D;&quot;make_donation&#x5B;packages&#x5D;&#x5B;__name__&#x5D;&#x5B;type&#x5D;&quot;&#x20;class&#x3D;&quot;form-control&quot;&gt;&lt;option&#x20;value&#x3D;&quot;2&quot;&gt;Sac&#x28;s&#x29;&lt;&#x2F;option&gt;&lt;option&#x20;value&#x3D;&quot;3&quot;&gt;Sac&#x28;s&#x29;&#x20;isotherme&#x28;s&#x29;&lt;&#x2F;option&gt;&lt;option&#x20;value&#x3D;&quot;4&quot;&gt;Carton&#x28;s&#x29;&lt;&#x2F;option&gt;&lt;option&#x20;value&#x3D;&quot;5&quot;&gt;Caisse&#x28;s&#x29;&lt;&#x2F;option&gt;&lt;option&#x20;value&#x3D;&quot;6&quot;&gt;Sans&#x20;contenant&lt;&#x2F;option&gt;&lt;option&#x20;value&#x3D;&quot;1&quot;&gt;Palette&#x28;s&#x29;&lt;&#x2F;option&gt;&lt;&#x2F;select&gt;&nbsp;&nbsp;<button class='btn btn-outline-primary btn-icon--delete delete-package'><span class='oi oi-trash'></span></button></div>">
                                                                            <div class="form-inline my-3 package-container package-0">

                                            <input type="text" id="make_donation_packages_0_number" name="make_donation[packages][0][number]" required="required" class="mr-2 mr-md-3 mb-2 mb-sm-0 form-control" value="1" />

                                            <select id="make_donation_packages_0_type" name="make_donation[packages][0][type]" class="form-control"><option value="2" selected="selected">Sac(s)</option><option value="3">Sac(s) isotherme(s)</option><option value="4">Carton(s)</option><option value="5">Caisse(s)</option><option value="6">Sans contenant</option><option value="1">Palette(s)</option></select>
                                                                                    </div>
                                                                    </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="make_donation_packages___name___weight" class="required font-weight-bold">Estimation du poids total* : </label>
                                <div class="form-inline">

                                    <input type="text" id="make_donation_weight" name="make_donation[weight]" required="required" class="mr-3 mb-2 mb-sm-0 form-control" value="2" />


                                    <select id="make_donation_weightType" name="make_donation[weightType]" class="form-control"><option value="1" selected="selected">Kg</option><option value="2">g</option></select>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="make_donation_packages___name___photo" class="required font-weight-bold">Photo :  </label>
                                <div class="border border-secondary p-2 rounded text-center">
                                    <label>minimum 315px en largeur et 315px en hauteur</label>
                                    <div id="make_donation_photo" class="d-none"><div><label> </label><div id="make_donation_photo_imageFile"><div><label for="make_donation_photo_imageFile_file"> </label><input type="file" id="make_donation_photo_imageFile_file" name="make_donation[photo][imageFile][file]" /></div>
    </div></div>
    </div>
                                    <div class="w-100"></div>
                                                                            <img src="/bundles/app/img/addImage.png" alt="Photo de profil" height="50" class="manage-image mb-2" />
                                                                    </div>
                            </div>
                            <div class="col-12 col-lg-8 col-xl-6 my-4">
                                <div class="row">
                                    <div class="col-12 col-md-4 mb-2 mb-md-0">
                                        <label for="make_donation_deliveryType" class="required font-weight-bold mb-0 mt-2">Option de remise* : </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select id="make_donation_deliveryType" name="make_donation[deliveryType]" class="form-control"><option value="3">Demande de collecte par un particulier</option><option value="2" selected="selected">Demande de collecte par une association</option><option value="1">Dépôt dans une association</option></select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="make_donation_photoCrop" name="make_donation[photoCrop]" />
                            <input type="hidden" id="make_donation__token" name="make_donation[_token]" value="VXcMOyJ8KsNcQR8rVG7JfeO2gfznXQrfi2xMgFjp2v0" />
                        </div>
                    </div>
                </div>
            </div>
