<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlbumPhotosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlbumPhotosTable Test Case
 */
class AlbumPhotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlbumPhotosTable
     */
    public $AlbumPhotos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.album_photos',
        'app.albums',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AlbumPhotos') ? [] : ['className' => 'App\Model\Table\AlbumPhotosTable'];
        $this->AlbumPhotos = TableRegistry::get('AlbumPhotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AlbumPhotos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
