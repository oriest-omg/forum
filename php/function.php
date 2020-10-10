<?php
function envoyer()
{
global $db;
$kokous = "kokous/";
$req= $db->query("SELECT * FROM utilisateur  where id_utilisateur = '".$_SESSION['id_utilisateur']."' ");
$ress = $req->fetch();
$id="  id-".$_SESSION['id_utilisateur'];  
$nomid =$ress['nom_utilisateur']." ".$id;
$dossier="kokous/".$nomid."/";

$image = $_FILES['avatar']['name'];
if(!is_dir($kokous))
{
	mkdir($kokous);
	chmod($kokous, 0777);
	if(!is_dir($dossier))
	{
		mkdir($dossier);
		chmod($dossier, 0777);
    }
    else
    {
		chmod($dossier, 0777);
    }

}
else
{
    chmod($kokous, 0777);
	if(!is_dir($dossier))
	{
		mkdir($dossier);
		chmod($dossier, 0777);
    }
    else
    {
		chmod($dossier, 0777);

    }
}
$target = "C:\\xampp\htdocs\projet\oriForum/php\\".$dossier."\\".basename($image);
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target))
    {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

}
function get_pseudo($id)
{
	global $db;
	$pseudo=$db->prepare("SELECT pseudo from utilisateur WHERE id_utilisateur=?");
	$pseudo->execute(array($id));
	$pseudo=$pseudo->fetch()['pseudo'];
	return $pseudo;
}
function recuperer()
{
global $db;
$kokous = "kokous/";
$req=$db->query(" SELECT * FROM utilisateur  where id_utilisateur= '".$_SESSION['id_utilisateur']."' ");
$result=$req->fetch(); 
$id="  id-".$_SESSION['id_utilisateur'];  
$nomid =$result['nom_utilisateur']." ".$id;
$dossier="kokous/".$nomid."/";
    echo '<img class="image" src="kokous/'.$nomid.'/'.$result['avatar'].'" >';           
}

function reponse_nbr_categorie($id_categorie){
	global $db;
	$req=$db->prepare("SELECT *
						From messages
						join sujet
						join souscategories
						where messages.id_sujet=sujet.id_sujet
						and sujet.id_souscategories=souscategories.id_souscategories
						and id_categories=?
						 ");
	$req->execute(array($id_categorie));
	return $req->rowcount();
}

function dernier_message_categorie($id_dernier_message){
	global $db;
	$lastmess=$db->prepare("SELECT *,messages.id_utilisateur as user
						From messages
						join sujet
						join souscategories
						where messages.id_sujet=sujet.id_sujet
						and sujet.id_souscategories=souscategories.id_souscategories
						and id_categories=?
						order by date_mess desc
						limit 0,1
						");
	$lastmess->execute(array($id_dernier_message));
	if($lastmess->rowcount()>0)
	{
	$lastmess=$lastmess->fetch();
	$dr=$lastmess['date_mess'];
	$dr .='<br/> de '.get_pseudo($lastmess['user']);
	}
	else
	{
		$dr='aucun';
	}
	return $dr;
}


function reponse_nbr_sujet($id_sujet){
	global $db;
	$req=$db->prepare("SELECT *
						From messages
						where id_sujet=?
						 ");
	$req->execute(array($id_sujet));
	return $req->rowcount();
}

function dernier_message_sujet($id_sujet_dernier_message){
	global $db;
	$lastmess=$db->prepare("SELECT *
						From messages
						where id_sujet=?
						order by date_mess desc
						limit 0,1
						");
	$lastmess->execute(array($id_sujet_dernier_message));
	if($lastmess->rowcount()>0)
	{
	$lastmess=$lastmess->fetch();
	$dr=$lastmess['date_mess'];
	$dr .='<br/> de '.get_pseudo($lastmess['id_utilisateur']);
	}
	else
	{
		$dr='aucun';
	}
	return $dr;
}
function civil($id){
	global $db;
    $req=$db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur=? " );
	$req->execute(array($_SESSION['id_utilisateur']));
	$ok=$req->fetch();
	if($ok['sexe_utilisateur']=='M'){
		$civil="Mr ";
	}else{
		$civil="Miss ";
	}
	return $civil;
}
?>


