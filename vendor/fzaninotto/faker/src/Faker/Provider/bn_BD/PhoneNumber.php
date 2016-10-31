<<<<<<< HEAD
<?php

namespace Faker\Provider\bn_BD;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    public static function phoneNumber()
    {
        $number = "+880";
        $number .= static::randomNumber(7);

        return Utils::getBanglaNumber($number);
    }
}
=======
<?php

namespace Faker\Provider\bn_BD;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    public function phoneNumber()
    {
        $number = "+880";
        $number .= static::randomNumber(7);

        return Utils::getBanglaNumber($number);
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
