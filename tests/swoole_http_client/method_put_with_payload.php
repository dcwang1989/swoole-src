<?php

require_once __DIR__ . "/../include/swoole.inc";
require_once __DIR__ . "/../include/api/swoole_http_client/simple_http_client.php";

$simple_http_server = __DIR__ . "/../include/api/swoole_http_server/simple_http_server.php";
$closeServer = start_server($simple_http_server, HTTP_SERVER_HOST, $port = get_one_free_port());

testMethod(HTTP_SERVER_HOST, $port, "PATCH", "put", function() use($closeServer) {
    echo "SUCCESS";$closeServer();
});

suicide(1000, SIGTERM, $closeServer);
?>
