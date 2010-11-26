<?php
// Fake CodeIgniter basepath =)
define('BASEPATH', true);

require_once 'PHPUnit/Framework/Assert/Functions.php';
require realpath('../../libraries/Request.php');

class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Request
     */
    protected $_request;

    /**
     * Original $_SERVER
     *
     * @var array
     */
    protected $_orig_server;

    public function setUp()
    {
        $this->_request = new Request();

        $this->_orig_server = $_SERVER;

        $_SERVER = array(
            'REQUEST_METHOD'        => null,
            'HTTP_X_REQUESTED_WITH' => null
        );
    }

    public function tearDown()
    {
        unset($this->_request);
        $_SERVER = $this->_orig_server;
    }

    //-------------------------------------------------------------------------

    public function testGetMethod()
    {
        assertFalse( $this->_request->get_method() == 'GET');

        $_SERVER['REQUEST_METHOD'] = 'GET';

        assertTrue( $this->_request->get_method() == 'GET');
    }

    public function testIsGet()
    {
        assertFalse( $this->_request->is_get() );

        $_SERVER['REQUEST_METHOD'] = 'GET';

        assertTrue( $this->_request->is_get() );
    }

    public function testIsPost()
    {
        assertFalse( $this->_request->is_post() );

        $_SERVER['REQUEST_METHOD'] = 'POST';

        assertTrue( $this->_request->is_post() );
    }

    public function testIsAjax()
    {
        assertFalse( $this->_request->is_ajax() );

        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
        assertTrue( $this->_request->is_ajax() );
    }

    public function testIsGetAndAjax()
    {
        assertFalse( $this->_request->is_get() );
        assertFalse( $this->_request->is_ajax() );

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        assertTrue( $this->_request->is_get() && $this->_request->is_ajax() );
    }

    public function testIsPostAndAjax()
    {
        assertFalse( $this->_request->is_post() );
        assertFalse( $this->_request->is_ajax() );

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        assertTrue( $this->_request->is_post() && $this->_request->is_ajax() );
    }
}
