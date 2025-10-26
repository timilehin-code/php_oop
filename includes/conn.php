<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception("The .env file does not exist at: $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments (lines starting with #)
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parse key-value pairs
        if (preg_match('/^\s*([\w.-]+)\s*=\s*(.*)?\s*$/', $line, $matches)) {
            $key = $matches[1];
            $value = $matches[2] ?? '';
            // Remove surrounding quotes if present
            $value = trim($value, '"\'');
            $_ENV[$key] = $value;
        }
    }
}
try {
    $dbh = new Dbh();
    $conn =  $dbh->getConn();
} catch (PDOException $th) {
    echo $th->getMessage();
}
