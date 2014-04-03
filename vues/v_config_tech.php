<?php
$bug = getOneBug($_GET["bug"]);
echo "Bug n°".$bug->getId()."<br>Description : ".$bug->getDescription();
//var_dump($bug);
?>

<h2>Que voulez vous faire ?</h2>
<FORM>
    <INPUT type= "radio" name="radio" id="resolu" value="resolu" onclick="form_resolu();">Changer le statut<br><br>
    </FORM>
<hr>

<form id="form_resolu" method="post" action="index.php?uc=dash&action=modifier_statut">
    <h3>Changement de statut</h3>
    <input type="hidden" name="idBug" value="<?php echo $bug->getId();?>">
    <select id="statut" name="statut">
        <option value="CLOSE">CLOSE</option>
        <option value="IN PROGRESS">IN PROGRESS</option>
    </select><br><br>
    Ajouter une note<br>
    <textarea></textarea><br><br>
    <input id="note_tech"type="submit" value="Valider">
</form>

<script>
    $( document ).ready(function() {
        $('#form_resolu').fadeOut(1);
        $('#form_affecter').fadeOut(1);
    });
    function form_resolu() {
        $('#form_resolu').fadeOut(1);
        $('#form_affecter').fadeOut(1);
        $('#form_resolu').fadeIn(1);
    }

</script>