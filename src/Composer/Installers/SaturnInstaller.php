<?php

namespace Composer\Installers;

class SaturnInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin' => 'plugins/{$name}/',
    );

    protected $type = [
        'saturn-plugin'
    ];

    public function inflectPackageVars($vars)
    {
        if (in_array($vars['type'], $this->type)) {
            return $this->inflectVars($vars['type'], $vars);
        }

        return $vars;
    }

    protected function inflectVars($type, $vars)
    {
        $vars['name'] = str_replace(str_replace('saturn-', '', $type) . '-', '', $vars['name']);

        return $vars;
    }
}