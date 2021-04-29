<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            input {
                width: 500px;
                margin: 5px auto;
            }
            .textcenter {
              
                margin-left:150px;
            }
            form {
                margin-left:100px;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
</head>
<body>
    <h1 class="textcenter">Inscrivez-vous</h1>
    <h2 class="textcenter">Entrez les données demandées</h2>
    <form name="inscription" method="post" action="inscription.php">
            
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="pwd" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="date" name="date_de_naissance" class="form-control" placeholder="Date de naissance" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="ville" class="form-control" placeholder="Ville" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="pays" class="form-control" placeholder="Pays" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="Valider" class="textcenter">Inscription</button>
            </div> 
    </form> 
</body>
</html>

<?php
    $servername='localhost';
    $dbname = 'projetnginx';
    $username = 'root';
    $password = '';
    
    if (isset($_POST['Valider'])){
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_de_naissance = $_POST['date_de_naissance'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];

        /*Connexion avec la BD*/
        try{
            $con = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo 'connexion etablit avec succes';
        }
        catch(£PDOException $e){
            echo 'Erreur :'.$e->getMessage();
        }

        //Insertion des données

        $req = "INSERT INTO `utilisateurs` (`login`,`pwd`,`nom`,`prenom`,`date_de_naissance`,`ville`,`pays`) VALUES(:login, :pwd, :nom, :prenom, :date_de_naissance, :ville, :pays)";
        $res = $con->prepare($req);
        $exec = $res->execute(array(
            ':login'=>$login,
            ':pwd'=>$pwd,
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':date_de_naissance'=>$date_de_naissance,
            ':ville'=>$ville,
            ':pays'=>$pays
        ));
        // On verifie si les données ont bien été ajouté
        if($exec){
            echo 'Données ajouté avec succes!';
        }
        else{
            echo 'Echec d\'inserion';
        }

    }
?>


