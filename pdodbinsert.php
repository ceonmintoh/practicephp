<?
// Insert the metadata of the order into the database
$preparedStatement = $db->prepare(
'INSERT INTO `orders` (`name`, `address`, `telephone`, `created_at`)
VALUES (:name, :address, :telephone, :created_at)'
);
$preparedStatement->execute([
'name' => $name,
'address' => $address,
'telephone' => $telephone,
'created_at' => time(),
]);
// Get the generated `order_id`
$orderId = $db->lastInsertId();
// Construct the query for inserting the products of the order
$insertProductsQuery = 'INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`)
VALUES';
$count = 0;
foreach ( $products as $productId => $quantity ) {
$insertProductsQuery .= ' (:order_id' . $count . ', :product_id' . $count . ', :quantity' .
$count . ')';
$insertProductsParams['order_id' . $count] = $orderId;
$insertProductsParams['product_id' . $count] = $productId;
$insertProductsParams['quantity' . $count] = $quantity;
++$count;
}
// Insert the products included in the order into the database
$preparedStatement = $db->prepare($insertProductsQuery);
$preparedStatement->execute($insertProductsParams);
?>