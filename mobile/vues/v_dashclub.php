<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div data-role="page">
    <div data-role="header">
<form>

    <a href="index.php?uc=dash" data-transition="flip" data-role="button" data-inline="true">Mon tableau de bord </a>

    <a href="index.php?uc=dash&action=nouveau" data-transition="flip" data-role="button" data-inline="true"> Nouvel incident</a>

    <a href="index.php?uc=deconnexion"  data-transition="flip" data-role="button" data-inline="true"> Se déconnecter </a>


</form>
    </div>
    <div data-role="content">
        <h4>Bienvenue sur votre console de gestion</h4>

        <div data-role="collapsible-set" data-theme="b" data-content-theme="a">
            <div id="liste_tickets">
            <div data-role="collapsible" data-collapsed="true">
                <h3>Tickets en cours</h3>
                <p>
                <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b" data-column-btn-text="Colonnes à afficher..." data-column-popup-theme="a">
                   <thead>
                    <tr>
                        <th></th>
                        <th>Numéro</th>

                        <th data-priority="2">Date</th>
                        <th data-priority="3">Objet</th>
                        <th data-priority="4">Technicien</th>
                        <th data-priority="5">Produits concernés</th>
                    </tr>
                   </thead>
                    <?php
                    foreach ($bugs_en_cours as $bug) {
                        if ($bug->getEngineer() != null){
                            $engineer = $bug->getEngineer()->getName();
                        }else{
                            $engineer = "non affecté";
                        }
                        echo "<tr>";
                        echo "<td><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
                        echo "<td class='colonneid'>".$bug->getId()."</td>";
                        echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
                        echo "<td class='colonnetech'>".$bug->getObjet()."</td>";
                        echo "<td class='colonnetech'>".$engineer."</td>";
                        echo "<td class='colonneprod'>";
                        foreach ($bug->getProducts() as $product) {
                            echo "- ".$product->getName()." ";
                        }
                        echo "</td>";
                        //echo "<li>".$bug->getDescription()."</li>";
                        echo "</tr>";
                    }
                    ?>


                </table>
                </p>
            </div>

            <div data-role="collapsible">
                <h3>Tickets cloturés</h3>
                <p>
                <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
                    <?php
                    foreach ($bugs_fermes as $bug) {
                        if ($bug->getEngineer() != null){
                            $engineer = $bug->getEngineer()->getName();
                        }else{
                            $engineer = "non affecté";
                        }
                        echo "<tr>";
                        echo "<td><img src='../images/ferme.png' width='30px' height='30px'/></td>";
                        echo "<td class='colonneid'>".$bug->getId()."</td>";
                        echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
                        echo "<td class='colonnetech'>".$engineer."</td>";
                        echo "<td class='colonneprod'>";
                        foreach ($bug->getProducts() as $product) {
                            echo "- ".$product->getName()." ";
                        }
                        echo "</td>";
                        //echo "<td>".$bug->getDescription()."</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
                </p>
            </div>
            </div>
        </div>
    </div>
    <div data-role="footer" data-position="fixed">
        <h4>Pied de page</h4>
    </div>
</div>

<div data-role="dialog" id="ticket_dialog">
    <div data-role="header">
        <h1>Detail du ticket <div id="id_ticket"></div></h1>
    </div>
    <div data-role="content">
        <div id="descri_ticket"></div>
        <hr/>
        <div id="solution_ticket"></div>
    </div>
</div>

</body>
</html>