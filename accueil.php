<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="projet_final.css" />
        <title>Gestion des absences : authentification</title>
    </head>
    <body>
        <header> Département R&T FI1A </header>
        <h1>Gestion des absences</h1>
         <!--formulaire qui envoie les information vers le script d'authentification : login et mdp-->
        <form method="post" action="connect.php">
        <p>
            <input type="text   " name="login" placeholder="N° SESAME"/> <br/> 
            <input type="password" name="mdp" placeholder="Mot de passe" /> <br/>
            <label for="remember">Se souvenir de moi</label> <input type="checkbox" name="remember" id="remember" />  <br/>
            Sélection du groupe :
            <select name="groupe"> 
                <option value="FI1AG1">FI1A Groupe 1</option>
                <option value="FI1AG2">FI2A Groupe 2</option>
            </select>
            <br/><br/>
            <input type="submit" value="Valider" /> 
       </p>      
        </form> 
    </body>
</html>
