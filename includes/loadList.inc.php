<?php

// Check if the 'loadListItems' parameter is set in the URL
if(isset($_GET['loadListItems'])){
    // Call the fetchListItems function to retrieve the list items
    $result = fetchListItems();
    // Generate HTML rows for the list items
    $component = generateHtmlRowsForListItems($result);
    // Convert the HTML component to JSON format and output it
    echo json_encode($component);
}

// Function to fetch the list items from the database
function fetchListItems(){
    try{
        // Include the database connection configuration file
        include("../config/myconnection.inc.php"); 
        // SQL query to select item information from the 'items' table
        $sql = "SELECT item_id, item_name, item_brand, item_price, item_remark  FROM items ";
        // Execute the SQL query
        $stmt = $db->query($sql);
        // Fetch all the rows as an associative array
        $result = $stmt->fetchAll();
        // If there are rows returned
        if($stmt->rowCount()  > 0){
            // Return the success status and the data
            return array("status"=>"success","data"=>$result);
        }
        // If no rows are returned, return the failed status and a message
        return array("status"=>"failed","data"=>"No Data");
    }catch(Exception $e){
        // If an exception occurs, return the failed status and the error message
        return array("status"=>"failed","data"=>$e->getMessage());
    }
}

// Function to generate HTML rows for the list items
function generateHtmlRowsForListItems($result){
    // Check if the fetchListItems function returned a failed status
    if($result['status'] == "failed"){
        // Return a single HTML row with a message indicating no data
        return "<tr><td colspan='5' class='text-center'>".$result['data']."</td></tr>";
    }
    // Initialize an empty string to store the HTML rows
    $str = "";
    // Loop through each row of the data
    foreach($result['data'] as $row){
        // Generate an HTML row with the item information
        $str .= "<tr>
                    <td>".$row['item_id']."</td>
                    <td>".$row['item_name']."</td>
                    <td>".$row['item_brand']."</td>
                    <td>".number_format($row['item_price'])."</td>
                    <td>".$row['item_remark']."</td>
                </tr>";
    }
    // Return the generated HTML rows
    return $str;
}
