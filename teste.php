<?php
echo '<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        padding: 20px;
    }
    pre {
        background-color: #eaeaea;
        padding: 10px;
        border-radius: 5px;
    }
    .computer {
        font-weight: bold;
        color: #0056b3;
    }
</style>';

$host = '192.168.100.33';
$hostname = gethostbyaddr($host);
echo '<div class="computer">Hostname: ' . htmlspecialchars($hostname) . '</div>';
echo "Hostname: $hostname\n";
$pingresult = shell_exec("ping -c 10 " . escapeshellarg($host));
echo "<pre>$pingresult</pre>";

echo 'OK';


?>