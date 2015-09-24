<?php $data = (array)$data[0]; ?>
<!doctype html>
<html lang="en">
<head>
</head>
<body>
	<form action="update" method="post">
		<input type="text" value="<?php echo $data['email_id']; ?>" name="email" placeholder="email">
		<br>
		<input type="text" value="<?php echo $data['name']; ?>" name="name" placeholder="name">
		<br>
		<input type="text" value="<?php echo $data['price']; ?>" name="price" placeholder="price">
		<br>
		<input type="text" value="<?php echo $data['quantity']; ?>" name="quantity" placeholder="quantity">
		<br>
		<input type="hidden" value="<?php echo $id; ?>" name="id">
		<input type="submit" value="update">
	</form>
</body>
</html>
