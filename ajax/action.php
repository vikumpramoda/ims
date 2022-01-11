<?php

//action.php

include '../db_connector.php';

if(isset($_POST["action"]))
{
    $programming_languages = implode(",", $_POST["programming_languages"]);
    $data = array(
        ':name'      => $_POST["name"],
        ':programming_languages' => $programming_languages
    );
    $query = '';
    if($_POST["action"] == "insert")
    {
        $query = "INSERT INTO tbl_name (name, programming_languages) VALUES (:name, :programming_languages)";
    }

    $statement = $connect->prepare($query);
    $statement->execute($data);
}


?>