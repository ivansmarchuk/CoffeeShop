<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?=$this->getMeta(); ?>
</head>
<body>
<h1>Default Template</h1>

<?= $contect; ?>
<?= $name ?>

<<?php
use \RedBeanPHP\R as R;

$logs = R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();

debug( $logs->grep( 'SELECT' ) );
?>
</body>
</html>