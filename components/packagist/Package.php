<?php
namespace app\components\packagist;

use yii\helpers\Url;

/**
 * Class Package
 * @package app\components\packagist
 */
class Package
{
    const URL_REMOTE = 'https://packagist.org/packages/%s';

    private $vendorName;
    private $packageName;
    private $description;
    private $repository;
    private $versions = [];
    private $downloads = 0;
    private $favers = 0;
    private $updatedAt;
    private $createdAt;
    private $license;
    private $yii_version;

    /**
     * @return mixed
     */
    public function getVendorName()
    {
        return $this->vendorName;
    }

    /**
     * @return mixed
     */
    public function getPackageName()
    {
        return $this->packageName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getVendorName() . '/' . $this->getPackageName();
    }

    /**
     * @return string
     */
    public function getLicense()
    {
        return reset($this->license);
    }

    /**
     * @return string
     */
    public function getYiiVersion()
    {
        return $this->yii_version;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getFavers()
    {
        return $this->favers;
    }

    /**
     * @return int
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * @return array
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return mixed
     */
    public function getRepositoryHost()
    {
        return parse_url($this->getRepository(), PHP_URL_HOST);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return Url::to( [
            'extension/package',
            'vendorName' => $this->getVendorName(),
            'packageName' => $this->getPackageName()
        ]);
    }

    /**
     * Url to packagist.org
     *
     * @return string
     */
    public function getUrlRemote()
    {
        return sprintf(self::URL_REMOTE, $this->getName());
    }

    private function __construct()
    {
    }

    /**
     * @param array $data
     *
     * ```
     * [
     *     'name' => 'cebe/yii2-gravatar',
     *     'description' => 'Gravatar Widget for Yii 2',
     *     'time' => '2013-11-12T00:04:07+00:00',
     *     'maintainers' => [
     *         [ 'name' => 'cebe', 'avatar_url' => 'https://www.gravatar.com/avatar/2ebfe57beabd0b9f8eb9ded1237a275d?d=identicon', ], ],
     *     'versions' => [
     *         'dev-master' => [
     *             'name' => 'cebe/yii2-gravatar',
     *             'description' => 'Gravatar Widget for Yii 2',
     *             'keywords' => [ 'gravatar', 'yii', ],
     *             'homepage' => '',
     *             'version' => 'dev-master',
     *             'version_normalized' => '9999999-dev',
     *             'license' => [ 'MIT', ],
     *             'authors' => [
     *                 [ 'name' => 'Carsten Brandt', 'email' => 'mail@cebe.cc', ],
     *             ],
     *             'source' => [ 'type' => 'git', 'url' => 'https://github.com/cebe/yii2-gravatar.git', 'reference' => '3faf3a3d08975e7b1710aeae25db15209f36f657', ],
     *             'dist' => [ 'type' => 'zip', 'url' => 'https://api.github.com/repos/cebe/yii2-gravatar/zipball/3faf3a3d08975e7b1710aeae25db15209f36f657', 'reference' => '3faf3a3d08975e7b1710aeae25db15209f36f657', 'shasum' => '',             ],
     *             'type' => 'yii2-extension',
     *             'time' => '2015-07-20T20:57:30+00:00',
     *             'autoload' => [ 'psr-0' => [ 'cebe\\gravatar\\' => '', ], ],
     *             'target-dir' => 'cebe/gravatar',
     *             'require' => [ 'yiisoft/yii2' => '*', ],
     *         ],
     *         '1.1' => [ 'name' => 'cebe/yii2-gravatar', 'description' => 'Gravatar Widget for Yii 2', 'keywords' => [ 'gravatar', 'yii', ], 'homepage' => '', 'version' => '1.1', 'version_normalized' => '1.1.0.0', 'license' => [ 'MIT', ], 'authors' => [ [ 'name' => 'Carsten Brandt', 'email' => 'mail@cebe.cc', 'homepage' => 'http://cebe.cc/', 'role' => 'Core framework development', ], ], 'source' => [ 'type' => 'git', 'url' => 'https://github.com/cebe/yii2-gravatar.git', 'reference' => 'c9c01bd14c9bdee9e5ae1ef1aad23f80c182c057', ], 'dist' => [ 'type' => 'zip', 'url' => 'https://api.github.com/repos/cebe/yii2-gravatar/zipball/c9c01bd14c9bdee9e5ae1ef1aad23f80c182c057', 'reference' => 'c9c01bd14c9bdee9e5ae1ef1aad23f80c182c057', 'shasum' => '', ], 'type' => 'yii2-extension', 'time' => '2013-12-10T17:49:58+00:00', 'autoload' => [ 'psr-0' => [ 'cebe\\gravatar\\' => '', ], ], 'target-dir' => 'cebe/gravatar', 'require' => [ 'yiisoft/yii2' => '*', ], ],
     *         '1.0' => [ 'name' => 'cebe/yii2-gravatar', 'description' => 'Gravatar Widget for Yii 2', 'keywords' => [ 'gravatar', 'yii', ], 'homepage' => '', 'version' => '1.0', 'version_normalized' => '1.0.0.0', 'license' => [ 'MIT', ], 'authors' => [ [ 'name' => 'Carsten Brandt', 'email' => 'mail@cebe.cc', 'homepage' => 'http://cebe.cc/', 'role' => 'Core framework development', ], ], 'source' => [ 'type' => 'git', 'url' => 'https://github.com/cebe/yii2-gravatar.git', 'reference' => 'dad903e16a7179da91156790664dc49bce4200fd', ], 'dist' => [ 'type' => 'zip', 'url' => 'https://api.github.com/repos/cebe/yii2-gravatar/zipball/dad903e16a7179da91156790664dc49bce4200fd', 'reference' => 'dad903e16a7179da91156790664dc49bce4200fd', 'shasum' => '', ], 'type' => 'yii2-extension', 'time' => '2013-11-12T00:27:41+00:00', 'autoload' => [ 'psr-0' => [ 'cebe\\widgets\\' => '', ], ], 'target-dir' => 'cebe/widgets', 'require' => [ 'yiisoft/yii2' => '*', ], ],
     *     ],
     *     'type' => 'yii2-extension',
     *     'repository' => 'https://github.com/cebe/yii2-gravatar',
     *     'github_stars' => 24, 'github_watchers' => 7, 'github_forks' => 9, 'github_open_issues' => 1, 'language' => 'PHP',
     *     'dependents' => 31, 'suggesters' => 0,
     *     'downloads' => [ 'total' => 145985, 'monthly' => 8231, 'daily' => 281, ],
     *     'favers' => 27,
     * ]
     * ```
     *
     * @return Package|null
     */
    public static function createFromAPIData($data)
    {
        $package = new static();

        if (array_key_exists('name', $data)) {
            if (!preg_match('/^([\w\-\.]+)\/([\w\-\.]+)$/i', $data['name'], $matches)) {
                return null;
            } else {
                $package->vendorName = $matches[1];
                $package->packageName = $matches[2];
            }
        }

        if (array_key_exists('time', $data)) {
            $package->createdAt = strtotime($data['time']);
//            $package->updatedAt = strtotime($data['time']);
        }

        $version = static::getLatestVersion($data['versions']);
        $lastVersion = $data['versions'][$version];
        $package->license = $lastVersion['license'];
        $package->updatedAt = strtotime($lastVersion['time']);
        $package->license = $lastVersion['license'];
        $package->description = $lastVersion['description'];
        $package->yii_version = static::determineYiiVersion($data['versions']);
        // TODO maintainers


        foreach (['repository', 'versions', 'downloads', 'favers'] as $key) {
            if (array_key_exists($key, $data)) {
                $package->{$key} = $data[$key];
            }
        }

        return $package;
    }

    private static function determineYiiVersion($versions)
    {
        $yiiVersions = [];
        foreach($versions as $version) {
            if (isset($version['require']['yiisoft/yii2'])) {
                $yiiVersions[] = $version['require']['yiisoft/yii2'];
            }
        }
        $version = implode(' | ', array_unique($yiiVersions));
        if ($version === '*') {
            return null;
        }
        return $version;
    }

    private static function getLatestVersion($versions, $preferRelease = true)
    {
        uasort(
            $versions,
            function ($a, $b) {
                return $a['version_normalized'] < $b['version_normalized'] ? 1 : -1;
            }
        );

        $version = null;
        foreach ($versions as $v => $versionItem) {
            if ($version === null) {
                $version = $v;
            } else {
                if (!$preferRelease) {
                    break;
                } elseif (strpos($versionItem['version_normalized'], 'dev') === false) {
                    $version = $v;
                    break;
                }
            }
        }
        return $version;
    }
}