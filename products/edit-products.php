<?php
include_once "../crud.php";
?>

<?php if (!isset($products) OR $products === false): ?>
<p>Aucun utilisateur ne correspond à votre recherche.</p>
<?php endif; ?>

<?php if(isset($products) AND  $products !== false): ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Edit product</title>
  </head>
  <body>
    <h2>Edit Product</h2>
    <form method="post" action="../index.php" class="formulaire2">
      <input type="hidden" name="id" value="<?php echo $products->id ?>">
      <label for="nom">Nom</label>
      <input name="nom" type="text" value="<?php echo $products->nom ?>" required>
      <label for="prix">Prix</label>
      <input name="prix" type="number" value="<?php echo $products->prix ?>"
      class="input" min="1" max="140">
      <label for="description">Description</label>
      <input name="description" type="text" class="input" value="<?php echo $products->description ?>">
      <div class="f-row">
        <input name="update_products" type="submit" value="Edit product !" class="btn">
      </div>
    </form>
  </body>
</html>

<?php endif; ?>
