<?php
namespace Swiss;

/**
 * A generic App class
 */
class App
{
    protected $data = array();

    public function __construct()
    {
        //lets set our social media links by default
        $this->setOptions(array(
            'opt_social_media',
            'opt_google_analytics'
        ));
    }

    /**
     * [setOptions description]
     * @param array $options [description]
     */
    public function setOptions($options = array())
    {
        if (empty($options) || !is_array($options)) {
            return false;
        }

        $links = \Swiss\Acf\getOption($options);

        if (!empty($links)) {
            foreach ($links as $k => $v) {
                $this->data[$k] = $v;
            }
        }

        return true;
    }

    /**
     * [set description]
     * @param [type] $key   [description]
     * @param [type] $value [description]
     */
    public function set($key = null, $value = null, $array = 'data')
    {
        if (!isset($this->{$array}))
            return false;

        return $this->{$array}[$key] = $value;
    }

    /**
     * [get description]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function get($key = null, $array = 'data')
    {
        if (!isset($this->{$array}[$key]))
            return null;

        return $this->{$array}[$key];
    }
}
