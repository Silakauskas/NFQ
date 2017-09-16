<html>
<head>
    <title>Best product ever</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery DataTables pluginas -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <?php require "db.php"; ?>
</head>
<body>
    <div class="container">
        <?php include ("includes/navigation.php"); ?>
        <div class="main">
            <div class="row">
                <div class="col-md-5">
                    <label><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input class="inbox" id="search-email" onkeyup="filter()" placeholder="Search by email">
                </div>
                <div class="col-md-7">
                    <label>Sort by</label>
                    <select id="sort-by" class="inbox">
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="email">E-mail</option>
                        <option value="color">Color</option>
                        <option value="quantity">Quantity</option>
                        <option value="message">Mesage</option>
                    </select>
                    <label>Asc. </label>
                    <input type="radio" value="ASC" name="order" checked="checked">
                    <label>Desc. </label>
                    <input type="radio" value="DESC" name="order">
                </div>
            </div>
            <table class="show-orders table" id="oTable">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Message</th>
                <th>Color</th>
                <th>Qty.</th>
            </thead>
            <tbody>
                <?php  
                foreach (getOrders() as $order) { ?>
                    <tr class="order">
                        <td><?php echo $order["id"] ?></td>
                        <td><?php echo $order["name"] ?></td>
                        <td class="email"><?php echo $order["email"] ?></td>
                        <td><?php echo $order["message"] ?></td>
                        <td><?php echo $order["color"] ?></td>
                        <td><?php echo $order["quantity"] ?></td>
                    </tr>
                <?php }; ?>
                </tbody>
            </table>

        </div>
    </div>
    <script>
   /* $(document).ready(function(){
        $('#oTable').DataTable();
    });*/

    jQuery(function(){
        $("#sort-by").change(function(){
            var html = "";
            var sort = $(this).val();
            var how = $("input[name=order]:checked").val(); /* Daugiau pasidomet situ */
            $.ajax({
                //async: false,
                url: "db.php",
                type: "post",
                dataType: "json",
                data: {
                    'sort-by' : sort,
                    'sort-how' : how,
                    'action' : 'sort',
                },
                success: function(resp) {
                    //console.log(resp);
                    resp.forEach(function(data){
                        //console.log(data);
                        html += `<tr class="order">`;
                        html += `<td>${data.id}</td>`;
                        html += `<td>${data.name}</td>`;
                        html += `<td class="email">${data.email}</td>`;
                        html += `<td>${data.message}</td>`;
                        html += `<td>${data.color}</td>`;
                        html += `<td>${data.quantity}</td>`;
                        html += "</tr>";
                    });                    
                    $("tbody").html(html)
                    filter();
                }
            });
            //console.log(sort+" "+how);
        })
    });

    function filter() {
        $("tr.order").each(function(){
            var email = $(this).find("td.email")[0].innerText;
            var string = $("#search-email").val().replace(/\s/g, "");
            if (email.search(string) !== -1){
                $(this).css("display", "");
            } else {
                $(this).css("display", "none");
            }
        })
    }
    </script>
</body>
</html>

