<?php
include('./cart.php');
session_start();

/* TODO

Make Simple Cart App: 

GET / display items in the shop, cart icon with number of items in it
GET /?action=show_cart display cart with items in it, total price, remove item from cart btn
POST /?action=add_to_cart get item from $_POST array, save it to SESSION array
GET /?action=remove_from_cart?item_name=XXX remove item from SESSION array

Classes to create: Item, CartItem, Cart 

*/
$cart = new Cart();
//$cart->deleteCartFromSession();
$action = isset($_GET['action']) ? $_GET['action'] : '';



?>
<h1>Simple Cart App </h1>
<?php if(strlen($action) <2 ){
?>

<h2> Add New Item to Shopping Cart</h2> 
<form action="/?action=add_to_cart" method="POST">
    <label>Product Name: </label>
    <input type="text" name="item_name" />
    <label>Price:</label>
    <input type="text" name="item_price" />    
    <button type="submit">Save</button>
</form>
<?php 
}
?>
<h3><a href="/?action=show_cart">My cart (<?php echo count($cart->getCartItems()) ?>)</a></h3>
<h3><a href="/">Home</a></h3>
<?php
switch($action){
    case 'add_to_cart': 
    {
        $itemName = $_POST['item_name'];
        $itemPrice = $_POST['item_price'];
        $cart->addItem($itemName, $itemPrice);
        //$cartItems = $cart->getCartItems();
        //print_r($cartItems);
        echo "Cart item added, show the <a href='/?action=show_cart'>cart</a>";
        break;
    }
    case 'show_cart': {
        $totalPrice = $cart->getTotalPrice();
        $cartItems = $cart->getCartItems();
        foreach($cartItems as $cartItem){
            echo "<h3>Item: {$cartItem->name}</h3>";
            echo "<span>Price: {$cartItem->getPrice()}</span>";
            echo "<h3>Quantity: {$cartItem->quantity}</h3>";  
            echo "<p><a href='/?action=remove_from_cart&item_name="
            .urlencode($cartItem->name)."'>Remove from Cart</a></p>";
            echo "<hr>"; 

        }
        echo "<h2>Total Price: {$totalPrice}</h2>";
        break;
    }
    case 'remove_from_cart': {
        $itemName = urldecode($_GET['item_name']);
        $cart->removeItemFromCart($itemName);
        echo "<h3>Item {$itemName} removed from cart!</h3>";
        break;
    }
    default: {
    }
}
