<<<<<<< HEAD:vendor/fzaninotto/faker/test/Faker/Provider/be_BE/PaymentTest.php
<?php

namespace Faker\Test\Provider\be_BE;

use Faker\Generator;
use Faker\Provider\be_BE\Payment;

class PaymentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Generator
     */
    private $faker;

    public function setUp()
    {
        $faker = new Generator();
        $faker->addProvider(new Payment($faker));
        $this->faker = $faker;
    }

    public function testVatIsValid()
    {
        $vat = $this->faker->vat();
        $unspacedVat = $this->faker->vat(false);
        $this->assertRegExp('/^(BE 0\d{9})$/', $vat);
        $this->assertRegExp('/^(BE0\d{9})$/', $unspacedVat);
    }
}
=======
<?php

namespace Faker\Test\Provider\fr_BE;

use Faker\Generator;
use Faker\Provider\fr_BE\Payment;

class PaymentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    public function setUp()
    {
        $faker = new Generator();
        $faker->addProvider(new Payment($faker));
        $this->faker = $faker;
    }

    public function testVatIsValid()
    {
        $vat = $this->faker->vat();
        $unspacedVat = $this->faker->vat(false);
        $this->assertRegExp('/^(BE 0\d{9})$/', $vat);
        $this->assertRegExp('/^(BE0\d{9})$/', $unspacedVat);
    }
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535:vendor/fzaninotto/faker/test/Faker/Provider/fr_BE/PaymentTest.php
