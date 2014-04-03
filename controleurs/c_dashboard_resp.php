<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eric
 * Date: 20/02/14
 * Time: 19:16
 * To change this template use File | Settings | File Templates.
 */

include("vues/v_entete.php") ;
include("vues/v_bandeau_resp.php") ;


if(!isset($_REQUEST['action']))
    $action = 'list';
else
    $action = $_REQUEST['action'];

switch($action){
    case 'list':{
        $the_bugs = getAllBugs();
        $bugs_en_cours = $the_bugs[0];
        $bugs_fermes =  $the_bugs[1];
        include ("vues/v_container_tab_resp.php");
        break;
    }
    case 'config' : {
        $techniciens = getAllTechnicien();
        include("vues/v_config_resp.php");
        break;
    }
    case 'modifier_statut' : {
        $idBug = $_POST['idBug'];
        $idEngineer = $_SESSION['login']['id'];
        $status = $_POST['statut'];
        $note_tech = $_POST['note_tech'];
        statutBug($idBug, $idEngineer, $status, $note_tech);
        include("vues/v_entete.php") ;
        include("vues/v_bandeau_resp.php") ;
        header("Location:index.php?uc=dash");
        break;
    }
    case 'affecter' : {
        $idBug = $_POST['idBug'];
        $idTech = $_POST['idTech'];
        affecterBug($idBug, $idTech);
        header("Location:index.php?uc=dash");
        break;
    }
}

