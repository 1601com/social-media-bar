<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Agentur1601com\SocialMediaBar\Tests;

use Contao\SkeletonBundle\ContaoSkeletonBundle;
use PHPUnit\Framework\TestCase;

class SocialMediaBarBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new SocialMediaBarBundle();

        $this->assertInstanceOf('Agentur1601com\SocialMediaBar\SocialMediaBarBundle', $bundle);
    }
}
