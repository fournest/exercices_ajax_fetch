<?php
// products.php

// Simuler une "base de données" avec un tableau PHP
// $products = [
//   ["id" => 1, "name" => "Ordinateur portable", "price" => 800],
//   ["id" => 2, "name" => "Téléphone", "price" => 500],
//   ["id" => 3, "name" => "Tablette", "price" => 300],
// ];

$host = 'localhost';
$dbname = 'mini-twitter'; 
$username = 'root'; 
$password = ''; 

try {
    // 2. Établir une connexion à la base de données via PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Définir le mode d'erreur pour les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Préparer et exécuter la requête SQL
    $sql = "SELECT name, firstName, nickName, photo FROM user"; 
    $stmt = $pdo->query($sql);

    // 4. Récupérer tous les résultats sous forme de tableau associatif
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Envoyer les données au format JSON
    header('Content-Type: application/json');
    echo json_encode($products);
} catch (PDOException $e) {
    // En cas d'erreur de connexion ou de requête
    http_response_code(500); // Définir le code de statut HTTP à 500 (Internal Server Error)
    echo json_encode(['error' => 'Erreur de base de données : ' . $e->getMessage()]);
}
