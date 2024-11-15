<?php
require_once 'dbconn.php';

$action = $_GET['action'];

$resp = [];
if($action=='view'){
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Age</th>
            <th class="text-center">Documents</th>
            <th class="text-center">Type</th>
            <th class="text-center">Services</th>
            <th class="text-center">Comments</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT `id`, `name`, `email`, `age`, `document`, `feedback_type`, `services`, `comments` FROM `survey`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']) ?></td>
                    <td><?php echo htmlspecialchars($row['email']) ?></td>
                    <td><?php echo htmlspecialchars($row['age']) ?></td>
                    <td><?php echo htmlspecialchars($row['document']) ?></td>
                    <td><?php echo htmlspecialchars($row['feedback_type']) ?></td>
                    <td><?php echo htmlspecialchars($row['services']) ?></td>
                    <td><?php echo htmlspecialchars($row['comments']) ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning text-white" onclick="edit('<?php echo $row['id']?>')">
                            <span class="fas fa-pencil"></span>
                        </button>

                        <button class="btn btn-sm btn-danger text-white" onclick="fnDelete('<?php echo $row['id'] ?>')">
                            <span class="fas fa-trash"></span>
                        </button>
                    </td>
                </tr>
        <?php
                }
            }else{
        ?>
                <tr>
                    <td colspan="8">No Records.</td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <?php
}

if($action=='edit'){
    $id = $_POST['param'];

    $sql = "SELECT * FROM `survey` WHERE `id`='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $resp=$row;
    echo json_encode($resp, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit();

}

if($action=='insert'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $feedback_type = $_POST['feedback_type'];
    $services_used = implode(', ', $_POST['services_used'] ?? []);
    $comments = $_POST['comments'];

    $document = '';
    if (!empty($_FILES['document']['name'])) {
        $document = basename($_FILES['document']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $document;
        move_uploaded_file($_FILES['document']['tmp_name'], $target_file);
    }

    $sql = "INSERT INTO survey (`name`, `email`, `age`, `document`, `feedback_type`, `services`, `comments`)
            VALUES ('$name', '$email', '$age', '$document', '$feedback_type', '$services_used', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if($action=='update'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $feedback_type = $_POST['feedback_type'];
    $services_used = implode(', ', $_POST['services_used'] ?? []);
    $comments = $_POST['comments'];

    $document = '';
    if (!empty($_FILES['document']['name'])) {
        $document = basename($_FILES['document']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $document;
        move_uploaded_file($_FILES['document']['tmp_name'], $target_file);
    }

    $sql = "UPDATE survey SET `name`='$name', `email`='$email', `age`='$age', `feedback_type`='$feedback_type', `services`='$services_used', `comments`='$comments',
            `document`= IF('$document' != '' AND '$document' IS NOT NULL, '$document', `document`)
            WHERE `id`='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback updated successfully!";
    } else {
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if($action=='delete'){
    $id = $_POST['param'];

    $sql = "DELETE FROM survey WHERE `id`='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback deleted successfully!";
    } else {
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}