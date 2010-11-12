<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * My_Output class
 *
 * Extends CI_Output library
 *
 * @author Felipe Djinn <felipe@felipedjinn.com.br>
 */
class MY_Output extends CI_Output
{
    public function __construct()
    {
        parent::CI_Output();

        $this->set_charset();
    }

    /**
     * Set charset
     *
     * Set header charset using 'charset' in config file
     *
     * @return MY_Output
     */
    public function set_charset()
    {
        $this->set_header('Content-Type: text/html; charset=' . config_item('charset'));

        return $this;
    }
}
