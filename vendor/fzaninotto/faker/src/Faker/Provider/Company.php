<<<<<<< HEAD
<?php

namespace Faker\Provider;

class Company extends \Faker\Provider\Base
{
    protected static $formats = array(
        '{{lastName}} {{companySuffix}}',
    );

    protected static $companySuffix = array('Ltd');

    /**
     * @example 'Acme Ltd'
     */
    public function company()
    {
        $format = static::randomElement(static::$formats);

        return $this->generator->parse($format);
    }

    /**
     * @example 'Ltd'
     */
    public static function companySuffix()
    {
        return static::randomElement(static::$companySuffix);
    }
}
=======
<?php

namespace Faker\Provider;

class Company extends Base
{
    protected static $formats = array(
        '{{lastName}} {{companySuffix}}',
    );

    protected static $companySuffix = array('Ltd');

    protected static $jobTitleFormat = array(
        '{{word}}',
    );

    /**
     * @example 'Acme Ltd'
     */
    public function company()
    {
        $format = static::randomElement(static::$formats);

        return $this->generator->parse($format);
    }

    /**
     * @example 'Ltd'
     */
    public static function companySuffix()
    {
        return static::randomElement(static::$companySuffix);
    }

    /**
     * @example 'Job'
     */
    public function jobTitle()
    {
        $format = static::randomElement(static::$jobTitleFormat);

        return $this->generator->parse($format);
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
