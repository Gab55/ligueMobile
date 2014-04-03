<form name="new_bug" method="POST" action="index.php?uc=dash&action=nouveau">
    <div id="liste_tickets">
    <?php
    foreach ($bugs as $bug) {
        echo "<ul>";
        echo "<li>".$bug->getCreated()->format('d.m.Y')."</li>";
        echo "<li> ouvert par : ".$bug->getReporter()->getName()."</li>";
        echo "<li>Produit(s) : ";
        foreach ($bug->getProducts() as $product) {
            echo "- ".$product->getName()." ";
        }
        echo "</li>";
        echo "<li>".$bug->getDescription()."</li>";
        echo "</ul>";
    }
    ?>
    </div>
</form>