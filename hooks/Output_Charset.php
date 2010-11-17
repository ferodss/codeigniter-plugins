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
 * Output Charset Class
 *
 * This hook set a charset header using default charset in config file
 *
 * Usage:
 *
 * Check hooks are enabled in application/config/config.php file:
 *   $config['enable_hooks'] = TRUE;
 *
 * Define a new hook in application/config/hooks.php file:
 *   $hook['display_override'] = array(
 *       'class'    => 'Output_Charset',
 *       'function' => 'set_charset',
 *       'filename' => 'Output_Charset.php',
 *       'filepath' => 'hooks',
 *       'paramas'  => null
 *   );
 *
 * And be happy! =)
 *
 *
 * @package    CodeIgniter
 * @subpackage Hooks
 * @category   Output
 * @author     Felipe Djinn <felipe@felipedjinn.com.br>
 * @link       https://github.com/felipedjinn/codeigniter-plugins
 */
class Output_Charset
{
    /**
     * CI_Base instance
     *
     * @var    CI_Base
     * @access private
     */
    private $CI;

    /**
     * Class constructor
     *
     * Get a CI_Base instance
     */
    public function __construct()
    {
        $this->CI = get_instance();

        log_message('debug', 'Output_Charset hook initialized');
    }

    /**
     * Set charset
     *
     * Set charset header using 'charset' in config.php file
     *
     * @return Output_Charset
     */
    public function set_charset()
    {
        $this->CI->output->set_header('Content-Type: text/html; charset=' . config_item('charset'));

        return $this;
    }

    /**
     * Class destructor
     *
     * The destructor method will be called as soon as all references to a 
     * particular object are removed or when the object is explicitly 
     * destroyed or in any order in shutdown sequence.
     *
     * @return void
     */
    public function __destruct()
    {
        $this->CI->output->_display();
    }
}
// END Output_Charset Class

/* End of file Output_Charset.php */
/* Location: application/hooks/Output_Charset.php */

