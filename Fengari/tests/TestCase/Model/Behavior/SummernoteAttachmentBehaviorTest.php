<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\SummernoteAttachmentBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\SummernoteAttachmentBehavior Test Case
 */
class SummernoteAttachmentBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\SummernoteAttachmentBehavior
     */
    public $SummernoteAttachment;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->SummernoteAttachment = new SummernoteAttachmentBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SummernoteAttachment);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
