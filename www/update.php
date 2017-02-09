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

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <?php foreach ($results[0] as $key => $value) { ?>
                <th><?php echo $key; ?></th>
            <?php } ?>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $result) { ?>
        <tr>
            <form action="scripts/update_script.php" method="post">
            <?php foreach ($result as $key => $value) { ?>
            <?php $input_type = 'text'; ?>
            <?php if ($key === $date_field) { $input_type = 'date'; $value = date('Y-m-d', strtotime($value)); } ?>
            <th><input type="<?php echo $input_type; ?>" name="<?php echo $key; ?>" value="<?php echo $value; ?>"/></th>
            <?php } ?>
            <th><input type="submit" name="update" value="Update" class="btn btn-success"></th>
            </form>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php 
	mssql_close($conn);
?>
</body>
</html>