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
 * Request helper
 *
 * @package    CodeIgniter
 * @subpackage Helpers
 * @category   Helpers
 * @author     Felipe Rodrigues <felipe@felipedjinn.com.br>
 * @link       https://github.com/felipedjinn/codeigniter-plugins
 */

// ------------------------------------------------------------------------

/**
 * Was the request made by GET?
 *
 * @return boolean
 */
if ( ! function_exists('is_get') )
{
    function is_get()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
}

// ------------------------------------------------------------------------

/**
 * Was the request made by POST?
 *
 * @return boolean
 */
if ( ! function_exists('is_post') )
{
    function is_post()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
}

// ------------------------------------------------------------------------

/**
 * Is the request a Javascript XMLHttpRequest?
 *
 * @return boolean
 */
if ( ! function_exists('is_ajax') )
{
    function is_ajax()
    {
        return (boolean) (isset($_SERVER['HTTP_X_REQUESTED_WITH']))
                      && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
    }
}

// ------------------------------------------------------------------------
