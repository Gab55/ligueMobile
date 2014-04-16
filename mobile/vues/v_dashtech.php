<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div data-role="page">
    <div data-role="header">
<form>
    <div class="ui-input-btn ui-btn ui-btn-inline">
    <?php
        if(estConnecter()){
        ?>
            <a href="index.php?uc=dash" data-role="button" data-transition="slide" data-inline="true"> Mon tableau de bord </a>
            <a href="index.php?uc=dash&action=modif" data-transition='slide'data-role="button" data-inline="true">modif</a>
            <a href="index.php?uc=deconnexion" data-transition='slide'data-role="button" data-inline="true">Se déconnecter</a>

        <?php
        }else{
            ?><a href="index.php?uc=accueil" data-role="button" data-inline="true"> Accueil </a></li>';
        <?php
        }
    ?>
    </div>
</form>
    </div>
    <div data-role="content">

            <div id="liste_tickets">

                    <h2>BUGS EN COURS</h2>

                    <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="a" data-column-btn-text="Colonnes à afficher..." data-column-popup-theme="a">
                        <thead>
                        <tr>
                            <th>Technicien</th>
                            <th>Statut</th>
                            <th data-priority="3">Priorité</th>
                            <th data-priority="4">Date</th>
                            <th data-priority="5">Description</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        foreach($bugs_en_cours as $bug){
                            if ($bug->getEngineer() != null){
                                $engineer = $bug->getEngineer()->getName();
                            }else{
                                $engineer = "non affecté";
                            }
                            echo "<tr>";
                            echo "<td>".$engineer."</td>";
                            //echo "<td>".$bug->getReporter()->getName()."</td>";
                            //echo "<td>".$bug->getDescription()."</td>";
                            if($bug->getStatus()=="IN PROGRESS"){
                                echo "<td>En cours</td>";
                            }
                            else {
                                echo "<td>Ouvert</td>";
                            }
                            echo "<td>".$bug->getDelai()."</td>";
                            echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
                            echo "<td>".$bug->getDescription()."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table><br>
                </div>
            </div>

</div>
