<<<<<<< HEAD
<?php

$autoloader = require_once dirname(__DIR__).'/vendor/autoload.php';
$autoloader->add('Swift_', __DIR__.'/unit');

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__DIR__).'/lib');

\Mockery::getConfiguration()->allowMockingNonExistentMethods(false);

if (is_file(__DIR__.'/acceptance.conf.php')) {
    require_once __DIR__.'/acceptance.conf.php';
}
if (is_file(__DIR__.'/smoke.conf.php')) {
    require_once __DIR__.'/smoke.conf.php';
}
require_once __DIR__.'/StreamCollector.php';
require_once __DIR__.'/IdenticalBinaryConstraint.php';
require_once __DIR__.'/SwiftMailerTestCase.php';
require_once __DIR__.'/SwiftMailerSmokeTestCase.php';
=======
<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

// Disable garbage collector to prevent segfaults
gc_disable();

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__DIR__).'/lib');

Mockery::getConfiguration()->allowMockingNonExistentMethods(true);

if (is_file(__DIR__.'/acceptance.conf.php')) {
    require_once __DIR__.'/acceptance.conf.php';
}
if (is_file(__DIR__.'/smoke.conf.php')) {
    require_once __DIR__.'/smoke.conf.php';
}
require_once __DIR__.'/StreamCollector.php';
require_once __DIR__.'/IdenticalBinaryConstraint.php';
require_once __DIR__.'/SwiftMailerTestCase.php';
require_once __DIR__.'/SwiftMailerSmokeTestCase.php';
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
