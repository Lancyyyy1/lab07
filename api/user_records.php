<?php include "initialize.php"; ?>
<?php
$users = [];
$result = $connection->query("SELECT id, firstname, lastname, username FROM users ORDER BY id ASC");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$alert_message = isset($_SESSION["alert_message"]) ? $_SESSION["alert_message"] : "";
unset($_SESSION["alert_message"]);
?>
<!DOCTYPE html>
<html lang="en" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Records | LAB 07</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.24/dist/full.min.css" rel="stylesheet">
</head>
<body class="bg-base-200 min-h-screen">

    <main class="max-w-5xl mx-auto px-6 py-8">
        <?php if (!empty($alert_message)): ?>
            <div class="alert alert-success mb-6">
                <span><?php echo htmlspecialchars($alert_message, ENT_QUOTES, "UTF-8"); ?></span>
            </div>
        <?php endif; ?>

        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <h1 class="card-title">User's Record List</h1>
                    <a href="user_add.php" class="btn btn-primary btn-sm">Add User</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user["id"], ENT_QUOTES, "UTF-8"); ?></td>
                                    <td><?php echo htmlspecialchars($user["firstname"], ENT_QUOTES, "UTF-8"); ?></td>
                                    <td><?php echo htmlspecialchars($user["lastname"], ENT_QUOTES, "UTF-8"); ?></td>
                                    <td><?php echo htmlspecialchars($user["username"], ENT_QUOTES, "UTF-8"); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
