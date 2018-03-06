<?php

require_once __DIR__ . "/../include/swoole.inc";
require_once __DIR__ . "/../include/api/swoole_http_client/simple_https_client.php";

$sm = new ServerManager(__DIR__ . "/../include/api/swoole_http_server/simple_https_server.php");
$sm->listen(HTTP_SERVER_HOST);
$closeServer = $sm->run();

testHttpsGet(HTTP_SERVER_HOST, $sm->port, $_SERVER, function() use($closeServer) {
    echo "SUCCESS";$closeServer();
});

suicide(1000, SIGKILL, $closeServer);
?>
