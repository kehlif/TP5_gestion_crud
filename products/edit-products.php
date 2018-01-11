<?php
include_once "../crud.php";?>

<?php if (!isset($products) OR $products === false): ?>
<p>Aucun utilisateur ne correspond à votre recherche.</p>
<?php endif; ?>

<?php if(isset($products) AND  $products !== false): ?>

<form method="post" action="../index.php" class="create f-col">
  <input type="hidden" name="id" value="<?php echo $products->id ?>">
  <label for="lastname">Nom</label>
  <input id="lastname" name="nom" type="text" value="<?php echo $products->nom ?>" required>
  <label for="prix">Prix</label>
  <input id="prix" name="prix" type="number" value="<?php echo $products->prix ?>"
  class="input" min="16" max="140">
  <label for="description">description</label>
  <input id="email" name="description" type="text" class="input" value="<?php echo $products->description ?>">
  <div class="f-row">
    <input name="update_products" type="submit" value="edit product !" class="btn">
  </div>
</form>

<?php endif; ?>
