<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
    // Sanitize the input to prevent SQL injection
    $id = $conn->real_escape_string($_GET['id']);
    
    // Build and execute the query
    $qry = $conn->query("SELECT * FROM task_list WHERE id = $id");

    // Check if the query was successful and if any rows were returned
    if ($qry && $qry->num_rows > 0) {
        // Fetch the row as an associative array
        $row = $qry->fetch_assoc();

        // Assign individual variables
        $task = $row['task'] ?? ''; // Use null coalescing operator to provide a default value if the key doesn't exist
        $status = $row['status'] ?? '';
        $description = $row['description'] ?? '';
        $member = $row['member'] ?? '';

        // Output the data
        ?>
        <div class="container-fluid">
            <dl>
                <dt><b class="border-bottom border-primary">Task</b></dt>
                <dd><?php echo ucwords($task) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Status</b></dt>
                <dd>
                    <?php 
                    if($status == 1){
                        echo "<span class='badge badge-secondary'>Pending</span>";
                    } elseif($status == 2){
                        echo "<span class='badge badge-primary'>On-Progress</span>";
                    } elseif($status == 3){
                        echo "<span class='badge badge-success'>Done</span>";
                    }
                    ?>
                </dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Description</b></dt>
                <dd><?php echo html_entity_decode($description) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Member</b></dt>
                <dd><?php echo $member ?></dd>
            </dl>
        </div>
        <?php
    } else {
        // Handle case when no row is found for the provided ID
        echo "No task found for the given ID.";
    }
} else {
    // Handle case when no ID is provided in the URL
    echo "No task ID provided.";
}
?>


