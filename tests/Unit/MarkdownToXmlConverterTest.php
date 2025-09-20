<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests\Unit;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Output\RenderedContentInterface;
use League\CommonMark\Xml\MarkdownToXmlConverter;
use PHPUnit\Framework\Attributes\DataProvider;
use PomoDocs\CommonMarkAlert\AlertExtension;
use PomoDocs\CommonMarkAlert\Tests\AlertTestCase;

final class MarkdownToXmlConverterTest extends AlertTestCase
{
    #[DataProvider('markdownXml')]
    public function testConvert(string $md, string $xml): void
    {
        $environment = new Environment();
        $environment->addExtension(new AlertExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $converter = new MarkdownToXmlConverter($environment);

        $actual = $converter->convert($md);

        $this->assertInstanceOf(RenderedContentInterface::class, $actual);
        $this->assertSame($xml, $actual->getContent());
    }
}
