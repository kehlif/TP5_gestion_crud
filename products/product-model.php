<?php

$db = connectDB("localhost", "gestion_stock_crud", "root", "papounetsql");


function createProduct() {
  global $db;

  $sql = "INSERT INTO produits (nom, prix, description, image)
    VALUES (:nom, :prix, :description, :image)";

  $statement = $db->prepare($sql);
  $statement->bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
  $statement->bindParam(":prix", $_POST["prix"], PDO::PARAM_STR);
  $statement->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
  $statement->bindParam(":image", $_POST["image"], PDO::PARAM_INT);
  $res = $statement->execute();
  $msg_crud = ($res === true) ? "insertion ok" : "soucis à l'insertion";
  header("Location: index.php");
}

function getProducts() {
  global $db;
  $sql = "SELECT * FROM produits";
  $exec = $db->query($sql);
  return $exec->fetchAll(PDO::FETCH_OBJ);
}

function getProduct($id){
  global $db;
  $sql = "SELECT * FROM produits WHERE id = :id";
  $statement = $db->prepare($sql);
  $statement->bindParam(":id", $id, PDO::PARAM_INT);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_OBJ);
}

function updateProducts(){
   global $db;

   $sql = "UPDATE produits SET nom = :nom, prix = :prix, description = :description WHERE id =:id";
   $statement = $db->prepare($sql);
   $statement->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
   $statement->bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
   $statement->bindParam(":prix", $_POST["prix"], PDO::PARAM_INT);
   $statement->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
   $res2 = $statement->execute();
 }


// function deleteProduct(){
//   global $db;
//
//   foreach ($_POST["delete_product_ids"] as $id) {
//   $statement = $db->prepare($sql);
//   $statement->bindParam(":id", $id, PDO::PARAM_INT);
//   }
// }
