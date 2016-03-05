﻿<?php
$panelnames["Theme"] = "Design"; // set panel name
if(!isset($isinclude)) { $isinclude = true; } // if unset, set it to true

if($isinclude) { // if included don't run this code, if $isinclude is true -> run code
    if ($handle = opendir('includes/themes')) { // open theme folder and look for themes
        $themes = array(); // initiate array
        $themes[0] = "default"; // set default to [0]
        while (($entry = readdir($handle)) !== false) { // check if handle is dir or file
            if ($entry != "." && $entry != "..") { // exclude current and parent folder
                $themes[] = $entry; // set array entrys to folder entrys
            }
        }
        closedir($handle); // close handle
    }

    if (isset($_POST["action"]) && $_POST["action"] == "write") {
        $selectedtheme = mysqli_real_escape_string($mysqli_connect, $_POST["theme"]); // escape the $_POST
        $query = "UPDATE `config` SET `theme` = '" . $selectedtheme . "' WHERE `ID` = '1'"; // query
        $mysqli_connect->query($query);
        echo '<br />Design ge&auml;ndert. Klicke <a href="?id=0">hier</a> um fortzufahren.';
    } else {
        $sql = "SELECT theme FROM config"; // fetch current theme
        $currenttheme = mysqli_fetch_object($mysqli_connect->query($sql))->theme; // store it in $currenttheme
        echo'<form method="post" action="?id=0&ap=Theme">
          <input type="hidden" name="action" value="write">
          Design: <select name="theme">';
            foreach($themes as $theme) { // show all themes in theme folder
                ($theme == $currenttheme) ? $option = "\n<option selected value=\"".$theme."\">" : $option =  "\n<option value=\"".$theme."\">"; // pre select current theme
                echo $option.$theme."</option>"; // show options
            }
          echo'</select>
        <br /><br /><input type="submit" value="Absenden">
        </form>';
    }
}
?>