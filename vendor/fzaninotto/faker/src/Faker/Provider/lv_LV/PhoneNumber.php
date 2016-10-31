<<<<<<< HEAD
<?php

namespace Faker\Provider\lv_LV;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = array(
        '##-###-###',
        '##-######',
        '########',
        '+371 #######',
    );
}
=======
<?php

namespace Faker\Provider\lv_LV;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * {@link} https://en.wikipedia.org/wiki/Telephone_numbers_in_Latvia
     **/
    protected static $formats = array(
        '########',
        '## ### ###',
        '+371 ########',
    );
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
