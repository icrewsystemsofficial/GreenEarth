<?php
namespace App\Helpers;
class VersionHelper
{
    const MAJOR = 0;
    const MINOR = 1;
    const PATCH = 10.06;

    public static function full()
    {
        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));

        $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        // $commitDate->setTimezone(new \DateTimeZone('UTC'));
        return sprintf('Version %s.%s.%s, Build %s, commited at %s', self::MAJOR, self::MINOR, self::PATCH, $commitHash, $commitDate->format('H:i A, d/m/Y'));
    }

    public static function short() {
        return sprintf('%s.%s.%s', self::MAJOR, self::MINOR, self::PATCH);
    }
}
?>
