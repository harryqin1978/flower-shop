<?php
namespace frontend\tests\unit\models;

use common\fixtures\Source as SourceFixture;
use common\models\Source;

class SourceTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => SourceFixture::className(),
                'dataFile' => codecept_data_dir() . 'source.php'
            ]
        ]);
    }

    public function testView()
    {
        $source = Source::findOne(1);
        expect($source->name)->equals('shop 1');
    }

    public function testFailureAdd()
    {
        $source = new Source();
        $source->name = 'added shop';
        $source->priority = 'aaaa';
        expect_not($source->save());
        expect_that($source->getErrors());
    }

    public function testSuccessAdd()
    {
        $source = new Source();
        $source->name = 'added shop';
        $source->priority = -1;
        $source->save();

        $source = Source::findOne($source->id);
        expect($source->name)->equals('added shop');
        expect($source->priority)->equals(0);
    }
}