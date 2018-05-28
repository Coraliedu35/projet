<?php
    session_start(); // on démarre la session
    $_SESSION['v']=$_GET['v'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Gestion des absences : authentification</title>
    </head>
    <body>
        <header> Département R&T FI1A </header>
        <h1>Gestion des absences</h1>
        <h2>Merci de bien vouloir renrer vos identifiants afin de valider votre présence</h2>
         <!--formulaire qui envoie les information vers le script d'authentification : login et mdp-->
        <form method="post" action="ecriture.php">
            <fieldset>
            <input type="text" name="login" placeholder="N° SESAME"/> <br/> 
            <input type="password" name="mdp" placeholder="Mot de passe" /> <br/>
            <label for="remember">Se souvenir de moi</label> <input type="checkbox" name="remember" id="remember" />  <br/>
            <br/>
            <input type="submit" value="Valider" />    
            </fieldset>   
        </form> 
        
        <!-- intégration "se connecter via facebook" 
        <script type="text/javascript"> 
            function fblogout() 
                {FB.logout(function () { window.location.reload(); }); } 
            window.fbAsyncInit = function() 
            { FB.init({ appId : '<?php echo $facebook->getAppId(); ?>', session : <?php echo json_encode($session); ?>, status : true, cookie : true, xfbml : true }); FB.Event.subscribe('auth.login', function() { window.location.reload(); }); }; (function() { var e = document.createElement('script'); e.src = document.location.protocol + '//connect.facebook.net/fr_FR/all.js'; e.async = true; document.getElementById('fb-root').appendChild(e); }()); 
            //your fb login 
        function function fblogin() { FB.login(function(response) { //... }, {perms:'read_stream,publish_stream,offline_access'}); redir(); } 
        </script> -->
    </body>
</html>