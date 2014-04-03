<?php

?>
<table cellspacing="0">
    <tr><th>Client</th><th>Crée le</th><th>Statut</th><th>Description</th><th>Modifier</th></tr>
    <?php
    foreach($bugs_en_cours as $bug){
        if ($bug->getEngineer() != null){
            $engineer = $bug->getEngineer()->getName();
        }
        echo "<tr>";
        echo "<td>".$engineer."</td>";
        echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
        echo "<td>".$bug->getStatus()."</td>";
        echo "<td>".$bug->getDescription()."</td>";
        echo "<td><a href='index.php?uc=dash&action=config&bug=".$bug->getId()."'><img src='util/img/arrow.png'></a></td>";
        echo "</tr>";
    }
    ?>
</table>