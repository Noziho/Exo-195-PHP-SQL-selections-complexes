<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.

require __DIR__ . '/Config.php';
require __DIR__ . '/DB_Connect.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<h1>Non trié</h1>
<?php
$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div><?php
        foreach ($user as $key => $value) {
            echo $key . " : " . $value . "<br><br><hr>";
        } ?>

        </div><?php
    }
} ?>
<h1>Trié en DESC: </h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user ORDER BY id DESC
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

?>
<h1>Trié en DESC avec nom et prénoms: </h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user ORDER BY id DESC
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>Utilisateur: <?= $user['nom'] . " " . $user['prenom'] . "<br><br>"

        ?></div><?php

    }
} ?>
<h1>Afficher tous les user dont le nom est Conor</h1>
<?php
/* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
// TODO votre code ici.

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE nom = 'Conor'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}
?>
<h1>Tout les user dont le prénom est différent de John</h1>
<?php
/* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
// TODO Votre code ici.
$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE prenom != 'John'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}
?>
<h1>User avec id inférieur ou égal à 2</h1>
<?php
/* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE id <= 2
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}


/* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.
?>
<h1>User avec id supérieur ou égal à 2</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE id >= 2
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.

?>
<h1>User avec id égal à 1</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE id = 1
");


if ($stmt->execute()) {?>
    <div>
    <?php
        foreach ($stmt->fetch() as $key => $value) {
            echo $key ." : " .$value . "<br><br><hr>";
        }
    ?>
    </div><?php



}

/* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.

?>
<h1>User dont l'id est plus grand que 1 ET le nom est égal à 'Doe'</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE id > 1 AND nom = 'Doe'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.

?>
<h1>User dont le nom est 'Doe' ET le prénom est 'John'</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE nom = 'Doe' AND prenom = 'John'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.

?>
<h1>User dont le nom est 'Conor' OU le prénom est 'Jane'</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE nom = 'Conor' OR prenom = 'Jane'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.

?>
<h1>Afficher tout les user en limitant les résultats à 2</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user LIMIT 2
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul
enregistrement */
// TODO Votre code ici.

?>
<h1>Afficher tout les user en limitant les résultats à 1</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user LIMIT 1
");


if ($stmt->execute()) {
     ?>
        <div>
            <?php
            foreach ($stmt->fetch() as $key => $user) {
                echo $key . " : " . $user . "<br><br><hr>";
            } ?>

        </div>
        <?php

}

/* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères (
voir LIKE )*/
// TODO Votre code ici.

?>
<h1>Afficher tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE nom LIKE 'C___r'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}


/* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.

?>
<h1>Afficher tous les utilisateurs dont le nom contient au moins un 'e'</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE nom LIKE '%e%'
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.

?>
<h1>Affichez tous les utilisateurs dont le prénom est John, Sarah</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE prenom IN ('John', 'Sarah')
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

/* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.

?>
<h1>Affichez tous les utilisateurs dont l'id est compris entre 2 et 4</h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user WHERE id BETWEEN 2 AND 4
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}
?>
</body>
</html>