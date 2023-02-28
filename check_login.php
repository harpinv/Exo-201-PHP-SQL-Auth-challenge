<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $server = 'localhost';
    $user = 'root';
    $pwd = '';
    $db = 'liste_randonnée';

    try {
        $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pwd);

        $identifients = $connect->prepare("SELECT username, password from user");

        $etat = $identifients->execute();

        if($etat) {
            foreach ($identifients->fetchAll() as $user) {
                $username = $user['username'];
                $password = $user['password'];
                if ($username == $_POST['username'] && $password == $_POST['password']) {

                    $timeOfSession = time() + (60 * 60 * 24);
                    session_start();

                    setcookie(session_name(), session_id(), $timeOfSession);

                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];

                    header ('location: bienvenue.php');
                }
                else {
                    echo "identifient ou mots de passe incorrect";
                }
            }
        }
        else {
            echo "une erreur est survenue en récupérant les données de la table";
        }


    } catch (PDOException $exception) {
        echo "Erreur de connexion: " . $exception->getMessage();
    }
}
