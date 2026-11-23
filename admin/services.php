<?php
require_once '../config/db.php';
requireAdmin();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($name !== '') {
        $stmt = $pdo->prepare(
            "INSERT INTO services (name, description) VALUES (?, ?)"
        );

        $stmt->execute([$name, $description]);

        $message = "Service added successfully!";
    }
}

if (isset($_GET['delete'])) {

    $id = (int) $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: services.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM services ORDER BY id DESC");
$services = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Services</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #222;
        }

        .form-box,
        .table-box {
            background: white;
            padding: 25px;
            margin-top: 20px;
            border-radius: 10px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            background: #222;
            color: white;
            padding: 12px 20px;
            border: 0;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .delete {
            color: red;
            text-decoration: none;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Manage Services</h1>

    <?php if ($message): ?>
        <div class="success">
            <?= e($message) ?>
        </div>
    <?php endif; ?>

    <div class="form-box">

        <h2>Add New Service</h2>

        <form method="POST">

            <label>Service Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter service name"
                required
            >

            <label>Description</label>

            <textarea
                name="description"
                rows="5"
                placeholder="Enter service description"
            ></textarea>

            <button type="submit">
                Add Service
            </button>

        </form>

    </div>

    <div class="table-box">

        <h2>All Services</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            <?php foreach ($services as $service): ?>

                <tr>

                    <td>
                        <?= e($service['id']) ?>
                    </td>

                    <td>
                        <?= e($service['name']) ?>
                    </td>

                    <td>
                        <?= e($service['description']) ?>
                    </td>

                    <td>
                        <a
                            class="delete"
                            href="services.php?delete=<?= e($service['id']) ?>"
                            onclick="return confirm('Delete this service?')"
                        >
                            Delete
                        </a>
                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </div>

</div>

</body>
</html>