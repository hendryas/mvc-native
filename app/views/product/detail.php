<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $data['title']; ?></title>
</head>

<body>
  <h1><?php echo $data['title']; ?></h1>
  <p>Detail produk dengan ID: <?php echo $data['product']['id']; ?></p>
  <p>Nama produk: <?php echo $data['product']['name']; ?></p>
</body>

</html>