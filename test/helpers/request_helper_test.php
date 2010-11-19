<?php
// Fake CodeIgniter basepath =)
define('BASEPATH', true);

require realpath('../../helpers/request_helper.php');

class RequestHelperTest extends PHPUnit_Framework_TestCase
{
    /**
     * Original $_SERVER
     * @var array
     */
    protected $_origServer;

    protected function setUp()
    {
        $this->_origServer = $_SERVER;
    }

    public function tearDown()
    {
        $_SERVER = $this->_origServer;
    }

    //-------------------------------------------------------------------------

    public function testIsGet()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $this->assertTrue(is_get());

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->assertFalse(is_get());
    }

    public function testIsPost()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->assertTrue(is_post());

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $this->assertFalse(is_post());
    }

    public function testIsAjax()
    {
        $this->assertFalse(is_ajax());

        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
        $this->assertTrue(is_ajax());
    }
}
