<?php


namespace app\tests;

use app\models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
    * @dataProvider providerProductCreation
    */
    public function testProductCreation($name, $price, $description)
    {
        $product = new Product($name, $price, $description);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
    }
    public function providerProductCreation()
    {
        return array (
            array ('Ботинки', 100, ''),
            array ('Ласты', 30, 'Резиновые')
        );
    }

    /**
    * @dataProvider providerProductCreationError
    */
    public function testProductCreationError($name, $price, $description)
    {
        $this->expectException(\TypeError::class);
        $product = new Product($name, $price, $description);
    }
    public function providerProductCreationError()
    {
        return array (
            array (123, '', 'Ботинки'),
            array ('', '', 23.12)
        );
    }
}
