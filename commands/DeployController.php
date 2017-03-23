<?php

namespace app\commands;

use yii\console\Controller;

class DeployController extends Controller
{
    /**
     * DB update
     */
    public function actionDbupdate() {
        $appMigrations = [
            ''
        ];
        $moduleMigrations = [
            'memory' => 'modules/memory/migrations',
        ];
        $allMigrations = array_merge($appMigrations, $moduleMigrations);

        foreach ($allMigrations as $module => $migrationPath) {
            if (is_int($module)) {//if the array key is an integer we did not specify a module
                $module = null;
            }
            if ($migrationPath == '') {
                $migrationPath = null;
            }
            $this->_executeMigration($migrationPath, $module);
        }
    }

    /**
     * @param string|null $migrationPath
     * @param string|null $module
     */
    private function _executeMigration($migrationPath, $module) {
        if (!is_null($module)) {
            //check if module exists
            if (!array_key_exists($module, $this->_loadWebModulesConfig())) {
                echo 'skipped '.$module."\n";

                return;
            }
        }
        if (!is_null($migrationPath)) {
            $migrationPath = ' --migrationPath='.$migrationPath;
        }
        if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
            $exe = 'yii.bat';
        } else {
            $exe = './yii';
        }

        exec($exe.' migrate '.$migrationPath.' --interactive=0', $output);
        foreach ($output as $line) {
            echo "\n".$line;
        }
        echo "\n\n";
    }

    /**
     * @return mixed
     */
    private function _loadWebModulesConfig()
    {
        $config = require(__DIR__.'/../config/web.php');

        return $config['modules'];
    }
}