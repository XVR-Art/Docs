<?php

require_once './XvrArtClient.php';

$client = new XvrArtClient('<put your access key here>', '<put your access secret here>');

$rs = $client->call('customer/info', []);
print_r($rs);

$rs = $client->call('space/list', ['page' => 1, 'page_size' => 10]);
print_r($rs);

$rs = $client->call('space/toggleStatus', ['hub_id' => 'your space hub id get from space/list']);
print_r($rs);
