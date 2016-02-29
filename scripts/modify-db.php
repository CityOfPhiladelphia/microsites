#!/usr/bin/php

<?php

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: '';
$db_name = getenv('DB_NAME') ?: 'wp';
$domain = getenv('INSTANCE_HOSTNAME') ?: getenv('PUBLIC_HOSTNAME');

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

$mysqli->query("update wp_site set domain='" . $domain . "' where id=1");
$mysqli->query("update wp_blogs set domain='" . $domain . "' where site_id=1");
$mysqli->query("update wp_sitemeta set meta_value='https://" . $domain . "' where site_id=1 and meta_key='siteurl'");
$mysqli->query("update wp_options set option_value='https://" . $domain . "' where option_name='siteurl'");
$mysqli->query("update wp_options set option_value='https://" . $domain . "' where option_name='home'");
