<?php
namespace App\Helpers;

class TreesHealthHelper
{

    public static function health() : object {
        $treeHealth = collect([
            ['health' => 'Healthy'],
            ['health' => 'Not So Healthy'],
            ['health' => 'Requires Immediate Attention']
        ]);

        $tree_health = $treeHealth->pluck('health');
        return (object) $tree_health;
    }
    

}
?>