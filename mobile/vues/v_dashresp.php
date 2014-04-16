<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div data-role="page">
    <div data-role="header">
        <form>

                <a href="index.php?uc=dash" data-transition='slide'data-role="button" data-inline="true">Tableau de bord</a>


                <a href="index.php?uc=deconnexion" data-transition='slide'data-role="button" data-inline="true">Se déconnecter</a>
        </form>
    </div>
    <div data-role="content">
        <div data-role="collapsible-set" data-theme="b" data-content-theme="a">
            <div id="liste_tickets">
                <div data-role="collapsible" data-collapsed="true">

<h2>BUGS EN COURS</h2>
    <h4>Pour afficher le ticket, appuyer sur la ligne correspondante</h4>
<div id="liste_tickets">
    <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b" data-column-btn-text="Colonnes à afficher..." data-column-popup-theme="a">
        <thead>
        <tr>
            <th >Technicien</th>
            <th data-priority="1">Statut</th>
            <th data-priority="3">Date</th>
            <th data-priority="4">Numéro</th>
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
            echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
            echo "<td>".$bug->getId()."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<br>
</div>

<hr>
                <div data-role="collapsible">
<h2>BUGS FERMES</h2>
<h4>Pour afficher le ticket, appuyer sur la ligne correspondante</h4>
<div id="liste_tickets">
    <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b" data-column-btn-text="Colonnes à afficher..." data-column-popup-theme="a">
    <thead>
        <tr>
            <th >Technicien</th>
            <th data-priority="1">Résumé</th>
            <th data-priority="3">Date</th>
            <th data-priority="4">Numéro</th>
        </tr>
    </thead>
    <?php
    foreach($bugs_fermes as $bug){
        if ($bug->getEngineer() != null){
            $engineer = $bug->getEngineer()->getName();
        }else{
            $engineer = "non affecté";
        }

        echo "<tr>";
        echo "<td>".$engineer."</td>";
        //echo "<td>".$bug->getReporter()->getName()."</td>";
        //echo "<td>".$bug->getDescription()."</td>";
        echo "<td>".$bug->getResume()."</td>";
        echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
        echo "<td>".$bug->getStatus()."</td>";
        echo "</tr>";
    }

    ?>
</table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<div data-role="dialog" id="ticket_dialog">
    <div data-role="header">
        <h1>Detail du ticket <div id="id_ticket"></div></h1>
    </div>
    <div data-role="content">
        <h3>Date :</h3><div id="date_ticket"></div>
        <h3>Description :</h3><div id="descri_ticket"></div>
        <h3>Capture d'écran : </h3><div id="capture"></div>
    </div>
    <hr>
    <form>
        <input type="text">
    </form>

</div>
