<?php
require_once('config.php');
require('function.php');

//
$sujet=$db->prepare('SELECT * from sujet join utilisateur where id_souscategories=? and sujet.id_utilisateur=utilisateur.id_utilisateur');

require('../views/sujet.view.php');

?>