<<<<<<< HEAD
<?php
/**
 * This view is used by console/controllers/MigrateController.php
 * The following variables are available in this view:
 */
/* @var $className string the new migration class name */

echo "<?php\n";
?>

use yii\db\Schema;
use yii\db\Migration;

class <?= $className ?> extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "<?= $className ?> cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
=======
<?php
/**
 * This view is used by console/controllers/MigrateController.php
 * The following variables are available in this view:
 */
/* @var $className string the new migration class name */

echo "<?php\n";
?>

use yii\db\Migration;

class <?= $className ?> extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "<?= $className ?> cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
