<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    
    
    // 1. Créer mes variables pour contenir mes infos clients
    // 2. Ecrire le scripts pour déterminer le palier de tarif
    // 3. Affiche le résultat

    // J'initialise mes variables
    /*
    $age = 30;
    $seniorityDriverLicence=2;
    $responsibleAccidentCount=0;
    $seniorityInsurance =6;
    */
    
    // Avant de me lancer dans l'algorithmie, je vérifie que déjà je reçois bien les infos de mon formulaire comme je l'ai formatté :
    //var_dump($_POST);
    
    // Pour déclencher mes algorithmes, je vérifie que ma super globale $_POST contient bien des valeurs
    
    if (!empty($_POST)){

        $level = 1;

        // Je récupère les valeurs issues de mon formulaire et je vérifie leur cohérence 

        if (isset($_POST['age']) && ctype_digit($_POST['age']) && $_POST['age'] >= 17) {
            $age = $_POST['age'];
        } 

        if (isset($_POST['anciennete-permis']) && ctype_digit($_POST['anciennete-permis']) && $_POST['anciennete-permis'] >= 0) {
            $seniorityDriverLicence = $_POST['anciennete-permis'];
        } 

        if (isset($_POST['accident']) && ctype_digit($_POST['accident']) && $_POST['accident'] >= 0) {
            $responsibleAccidentCount = $_POST['accident'];
        }

        if (isset($_POST['anciennete-assureur']) && ctype_digit($_POST['anciennete-assureur']) && $_POST['anciennete-assureur'] >= 0) {
            $seniorityInsurance = $_POST['anciennete-assureur'];
        } 

        // Je déduis du level le nombre d'accidents responsables 
        $level = $level - $responsibleAccidentCount;

        // Si notre conducteur à plus de 2 ans de permis je lui rajoute un niveau supérieur sur son tarif ($level)
        if ($seniorityDriverLicence >= 2) {
            $level++;
        }

        // Un âge de plus de 25 ans augmente le palier d'un niveau
        if ($age > 25){
            $level++;
        }



        // Une première façon de faire
        /*
        if ($level > 0) {
            if($seniorityDriverLicence > 5){
                $level++;
            }
        }
        */

        // Une deuxième (c'est la même chose) 
        if ($level > 0 && $seniorityDriverLicence > 5){
            $level++;
        }

        /*
        // Une troisième (c'est la même chose mais en ternaire) 
        $level = $level = 0 ? $level : ($seniorityDriverLicence > 5 ? $level++ : $level);
        */

        // Je veux limiter la valeur de $level à minimum 0 parce que je ne veux pas de valeur négative et je veux le limiter à maximum 4 car il n'existe pas de niveau 5 et plus.
        
        if ($level < 0){
            $level = 0;
        }
        if ($level > 4){
            $level = 4;
        }

    }

    /*
    if (!empty($level)){
        echo $level;
    }
    */
    ;?>
    
    
    
    <h1>Calculer votre tarif d'assurance</h1>

    <?php if(isset($level)) : ?>
        <?php 
        if ($level ==0){
            $message = "Refus d'assurer";
            $cssClass = "grey";
        }elseif ($level==1){
            $message = "Rouge";
            $cssClass ="red";
        }elseif ($level == 2){
            $message = "Orange";
            $cssClass= "orange";
        }elseif ($level == 3){
            $message = "Vert";
            $cssClass ="green";
        }elseif($level== 4){
            $message ="Bleu";
            $cssClass ="blue";
        }
        ?>
        <p>Vous avez le droit au tarif <strong class="<?= $cssClass; ?>"> <?= $message ?></strong></p>

        <p>Vous avez le droit au tarif <strong style="color:<?=$cssClass?>"><?= $message ?> </strong></p>

    <?php endif;?>

    <form action="" method="post">
        <div>
            <label>Indiquez votre âge svp</label>
            <input type="number" name="age" placeholder="xx ans" required min="17" max="99">
        </div>
        <div>
            <label>Indiquez votre ancienneté de permis</label>
            <input type="number" name="anciennete-permis" placeholder="xx ans" required min="0">
        </div>
        <div>
            <label>Indiquez le nombre d'accidents responsables</label>
            <input type="number" name="accident" placeholder="xx accidents" min="0">
        </div>
        <div>
            <label>Indiquez votre ancienneté chez votre assureur</label>
            <input type="number" name="anciennete-assureur" placeholder="xx ans" min="0">
        </div>
        <button type="submit">Calculer le tarif</button>
    </form>
</body>
</html>