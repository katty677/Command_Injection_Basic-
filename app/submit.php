<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ip'])) {
    $ip = ($_GET['ip']);
    $output = shell_exec("ping -c 4 " .($ip));
    
} else  {
    $error = "Invalid request method.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ping Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        pre {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
            font-size: 13px;
            max-height: 400px;
            overflow-y: auto;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: transform 0.2s;
        }
        a:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($error)): ?>
            <div class="error"><strong>❌ Error:</strong> <?php echo htmlspecialchars($error); ?></div>
        <?php elseif (isset($output)): ?>
            <div class="success"><strong>✅ Ping Results for <?php echo htmlspecialchars($ip); ?>:</strong></div>
            <pre><?php echo ($output); ?></pre>
        <?php else: ?>
            <div class="error"><strong>❌ No IP address provided.</strong></div>
        <?php endif; ?>
        <a href="vuln.html">← Back to Ping Utility</a>
    </div>
</body>
</html>