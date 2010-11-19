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
 * Script helper
 *
 * @package    CodeIgniter
 * @subpackage Helpers
 * @category   Helpers
 * @author     Felipe Rodrigues <felipe@felipedjinn.com.br>
 * @link       https://github.com/felipedjinn/codeigniter-plugins
 */

// ------------------------------------------------------------------------

/**
 * Script tag
 *
 * Generates an HTML script tag to JavaScript file
 *
 * Usage:
 * <code>
 * echo script_tag('jquery');
 * // <script type="text/javascript" src="http://www.example.com/javascripts/jquery.js"></script>
 *
 * echo script_tag('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js');
 * // <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 *
 * echo script_tag(array('jquery', 'application'));
 * //<script type="text/javascript" src="http://www.example.com/javascripts/jquery.js"></script>
 * //<script type="text/javascript" src="http://www.example.com/javascripts/application.js"></script>
 * </code>
 *
 * @param  string|array File names
 * @param  string       JavaScript path
 * @return string|null  Formated html
 */
if ( ! function_exists('script_tag'))
{
    function script_tag($scripts = null, $javascript_path = 'javascripts')
    {
        if ( $scripts == null ) return null;

        $CI = get_instance();

        // transform to array
        if ( ! is_array($scripts) ) $scripts = (array) $scripts;

        // generate output
        $output = '';
        foreach ( $scripts as $script )
        {
            if ( strpos($script, '://') === false )
            {
                $script = $CI->config->slash_item('base_url')
                        . rtrim($javascript_path,'/') . '/' . $script . '.js';
            }

            $output .= sprintf("\n<script type=\"text/javascript\" src=\"%s\"></script>", $script);
        }

        unset($CI);
        return $output;
    }
}
