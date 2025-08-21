<?php
// products.php

// Simuler une "base de données" avec un tableau PHP
$products = [
  ["id" => 1, "name" => "Ordinateur portable", "price" => 800],
  ["id" => 2, "name" => "Téléphone", "price" => 500],
  ["id" => 3, "name" => "Tablette", "price" => 300],
];

// Envoyer les données au format JSON
header('Content-Type: application/json');
echo json_encode($products);
