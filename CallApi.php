<?php

function eventsUser(string $name)
    {
        $url = "https://api.github.com/users/$name/events?per_page=10";
        $petition = curl_init($url);

        // Hace que la respuesta se devuelva como string, no se imprime directamente
        curl_setopt($petition, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($petition, CURLOPT_HTTPHEADER, [
            'User-Agent: MiAppPHP' // Header obligatorio para github
        ]);
        $response = curl_exec($petition);
        $httpCode = curl_getinfo($petition, CURLINFO_HTTP_CODE);
        curl_close($petition);

        // Decodifica la respuesta JSON
        $events = json_decode($response, true);

        // Manejo de error de usuario no encontrado o respuesta inválida
        if ($response === false || $httpCode === 404) {
            echo "User Not Found or error when querying api.\n";
            return;
        }

        echo "Output:\n";
        foreach ($events as $event) {
            if ($event["type"] === "PushEvent"){
                echo "- ";
                foreach($event["payload"]["commits"] as $commit) { $message = $commit["message"]; }
                echo $event["actor"]["login"] ." ". $message . " push in " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "WatchEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " looked at " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "CreateEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " created " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "PullRequestEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " manipulated a pull request " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "IssuesEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " manipulated a issue " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "PullRequestEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " manipulated a message of issue " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "DeleteEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " deleted " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "ForkEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " make a fork of " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "ReleaseEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " manipulated a release " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            
            } else if ($event["type"] === "MemberEvent"){
                echo "- ";
                echo $event["actor"]["login"] . " added a member to " . $event["repo"]["name"] . " at " . $event["created_at"] . "\n";
            }
        }
    }

    global $argc, $argv;

    if ($argc < 2)
    {
        echo "Use: \n";
        echo "php CallApi.php github-activity <username>\n";
    }

    $comando = $argv[1];

    switch($comando)
    {
        case 'github-activity':
            if(!isset($argv[2])){
                echo "❌ The username is required.\n";
                exit(1);
            }
            eventsUser($argv[2]);
            break;
    }
?>