<?php

function display_image($id){
    include "connection.php";
    try{
        $query = 'SELECT img_src
                    FROM recipe
                    WHERE recipe_id = :id';
        
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }catch(Exception $e){
        echo "Unable to retrieve image";
        exit;
    }
    return $statement->fetch(PDO::FETCH_ASSOC);    
}

function display_ingredients($id){
    include "connection.php";
    
    try{
    $query = 'SELECT ingredient
    			FROM recipe_ingredients
    			WHERE recipe_id = :id';

    $statement = $db->prepare($query);
    $statement->bindParam(':id', $id,PDO::PARAM_INT);
    $statement->execute();
    }catch(Exception $e){
        echo "Unable to retrieve ingredients";
        exit;
    
    }

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>;