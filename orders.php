<html>
<head>
    <title>Best product ever</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link href="css/style.css" rel="stylesheet" />
    <?php require 'process_orders.php'; ?>
</head>
<body>
    <div class="container">
    <?php include ('includes/navigation.php'); ?>
        <div class="main list">
            <?php getOrders(); ?>
        </div>
    </div>
</body>
</html>