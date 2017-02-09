<!doctype html>
<head>
    <title>PHP MSSQL CRUD</title>
    <?php require_once "templates/resources.php" ?>
	<?php require_once "scripts/db_funcs.php" ?>
</head>

<body>
<?php 
require_once 'templates/header.php';
require_once 'scripts/table.php';
require_once 'scripts/read_script.php';
?>

<form action="scripts/insert_script.php" method="post">
	<?php foreach ($results[0] as $key => $value) { ?>
	<?php if ($key === $id_field) { continue; } ?>
	<?php $input_type = 'text'; ?>
	<?php $value = ''; ?>
	<?php if ($key === $date_field) { $input_type = 'date'; $value = date('Y-m-d', time()); } ?>
		<div class="controls-row">
		<input type="<?php echo $input_type; ?>" name="<?php echo $key; ?>" value="<?php echo $value; ?>" placeholder="<?php echo $key; ?>">
		</div>
	<?php } ?>
	<div class="controls-row">
		<input type="submit" name="create" class="btn btn-warning" value="Create">
	</div>
</form>

</body>
</html>