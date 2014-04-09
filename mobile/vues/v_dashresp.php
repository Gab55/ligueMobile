<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div data-role="page">
    <div data-role="header">
        <form>
            <div class="ui-input-btn ui-btn ui-btn-inline">
                Mon tableau de bord
                <input data-enhanced="true" value="Enhanced" type="button">
            </div>
            <div class="ui-input-btn ui-btn ui-btn-inline">
                Se déconnecter
                <input data-enhanced="true" value="Enhanced" type="button">
            </div>
        </form>
    </div>
    <div data-role="content">
        <div data-role="collapsible-set" data-theme="b" data-content-theme="a">
            <div id="liste_tickets">
                <div data-role="collapsible" data-collapsed="true">
<h2>BUGS EN COURS</h2>

<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
    <thead>
    <tr>
        <th>Technicien</th>
        <th>Statut</th>
        <th data-priority="3">Date</th>
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
        echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
        echo "<td><a href='index.php?uc=dash&action=config&bug=".$bug->getId()."' data-transition='slide' >Ouvrir</a></td>";
        echo "</tr>";
    }

    ?>
</table>
                    <a href='index.php?uc=dash&action=config' data-transition='slide'>Ouvrir</a>



<br>
</div>

<hr>
                <div data-role="collapsible">
<h2>BUGS FERMES</h2>

<table cellspacing="0">
    <tr><th>Technicien</th><th>Client</th><th>Description</th><th>Résumé résolution</th><th>Crée le</th><th>Statut</th></tr>
    <?php
    foreach($bugs_fermes as $bug){
        if ($bug->getEngineer() != null){
            $engineer = $bug->getEngineer()->getName();
        }else{
            $engineer = "non affecté";
        }

        echo "<tr>";
        echo "<td>".$engineer."</td>";
        echo "<td>".$bug->getReporter()->getName()."</td>";
        echo "<td>".$bug->getDescription()."</td>";
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
