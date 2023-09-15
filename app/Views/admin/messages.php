<?php include('../app/Views/admin/base/header.php');
?>

<br/>messagaes

<table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Subject</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data['messages'] as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['message'] . '</td>';
                echo '<td>' . $row['subject'] . '</td>';
                echo '<td>' . $row['created_at'] . '</td>';
                echo '<td>' . $row['updated_at'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>