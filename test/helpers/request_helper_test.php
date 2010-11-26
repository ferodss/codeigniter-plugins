<?php
// Fake CodeIgniter basepath =)
define('BASEPATH', true);

require_once 'PHPUnit/Framework/Assert/Functions.php';
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
        assertTrue(is_get());

        $_SERVER['REQUEST_METHOD'] = 'POST';
        assertFalse(is_get());
    }

    public function testIsPost()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        assertTrue(is_post());

        $_SERVER['REQUEST_METHOD'] = 'GET';
        assertFalse(is_post());
    }

    public function testIsAjax()
    {
        assertFalse(is_ajax());

        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
        assertTrue(is_ajax());
    }

    public function testIsGetAndAjax()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['HTTP_X_REQUESTED_WITH'] = null;

        assertFalse(is_get());
        assertFalse(is_ajax());

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        assertTrue( is_get() && is_ajax() );
    }

    public function testIsPostAndAjax()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['HTTP_X_REQUESTED_WITH'] = null;

        assertFalse(is_post());
        assertFalse(is_ajax());

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        assertTrue( is_post() && is_ajax() );
    }

}
