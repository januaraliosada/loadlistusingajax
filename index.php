<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="packages/bootstrap-5.3/css/bootstrap.min.css">
    <script src="packages/jquery/jquery-3.7.0.min.js" defer></script>
    <script src="packages/bootstrap-5.3/js/bootstrap.bundle.js" defer></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="mt-4 mb-3">
                <h1 class="text-center">LOAD TABLE LIST WITHOUT RELOADING THE PAGE</h1>
            </div>
            <div class="table-responsive w-50">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>BRAND</th>
                        <th>PRICE</th>
                        <th>REMARK</th>
                    </thead>
                    <tbody id="item_table_body"></tbody>
                </table>
                <div>
                    <button class="btn btn-primary" onclick="loadListItems()">Load List Items</button> 
                    <button class="btn btn-primary" onclick="UnloadListItems()">Unload List Items</button> 
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function loadListItems(){
            // Get the HTML element that will contain the list items
            const item_table_body = document.getElementById("item_table_body");
            // Send an AJAX request to loadList.inc.php
            $.ajax({
                type: "GET",
                url: 'includes/loadList.inc.php',
                dataType: "json",
                data: {
                    loadListItems: 1
                },
                success: function (data) {
                    // On success, update the item_table_body with the received data
                    item_table_body.innerHTML = data;
                },
                error: function (data) {
                    // On error, log the data to the console
                    console.log(data);
                }
            });
        }

        function UnloadListItems(){
            // Get the HTML element that contains the list items
            const item_table_body = document.getElementById("item_table_body");
            // Clear the contents of item_table_body
            item_table_body.innerHTML = "";
        }

    </script>
</body>
</html>