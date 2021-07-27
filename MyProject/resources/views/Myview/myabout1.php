<!-- <form action="{{ url('about') }}" method="POST">
{{ csrf_field() }}
    <input type="text" name="HoTen">
    <input type="submit">
</form> -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo</title>
	<link rel="stylesheet" href=""><!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Level</th>
				<th>Function</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $key => $value) {
				# code...
			?>
			<tr>
				<td><?php echo $value['id'] ?></td>
				<td><?php echo $value['useName'] ?></td>
				<td><?php echo $value['passWord'] ?></td>
				<td><a class="btn btn-warning btn-sm">Click Here </a></td>
			</tr>
			<?php 
			} ?>
		</tbody>
	</table>

</body>
</html>