<?php include "initialize.php"; ?>
<!DOCTYPE html>
<html lang="en" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User | LAB 07</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.24/dist/full.min.css" rel="stylesheet">
</head>
<body class="bg-base-200 min-h-screen">

    <main class="max-w-5xl mx-auto px-6 py-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">Create New User</h1>

                <?php if (isset($_SESSION["alert_message"])): ?>
                    <div class="alert alert-error">
                        <span><?php echo htmlspecialchars($_SESSION["alert_message"], ENT_QUOTES, "UTF-8"); ?></span>
                    </div>
                    <?php unset($_SESSION["alert_message"]); ?>
                <?php endif; ?>

                <form method="POST" action="user_add_data.php" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label" for="firstname">
                            <span class="label-text">Firstname</span>
                        </label>
                        <input type="text" id="firstname" name="firstname" class="input input-bordered w-full">
                    </div>

                    <div class="form-control">
                        <label class="label" for="lastname">
                            <span class="label-text">Lastname</span>
                        </label>
                        <input type="text" id="lastname" name="lastname" class="input input-bordered w-full">
                    </div>

                    <div class="form-control md:col-span-2">
                        <label class="label" for="username">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" id="username" name="username" class="input input-bordered w-full">
                    </div>

                    <div class="form-control">
                        <label class="label" for="password">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" id="password" name="password" class="input input-bordered w-full">
                    </div>

                    <div class="form-control">
                        <label class="label" for="confirm_password">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <input type="password" id="confirm_password" name="confirm_password" class="input input-bordered w-full">
                    </div>

                    <div class="md:col-span-2">
                        <button type="submit" name="register" class="btn btn-primary w-full">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
</html>
