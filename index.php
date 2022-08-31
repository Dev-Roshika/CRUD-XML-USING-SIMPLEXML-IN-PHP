<div class="main" style = "border: 2px solid red;width: 500px;padding: 10px;position:relative;left:50%;top:50%;transform:translate(-50%,-50%);">
&emsp; <a href="add.php"><input type="submit" name ="save" value="Create Product" style="color:white;outline:none;background-color:blue"></a>

<?php
$products = simplexml_load_file("products.xml");
echo "<br><br>";
echo "<span style = 'padding:20px;'>no of products: ".count($products)."<span><br>";
?>
<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
</style>

<h1>Product Details</h1>
<table>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach($products->product as $product){?>
    <tr>
        <td><?php echo $product['id']?></td>
        <td><?php echo $product->name?></td>
        <td><?php echo $product->price?></td>
        <td><a href="edit.php?id=<?php echo $product['id']?>">Edit</a>&nbsp;<a href="index.php?action=del&amp;id=<?php echo $product['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<?php
if(isset($_GET["action"]) and $_GET["action"]=="del"){
    $id = $_GET['id'];
    $index = 0;
    $i=0;
    foreach($products->product as $product){
        if($product['id']==$id){
            $index = $i;
            break;
        }
        $i++;
    }
    unset($products->product[$index]);
    file_put_contents('products.xml',$products->asXML());
    header("location:index.php");
}
?>
</div>