<?php
namespace Engine\Core\Plugin;

use Admin\Model\Plugin\PluginRepository;
use Engine\DI\DI;

/**
 * Class Plugin
 * @package Engine\Core\Plugin
 */
class Plugin
{
    /** @var DI */
    protected $di;

    /** @var Connection */
    protected $db;

    /** @var Load */
    protected $load;

    /** @var Model */
    protected $model;

    /** * Service constructor. * @param DI $di */
    public function __construct(DI $di)
    {
        $this->di    = $di;
        $this->db    = $this->di->get('db');
        $this->load  = $this->di->get('load');
        $this->model = $this->load->model('Plugin', false, 'Admin');
    }


    /** @param $directory */
    public function install($directory)
    {
        $this->load->model('Plugin');

        /** @var PluginRepository $pluginModel */
        $pluginModel = $this->getModel('plugin');

        if (!$pluginModel->isInstallPlugin($directory)) {
            $pluginModel->addPlugin($directory);
        }
    }

    public function activate($id, $active)
    {
        $this->load->model('Plugin');

        /** @var PluginRepository $pluginModel */
        $pluginModel = $this->getModel('plugin');
        $pluginModel->activatePlugin($id, $active);
    }

    /** * @return object */
    public function getActivePlugins()
    {
        $this->load->model('Plugin');

        /** @var PluginRepository $pluginModel */
        $pluginModel = $this->getModel('plugin');

        return $pluginModel->getActivePlugins();
    }

    // interceptor methods next

    /**
     * @param $name
     * @return object
     */
    public function getModel($name)
    {
        $this->load->model(ucfirst($name), false, 'Admin');

        $model = $this->di->get('model');

        return $model->{lcfirst($name)};
    }
}