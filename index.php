<?php include_once "crud.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BizOnline Round 2</title>
    <base href="<?php echo $base_url ?>">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>BizOnline Round 2</h1>
    <h3>
        <span>Ajouter un nouveau Produit</span>
    </h3>
    <?php if (isset($msg_crud)) {
        echo "<p class=\"msg\">$msg_crud</p>";
    }?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formulaire">
        <input name="nom" type="text" placeholder="nom" required>
        <input name="prix" type="number" placeholder="prix" required>
        <textarea name="description" type="text" placeholder="description" col="10" row="10"></textarea>
        <input type="text" name="image" placeholder="image">
        <div class="f-row">
            <input name="create_product" type="submit" value="Create product !" class="btn">
        </div>
    </form>
    <hr>
    <h3 class="title">Liste des produits</h3>

    <?php if (isset($products) && !count($products)): ?>
        <p>Pas de produits insérer pour le moment...</p>
    <?php endif; ?>

    <?php if (isset($products) && count($products)): ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form">
            <table id="products" class="tabler products">
                <thead>
                    <tr>
                        <?php foreach ($products[0] as $prop => $val) {
                            echo "<td>$prop</td>";
                        } ?>
                        <td class="update"><span>update</span></td>
                        <td class="delete">
                            <input type="submit" name="delete_products"
                            value="delete" class="tabler-btn">
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $products) {
                        echo "<tr data-id-user=\"$products->id\">";
                        foreach ((array)$products as $prop => $val) {
                            $val = isset($val) ? $val : "N.R";
                            echo "<td>" . $val . "</td>";
                        }
                        echo "<td class=\"update\">
                        <a class=\"tabler-btn\" href=\"products/edit-products.php?id=$products->id\">edit</a>
                        </td>";
                        echo "<td class=\"delete\">
                        <input name=\"delete_product_ids[]\" type=\"checkbox\" value=\"$products->id\" />
                        </td>";
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
        </form>
    <?php endif; ?>
