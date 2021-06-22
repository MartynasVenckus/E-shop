<?php 

function showShoe()
 {
    $sql = "SELECT * FROM `preke` WHERE preke.fk_lytisid = 1 LIMIT 5";
        $result = $conn->query($sql);
        $user =  $result->fetch_array();

        return $user;
 }