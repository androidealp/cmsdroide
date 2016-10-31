<<<<<<< HEAD
<?php

namespace Faker\Provider\en_GB;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = array(
        '+44(0)##########',
        '+44(0)#### ######',
        '+44(0)#########',
        '+44(0)#### #####',
        '0##########',
        '0#########',
        '0#### ######',
        '0#### #####',
        '(0####) ######',
        '(0####) #####',
    );

    /**
     * An array of en_GB mobile (cell) phone number formats
     * @var array
     */
    protected static $mobileFormats = array(
      // Local
      '07#########',
      '07### ######',
      '07### ### ###'
    );

    /**
     * Return a en_GB mobile phone number
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }
}
=======
<?php

namespace Faker\Provider\en_GB;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = array(
        '+44(0)##########',
        '+44(0)#### ######',
        '+44(0)#########',
        '+44(0)#### #####',
        '0##########',
        '0#########',
        '0#### ######',
        '0#### #####',
        '0### ### ####',
        '0### #######',
        '(0####) ######',
        '(0####) #####',
        '(0###) ### ####',
        '(0###) #######',
    );

    /**
     * An array of en_GB mobile (cell) phone number formats
     * @var array
     */
    protected static $mobileFormats = array(
      // Local
      '07#########',
      '07### ######',
      '07### ### ###'
    );

    /**
     * Return a en_GB mobile phone number
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
