<<<<<<< HEAD:vendor/fzaninotto/faker/src/Faker/Provider/no_NO/Company.php
<?php

namespace Faker\Provider\no_NO;

class Company extends \Faker\Provider\Company
{
    protected static $formats = array(
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{firstName}} {{lastName}} {{companySuffix}}',
        '{{lastName}} & {{lastName}} {{companySuffix}}',
        '{{lastName}} & {{lastName}}',
        '{{lastName}} og {{lastName}}',
        '{{lastName}} og {{lastName}} {{companySuffix}}'
    );

    protected static $companySuffix = array('AS', 'DA', 'NUF');
}
=======
<?php

namespace Faker\Provider\nb_NO;

class Company extends \Faker\Provider\Company
{
    protected static $formats = array(
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{firstName}} {{lastName}} {{companySuffix}}',
        '{{lastName}} & {{lastName}} {{companySuffix}}',
        '{{lastName}} & {{lastName}}',
        '{{lastName}} og {{lastName}}',
        '{{lastName}} og {{lastName}} {{companySuffix}}'
    );

    protected static $companySuffix = array('AS', 'DA', 'NUF');
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535:vendor/fzaninotto/faker/src/Faker/Provider/nb_NO/Company.php
