﻿<?php
if(getLoginsend() == 0) {
        echo'<form class="form-signin" method="post">
        <h2 class="form-signin-heading">Bitte einloggen</h2>
        <input type="hidden" size="24" maxlength="50" name="id" value="0">
        <input type="hidden" size="24" maxlength="50" name="log_in" value="1">
        <input type="hidden" size="24" maxlength="50" name="login" value="true">
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="login" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Passwort</label>
        <input type="password" name="pw" id="inputPassword" class="form-control" placeholder="Passwort" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
        </form>';
    }

    if(getLoginsend() == 1) {
        echo'Erfolgreich angemeldet! Klicke <a href="?id=0">hier</a> um fortzufahren.';
    }
    if(getLoginsend() == 2) {
        echo'Falscher Benutzername und/oder falsches Passwort! Klicke <a href="?page=Login">hier</a> um\'s erneut zu versuchen.';
    }
    if(getLoginsend() == 3) {
        echo'Erfolgreich abgemeldet! Klicke <a href="?page=Home">hier</a> um fortzufahren.';
    }
?>