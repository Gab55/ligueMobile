<?php

?>
<h2>BUGS EN COURS</h2>
<table cellspacing="0">
    <tr><th>Technicien</th><th>Client</th><th>Description</th><th>Crée le</th><th>Statut</th><th></th></tr>
    <?php
    foreach($bugs_en_cours as $bug){
        if ($bug->getEngineer() != null){
            $engineer = $bug->getEngineer()->getName();
        }else{
            $engineer = "non affecté";
        }

        echo "<tr>";
        echo "<td>".$engineer."</td>";
        echo "<td>".$bug->getReporter()->getName()."</td>";
        echo "<td>".$bug->getDescription()."</td>";
        echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
        echo "<td>".$bug->getStatus()."</td>";
        echo "<td><a href='index.php?uc=dash&action=config&bug=".$bug->getId()."'><img src='util/img/arrow.png'></a></td>";
        echo "</tr>";
    }

    ?>
</table><br>
<hr>
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
