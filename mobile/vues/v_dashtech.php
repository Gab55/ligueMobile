<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div data-role="page">
    <div data-role="header">
<form>
    <div class="ui-input-btn ui-btn ui-btn-inline">
    <?php
        if(estConnecter()){
        ?>
            <a href="index.php?uc=dash" data-role="button" data-inline="true"> Mon tableau de bord </a>
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

                    <table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
                        <thead>
                        <tr><th>Client</th><th>Crée le</th><th>Statut</th><th>Description</th><th>PRIORITÉ</th><th>Modifier</th></tr>
                        <?php
                        foreach($bugs_en_cours as $bug){
                            $engineer = "Non déterminé";
                            if ($bug->getEngineer() != null){
                                $engineer = $bug->getEngineer()->getName();
                            }
                            echo "<tr>";
                            echo "<td>".$engineer."</td>";
                            echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
                            echo "<td>".$bug->getStatus()."</td>";
                            echo "<td>".$bug->getDescription()."</td>";
                            echo "<td>".$bug->getDelai()."</td>";
                            echo "<td><a href='index.php?uc=dash&action=config&bug=".$bug->getId()."'><img src='util/img/arrow.png'></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table><br>
                </div>
            </div>

</div>
