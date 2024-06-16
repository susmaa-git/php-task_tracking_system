<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $task_id = $_POST['task_id'];

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO user_tasks (user_id, task_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $task_id);
    if ($stmt->execute()) {
        echo "Task assigned successfully";
    } else {
        echo "Task not assigned: " . $stmt->error;
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!-- HTML Form for assigning tasks -->
<form method="POST" action="#" enctype="multipart/form-data">
    <label for="user_id">User ID:</label>
    <input type="number" id="user_id" name="user_id" required>
    <label for="task_id">Task ID:</label>
    <input type="number" id="task_id" name="task_id" required>
    <button type="submit">Assign Task</button>
</form>