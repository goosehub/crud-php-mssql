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
        </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $result) { ?>
        <tr>
            <?php foreach ($result as $value) { ?>
            <th><?php echo $value; ?></th>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>