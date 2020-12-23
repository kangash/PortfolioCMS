<?php 

namespace Engine\Core\Template;

use Engine\Core\Config\Config;


class Theme
{
    public $dirConfig;
    const MASK_TEMPLATE_FILE = 'content\\themes\\%s\\%s.php';
    const MASK_IMAGE_JPG     = 'catalog\\View\\Images\\%s.jpg';
    const MASK_IMAGE_PNG     = 'catalog\\View\\Images\\%s.png';
    const MASK_IMAGE_DIR     = 'catalog\\View\\Images\\';
    /**
     * Rules template name
     */
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    const URL_THEME_MASK ='%s/content/themes/%s';
    /**
     * Url current theme
     * @type string
     */
    protected static $url = '';

    /**
     * @var array
     */
    protected static $data = [];

    public $asset;
    public $publicData = [];
    public $theme;


    public function __construct()
    {
        $this->theme = $this;
        $this->asset = new Asset();
    }


    public static function getUrl()
    {
        $currentTheme = Config::item('defaultTheme', 'main');
        $baseUrl      = Config::item('baseUrl', 'main');

        return sprintf(self::URL_THEME_MASK,$baseUrl, $currentTheme);
    }

    public static function title()
    {
        $nameSite    = Setting::get('name_site')->value;
        $description = Setting::get('description')->value;


        echo $nameSite . ' | ' . $description;
    }

    /**
     * @param null $name
     */
    public static function header($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        self::loadComponent($file);
    }

    /**
     * @param string $name
     */
    public static function footer($name = '')
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        self::loadComponent($file);
    }

    /**
     * @param string $name
     */
    public static function sidebar($name = '')
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        self::loadComponent($file);
    }

    /**
     * @param string $name
     * @param array $data
     */
    public static function block($name = '', $data = [])
    {
        $name = (string) $name;

        if ($name !== '') {
            self::loadComponent($name, $data);
        }
    }

    /**
     * @param $name
     * @param $function
     * @return string
     */
    private static function detectNameFile($name, $function)
    {
        return empty(trim($name)) ? $function : sprintf(self::RULES_NAME_FILE[$function], $name);
    }

    /**
     * @return array
     */
    public static function getData()
    {
        return static::$data;
    }

    /**
     * @param array $data
     */
    public static function setData($data)
    {
        static::$data = $data;
    }


    // Fo Asset
    public static function getThemePath()
    {

    }

    public static function loadComponent($name, $data = [])
    {
        $activeTheme = Setting::activeTheme()->value;

        $templateFile = ROOT_DIR . '/content/themes/'. $activeTheme .'/' . $name . '.php';

        if (ENV == 'Admin') {
            $templateFile = path('view') . '/' . $name . '.php';
        }

        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            require($templateFile);
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }






















    //___________________________________no static

    public function setPublicDara($data)
    {
        $this->publicData = $data;
    }

    public function themeBuilder($callPath = '',array $data = [])
    {
        if ($callPath !== '') {
            return $this->load($callPath, $data);
        } 
        return $this->themeException($callPath);
    }

    public function load($callPath, array $data)
    {
        $activeTheme = Setting::activeTheme()->value;
        $templateFile = sprintf(self::MASK_TEMPLATE_FILE, $activeTheme, $callPath);
        $data += ['theme' => $this];
        $datas = array_merge($this->publicData, $data);
        extract($datas);

        if (file_exists($templateFile)) {
            require $templateFile;
            return true;
        } else {
            throw new \Exception(
                sprintf('View file %s does nod exist!', $templateFile)
            );
            return false;
        }

    }
    public function loadImage($image, $format = 'jpg')
    {
        switch ($format) {
            case 'jpg':
            $pathImage = sprintf(self::MASK_IMAGE_JPG, $image);
            return $pathImage;
            break;
            case 'png':
                $pathImage = sprintf(self::MASK_IMAGE_PNG, $image);
                return $pathImage;
            break;
            default:
            return self::MASK_IMAGE_DIR;

        }

    }

    public function themeException($callPath)
    {

        throw new \Exception(
            sprintf('You didn\'t enter a file name: \'%s\'.', $callPath)
        );
    }





}

?>
