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
 * Code Igniter template Class
 *
 * This class enables you to use view templates
 *
 * Usage:
 *
 * You have two ways to load library.
 *
 * First is to load in controller's constructor function: 
 *   $this->load->library('layout'); OR
 *   $this->load->library('layout', 'template_name');
 *
 * The second is by autoload the library editing config/autoload.php
 *   $autoload['libraries'] = array('layout');
 *
 *
 * After load Layout library, you can load your's views like this:
 *   $this->layout->view('your_view', $data);
 * 
 *
 * In your template, <?php echo $content; ?> to display your view.
 *
 *
 * @package    CodeIgniter
 * @subpackage Libraries
 * @category   Layout
 * @author     Felipe Djinn <felipe@felipedjinn.com.br>
 * @varsion    0.2
 * @link       https://github.com/felipedjinn/codeigniter-plugins
 */
class Layout
{
    /**
     * @var    Load
     * @access private
     */
    private $load;

    /**
     * @var    string Template name
     * @access private
     */
    private $template;

    /**
     * @var    array   Data in template
     * @access private
     */
    private $data = array();

    /**
     * Constructor
     *
     * Load Loader class in to $load property
     * Set a template name
     *
     * @param string $template [OPTIONAL] Template name. Default "template"
     */
    public function __construct($template = "template")
    {
        $this->load = load_class('Loader');
        $this->set_template($template);

        log_message('debug', "template Class Initialized");
    }

    /**
     * Sets a template name
     *
     * @param  string $template Template name
     * @return void
     */
    public function set_template($template)
    {
        $this->template = $template;
    }

    /**
     * Set's variable in template
     * Return a fluent interface
     *
     * @param  string $key
     * @param  mixed  $value
     * @return template
     */
    public function set($key, $value)
    {
        $this->data[(string) $key] = $value;
        
        return $this;
    }

    /**
     * View
     *
     * Display your view in the template block
     * Return the html result if the third parameter has is true
     *
     * @param  string      $view
     * @param  array       $data
     * @param  boolean     $return
     * @return void|string
     */
    public function view($view, $data = array(), $return = false)
    {
        $this->set('content', $this->load->view($view, $data, true));

        if( $return == true )
        {
            return $this->load->view($this->template, $this->data, true);
        }

        $this->load->view($this->template, $this->data, false);
    }
   
}
