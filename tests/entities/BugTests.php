<?php
use JoeFallon\KissTest\UnitTest;

class BugTests extends UnitTest
{
    public function test_initialization()
    {
        $bug = new Bug();
        $this->assertEqual($bug->getId(), 0);
        $this->assertEqual($bug->getStatus(), '');
        $this->assertEqual($bug->getDescription(), '');
        $this->assertEqual($bug->getCreated(), '');
        $this->assertEqual($bug->getUpdated(), '');
    }

    public function test_create_and_retrieve()
    {
        global $entityManager;

        $bug = new Bug();
        $bug->setDescription('test description');
        $bug->setStatus('test status');

        $entityManager->persist($bug);
        $entityManager->flush();

        $id = $bug->getId();
        $this->assertFirstGreaterThanSecond($id, 0);

        /** @var Bug $bugOut */
        $bugOut = $entityManager->find('Bug', $id);
        $this->assertEqual($bugOut->getId(), $id);
        $this->assertEqual($bugOut->getDescription(), 'test description');
        $this->assertEqual($bugOut->getStatus(), 'test status');
        $this->assertEqual(strlen($bugOut->getCreated()), 19, 'created');
        $this->assertEqual(strlen($bugOut->getUpdated()), 19, 'created');
    }
}
