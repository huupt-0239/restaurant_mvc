<?php
require_once(__DIR__ . '/../../controllers/RestaurantController.php');
if ($restaurant) {
    $id = $restaurant['id'];
    $name = $restaurant['name'];
    $description = $restaurant['description'];
    $image_url = $restaurant['img_url'];
    $user_id = $restaurant['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Detail</title>
</head>

<body>
    <h1>Restaurant Detail</h1>
    <div>
        <h2><?php echo $name; ?></h2>
        <p><?php echo $description; ?></p>
        <img src="<?php echo $image_url; ?>" alt="Restaurant Image">
        <p>User ID: <?php echo $user_id; ?></p>
    </div>
</body>

</html>
<?php
}else {
    echo "Restaurant not found";
}
?>