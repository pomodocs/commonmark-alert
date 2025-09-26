<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests\Functional;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use PHPUnit\Framework\Attributes\DataProvider;
use PomoDocs\CommonMarkAlert\AlertExtension;
use PomoDocs\CommonMarkAlert\Tests\AlertTestCase;

final class AlertExtensionTest extends AlertTestCase
{
    #[DataProvider('markdownProvider')]
    public function testRenderWithDefaultConfiguration(string $md, string $expected): void
    {
        $environment = new Environment();
        $environment->addExtension(new AlertExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $converter = new MarkdownConverter($environment);

        $this->assertEquals($expected, (string) $converter->convert($md));
    }

    #[DataProvider('markdownConfigurationProvider')]
    public function testRenderWithConfiguration(string $md, string $expected): void
    {
        $config = [
            'alert' => [
                'colors' => [
                    'note' => 'primary',
                    'tip' => 'info',
                    'important' => 'success',
                    'warning' => 'warning',
                    'caution' => 'danger',
                ],
                'icons' => [
                    'active' => true,
                    'use_svg' => true,
                ],
            ],
        ];

        $environment = new Environment($config);
        $environment->addExtension(new AlertExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $converter = new MarkdownConverter($environment);

        $this->assertEquals($expected, (string) $converter->convert($md));
    }

    #[DataProvider('markdownClassProvider')]
    public function testRenderWithClassCss(string $md, string $expected): void
    {
        $config = [
            'alert' => [
                'class_name' => 'admonition',
            ],
        ];

        $environment = new Environment($config);
        $environment->addExtension(new AlertExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $converter = new MarkdownConverter($environment);

        $this->assertEquals($expected, (string) $converter->convert($md));
    }

    #[DataProvider('markdownIconProvider')]
    public function testRenderWithIconNames(string $md, string $expected): void
    {
        $config = [
            'alert' => [
                'colors' => [
                    'note' => 'primary',
                    'tip' => 'info',
                    'important' => 'success',
                    'warning' => 'warning',
                    'caution' => 'danger',
                ],
                'icons' => [
                    'active' => true,
                    'use_svg' => false,
                ],
            ],
        ];

        $environment = new Environment($config);
        $environment->addExtension(new AlertExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $converter = new MarkdownConverter($environment);

        $this->assertEquals($expected, (string) $converter->convert($md));
    }
}
