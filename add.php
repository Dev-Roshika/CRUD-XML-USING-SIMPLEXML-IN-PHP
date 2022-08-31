
<form method = "POST" style = "border: 2px solid red;width: 500px;padding: 10px;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);">
        Id: &emsp;&nbsp;&nbsp;<input type="text" name = "id"><br><br>
        Name: <input type="text" name = "name"><br><br>
        Price: &nbsp;<input type="text" name = "price"><br><br>
        &emsp; <input type="submit" name ="save" value="Submit" style="color:white;background-color:blue">
</form>

    <?php 
        if(isset($_POST["save"])){
            $products = simplexml_load_file('products.xml');
            $product = $products-> addChild('product');
            $product->addAttribute('id',$_POST['id']);
            $product->addChild('name',$_POST['name']);
            $product->addChild('price',$_POST['price']);
            file_put_contents('products.xml',$products->asXML());
            header("location:index.php");
        }
    ?>