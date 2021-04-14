<?php

?>
<div>

<h1>Welcome to Blog News</h1>
<h3>Please Create an Account</h3>

<form id="zeForm" action="process.php" method="POST">

<!-- SET IDENTIFICATION -->
<fieldset>
<legend>IDENTIFICATION</legend>

<!-- Champ utilisateur -->
<div>
<p>Utilisateur</p>
<p><input id="user" type="text" name="user" placeholder="Utilisateur SVP" /></p>
<p id="err-user" class="error"></p>
</div>

<!-- Champ mot de passe -->
<div>
<p>Mot de passe</p>
<p><input id="pass" type="password" name="pass"  /></p>
<p id="err-pass" class="error"></p>
</div>
<p><img id="bt-check" src="./medias/submit.jpg" width="120" /></p>
</fieldset>