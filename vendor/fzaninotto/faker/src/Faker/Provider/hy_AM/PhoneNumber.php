<<<<<<< HEAD
<?php

namespace Faker\Provider\hy_AM;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = array(
        '093 ######',
        '093 ##-##-##',
        '(093) ######',
        '(093) ##-##-##',
        '094 ######',
        '094 ##-##-##',
        '(094) ######',
        '(094) ##-##-##',
        '095 ######',
        '095 ##-##-##',
        '(095) ######',
        '(095) ##-##-##',
        '096 ######',
        '096 ##-##-##',
        '(096) ######',
        '(096) ##-##-##',
        '099 ######',
        '099 ##-##-##',
        '(099) ######',
        '(099) ##-##-##',
        '077 ######',
        '077 ##-##-##',
        '(077) ######',
        '(077) ##-##-##',
        '055 ######',
        '055 ##-##-##',
        '(055) ######',
        '(055) ##-##-##',
    );
}
=======
<?php

namespace Faker\Provider\hy_AM;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{

    protected static $codes = array(91, 96, 99, 43, 77, 93, 94, 98, 97, 77, 55, 95, 41, 49);

    protected static $numberFormats = array(
        '######',
        '##-##-##',
        '###-###',
    );

    protected static $formats = array(
        '0{{code}} {{numberFormat}}',
        '(0{{code}}) {{numberFormat}}',
        '+374{{code}} {{numberFormat}}',
        '+374 {{code}} {{numberFormat}}',
    );

    public function phoneNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$formats)));
    }

    public function code()
    {
        return static::randomElement(static::$codes);
    }

    /**
     * @return mixed
     */
    public function numberFormat()
    {
        return static::randomElement(static::$numberFormats);
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
