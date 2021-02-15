<?php

# ==================== BEGIN OF THE CONFIGURATION ==================== #

# The username and password to authenticate to the server.
# Replace "change-me" for each variable ("USERNAME" and "PASSWORD")
define ("USERNAME", "change-me");
define ("PASSWORD", "change-me");

# If you want put your ShareX server in maintenance mode.
# Replace the value of "MAINTENANCE" variable.
# "true" => Enable maintenance mode
# "false" => Disable maintenance mode
# DO NOT PUT QUOTATION MARKS AROUND VALUES !
define("MAINTENANCE", false);

# ==================== END OF THE CONFIGURATION ==================== #

function response ($http_code, $status, $url, $deletion_url) {

    switch ($http_code) {

        case 200:
            header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
            break;
        case 400:
            header("{$_SERVER['SERVER_PROTOCOL']} 400 Bad Request");
            break;

        case 401:
            header("{$_SERVER['SERVER_PROTOCOL']} 401 Unauthorized");
            break;

        case 403:
            header("{$_SERVER['SERVER_PROTOCOL']} 403 Forbidden");
            break;

        case 500:
            header("{$_SERVER['SERVER_PROTOCOL']} 500 Internal Server Error");
            break;

        case 503:
            header("{$_SERVER['SERVER_PROTOCOL']} 503 Service Unavailable");
            break;

    }

    $response["http_code"] = $http_code;

    if ($status != "Success") {

        $response["status"] = $status;

    }

    if ($url != null) {

        $response["url"] = $url;

    }

    if ($deletion_url != null) {

        $response["deletion_url"] = $deletion_url;

    }

    echo json_encode ($response);

    return true;

}

if (MAINTENANCE) {

    return response (503, "Server under maintenance", null, null);

}

if (!isset($_GET["username"]) AND !isset($_POST["username"])) {

    return response (401, "Missing authentication information", null, null);

}

if (!isset($_GET["password"]) AND !isset($_POST["password"])) {

    return response (401, "Missing authentication information", null, null);

}

$username= htmlspecialchars($_GET["username"]) ?: htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_GET["password"]) ?: htmlspecialchars($_POST["password"]);

if ($username != USERNAME OR $password != PASSWORD) {

    return response (403, "Invalid credential", null, null);

}

if (!file_exists("files")) {

    return response (500, "Incomplete ShareX server", null, null);

}

if (!isset($_FILES["file"])) {

    return response (400, "File not existing", null, null);

}

$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
$generateFileName = str_shuffle($characters);
$generateFileName = substr($generateFileName, 0, 7);
$fileExtension = strtolower(substr(strrchr($_FILES["file"]['name'], '.'), 1));

if (file_exists("files/{$generateFileName}.{$fileExtension}")) {

    return response (500, "One file with this name already exists", null, null);

}

if (!move_uploaded_file($_FILES["file"]["tmp_name"], "files/{$generateFileName}.{$fileExtension}")) {

    return response (500, "Error when uploading", null, null);

}

response (200, "Success", "https://{$_SERVER['SERVER_NAME']}/{$generateFileName}.{$fileExtension}", null);
