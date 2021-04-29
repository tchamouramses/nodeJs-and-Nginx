<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            .emetteur-form {
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
            .emetteur-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .emetteur-form h2 {
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
    <h1 class="textcenter">Transaction</h1>
    <h2 class="textcenter">Entrez les données demandées</h2>
    <form name="transaction" method="post" action="transaction.php">
            
            <div class="form-group">
                <input type="text" name="emetteur" class="form-control" placeholder="Emetteur" required="required" autocomplete="off">
            </div>
           
            <div class="form-group">
                <input type="text" name="recepteur" class="form-control" placeholder="Recepteur" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="number" name="montant" class="form-control" placeholder="Montant" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="reponse" class="form-control" placeholder="Reponse" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="devise" class="form-control" placeholder="Devise" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" name="question" class="form-control" placeholder="Question" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="Valider" class="textcenter">Valider</button>
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
        $emetteur = $_POST['emetteur'];
        $recepteur = $_POST['recepteur'];
        $montant = $_POST['montant'];
        $reponse = $_POST['reponse'];
        $devise = $_POST['devise'];
        $question = $_POST['question'];

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

        $req = "INSERT INTO `transactions` (`emetteur`,`recepteur`,`montant`,`reponse`,`devise`,`question`) VALUES(:emetteur, :recepteur, :montant, :reponse, :devise, :question)";
        $res = $con->prepare($req);
        $exec = $res->execute(array(
            ':emetteur'=>$emetteur,
            ':recepteur'=>$recepteur,
            ':montant'=>$montant,
            ':reponse'=>$reponse,
            ':devise'=>$devise,
            ':question'=>$question
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


