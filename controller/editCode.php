<?php
    if(isset($_POST)){
        if($_POST["submit"] == "Apply changes")
        include 'connection/connection.php';
        include 'insertValuestoDB.php';
        $sql = "SELECT * FROM pastes WHERE paste_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param("s", $_POST["fileName"]);
        $stmt -> execute();
        $pasteName =  null;
        $pasteId = null;
        $pass = null;
        $created_at = null;
        $expiration_date = null;
        $stmt -> bind_result($pasteId, $pasteName, $pass, $created_at, $expiration_date);
        $stmt -> fetch();
        $pasteName = str_replace(".php", "", $pasteName);
        $filename = $pasteName."_modified_at_".date("d-m-Y_H:i:s").".php";
        $aux = $filename;
        if(!file_exists($filename)) {
            $file = tmpfile();
        }
        $templateFile = fopen("template.html", "a+");
        $templateContent = '';

        while (!feof($templateFile))
            $templateContent = $templateContent . fgets($templateFile);

        $templateContent = $templateContent."<div class='textarea-container'><pre><code id='cod'>";
        $filename = '../Pastes/'.$filename;
        $file = fopen($filename, "a+");
        $text = $_POST["codeArea"];
        $text = str_replace("<", '&lt;', $text);
        $text = str_replace(">", '&gt;', $text);
        $text = $text."</code></pre>";
        $text = $text."<form method='post' action='../controller/editCode.php'>";
        $text = $text."<textarea name='codeArea' id='edit' class='textarea' style='display: none'>".$_POST["codeArea"]."</textarea>";
        $text = $text."Edit<input type='checkbox' id='Checkbox'  onclick='mySwitch()'>";
        $text = $text."<input type='hidden' name='fileName' value=\"<?php echo basename(__FILE__)?>\"/>";
        $text = $text."<input type='submit' class='submit' id='submit' name='submit' value='Apply changes' style='display: none'/></form></div>";
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        include 'connection/connection.php';

        $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date) values(?, ?, ?, ?);";
        if($stmt = $conn->prepare($sql)){
            echo $pass;
            $stmt->bind_param("isss", $pasteId, $aux, $pass, $expiration_date);
            $stmt->execute();
        }

        header("Location: ../Pastes/" . $filename);
    }