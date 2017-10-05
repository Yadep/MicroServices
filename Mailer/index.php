<?php

// Create a connection
$cnn = new AMQPConnection('localhost', 'root', '');
$cnn->connect();

// Declare a new exchange
$ex = new AMQPExchange($cnn);
$ex->declare('exchange1', AMQP_EX_TYPE_FANOUT);

// Create a new queue
$q = new AMQPQueue($cnn);
$q->declare('queue1');

// Bind it on the exchange to routing.key
$ex->bind('queue1', 'routing.key');

// Publish a message to the exchange with a routing key
$ex->publish('message', 'routing.key');

// Read from the queue
$msg = $q->consume();

?>