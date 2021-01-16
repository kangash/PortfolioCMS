<?php 

namespace Engine\Core\Common;

use Engine\DI\DI;
use Catalog\Model\SettingMirror;
use \Engine\Core\Config\Config;

class Parameters
{
    protected $di;
    //global propertes
    public $activeTheme;
    
    public function __construct(DI $di)
    {
        $this->di = $di;

        if (ENV !== 'Admin') {
            $this->activeTheme();
        }
    }

    public function activeTheme()
    {
        $this->setting   = new SettingMirror($this->di);
        $theme = SettingMirror::get('active_theme')->value;

        if ($theme == '') {
            $theme = Config::item('defaultTheme');
        }

        $this->activeTheme = $theme;
    }



}