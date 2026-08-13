 <?php


if (empty($_POST['user_lastname']) || empty($_POST['user_firstname']) || empty($_POST['user_email']) || empty($_POST['user_phone']) || empty($_POST['sujet']) || empty($_POST['user_message'])) {
    echo "Champs obligatoires";
    exit;
}

// validate email
if (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) === false) {
    echo "E-mail invalide";
    exit;

} else {
    
    echo "Merci {$_POST['user_lastname']} {$_POST['user_firstname']} de nous avoir contacté à propos de {$_POST['sujet']}.<br>";
    echo "Un de nos conseillers vous contactera soit à l'adresse {$_POST['user_email']} ou par téléphone au {$_POST['user_phone']} dans les plus brefs délais pour traiter votre demande : <br>{$_POST['user_message']}";
}
