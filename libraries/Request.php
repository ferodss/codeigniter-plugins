<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2010, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Request Class
 *
 * This class enables you to check the type of request was made
 *
 * Usage:
 *
 * Autoload this class editing config/autoload.php
 *  $autoload['autoload'] = array('request');
 *
 * In your controllers, you have a request property with a instance
 * for this class.
 *
 * Example:
 *
 * <code>
 * if ( $this->request->is_post() )
 * {
 *     // you logic here
 * }
 * </code>
 *
 * And be happy! =)
 *
 * @package    CodeIgniter
 * @subpackage Libraries
 * @category   Request
 * @author     Felipe Rodrigues <felipe@felipedjinn.com.br>
 * @version    1.0
 * @link       https://github.com/felipedjinn/codeigniter-plugins
 */
class Request
{
    /**
     * Return the method by which the request was made
     *
     * @return string
     */
    public function get_method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Was the request made by GET?
     *
     * @return boolean
     */
    public function is_get()
    {
        return $this->get_method() == 'GET';
    }

    /**
     * Was the request made by POST?
     *
     * @return boolean
     */
    public function is_post()
    {
        return $this->get_method() == 'POST';
    }

    /**
     * Is the request a Javascript XMLHttpRequest?
     *
     * @return boolean
     */
    public function is_ajax()
    {
        return  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

}
