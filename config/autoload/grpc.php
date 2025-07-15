<?php

return [
    'enable' => true,
    'options' => [
        'grpc.keepalive_time_ms' => 30000,
        'grpc.keepalive_timeout_ms' => 5000,
        'grpc.keepalive_permit_without_calls' => true,
        'grpc.http2.max_pings_without_data' => 0,
        'grpc.http2.min_time_between_pings_ms' => 10000,
        'grpc.http2.min_ping_interval_without_data_ms' => 300000,
    ],
];
