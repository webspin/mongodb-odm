<?php

declare(strict_types=1);

namespace Doctrine\ODM\MongoDB\Proxy;

use ProxyManager\FileLocator\FileLocator as BaseFileLocator;
use function mkdir;
use function realpath;

final class FileLocator extends BaseFileLocator
{
    public function __construct(string $proxiesDirectory)
    {
        $absolutePath = realpath($proxiesDirectory);

        if ($absolutePath === false) {
            mkdir($proxiesDirectory, 0755, true);
        }

        parent::__construct($proxiesDirectory);
    }
}
