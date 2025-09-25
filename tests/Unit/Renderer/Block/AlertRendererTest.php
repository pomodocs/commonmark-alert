<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests\Unit\Renderer\Block;

use League\CommonMark\Environment\Environment;
use PHPUnit\Framework\TestCase;
use PomoDocs\CommonMarkAlert\AlertExtension;
use PomoDocs\CommonMarkAlert\Renderer\Block\AlertRenderer;
use ReflectionProperty;

final class AlertRendererTest extends TestCase
{
    public function testSetConfiguration(): void
    {
        $config = Environment::createDefaultConfiguration();
        $extension = new AlertExtension();
        $extension->configureSchema($config);
        $configuration = $config->reader();

        $renderer = new AlertRenderer();
        $renderer->setConfiguration($configuration);

        $property = new ReflectionProperty($renderer, 'config');
        $property->setAccessible(true);

        $this->assertSame($property->getValue($renderer), $configuration);
    }
}
