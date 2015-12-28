<?php

use JoeFallon\KissTest\UnitTest;

class ProductTests extends UnitTest
{
    public function test_initialization()
    {
        $product = new Product();
        $this->assertEqual($product->getId(),      0);
        $this->assertEqual($product->getName(),    '');
        $this->assertEqual($product->getCreated(), '');
        $this->assertEqual($product->getUpdated(), '');
    }

    public function test_create_and_retrieve()
    {
        global $entityManager;

        $product = new Product();
        $product->setName('test product 1');
        $entityManager->persist($product);
        $entityManager->flush();

        $id = $product->getId();
        $this->assertFirstGreaterThanSecond($id, 0);

        /** @var Product $product */
        $product = $entityManager->find('Product', $id);
        $this->assertEqual($product->getId(),              $id);
        $this->assertEqual($product->getName(),            'test product 1');
        $this->assertEqual(strlen($product->getCreated()), 19, 'created');
        $this->assertEqual(strlen($product->getUpdated()), 19, 'updated');
    }

    public function test_updateTimestamps()
    {
        $product = new Product();
        $product->updateTimestamps();
        $this->assertEqual(strlen($product->getCreated()), 19, 'created');
        $this->assertEqual(strlen($product->getUpdated()), 19, 'updated');
    }
}
