<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests\Unit\Parser\Block;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;
use PHPUnit\Framework\TestCase;
use PomoDocs\CommonMarkAlert\Node\Block\Alert;
use PomoDocs\CommonMarkAlert\Parser\Block\AlertParser;

final class AlertParserTest extends TestCase
{
    public function testGetter(): void
    {
        $parser = new AlertParser('warning');

        $this->assertInstanceOf(Alert::class, $parser->getBlock());
        $this->assertEquals('warning', $parser->getBlock()->getType());
    }

    public function testIsContainer(): void
    {
        $parser = new AlertParser('tip');
        $this->assertTrue($parser->isContainer());
    }

    public function testCanContain(): void
    {
        $parser = new AlertParser('tip');
        $this->assertTrue($parser->canContain($this->createMock(AbstractBlock::class)));
    }

    public function testTryContinue(): void
    {
        $cursor = new Cursor('> Lorem ipsum');
        $parser = new AlertParser('tip');

        $continue = $parser->tryContinue($cursor, $this->createMock(BlockContinueParserInterface::class));

        $this->assertInstanceOf(BlockContinue::class, $continue);
    }

    public function testTryContinueWrongBlock(): void
    {
        $cursor = new Cursor(' Lorem ipsum');
        $parser = new AlertParser('tip');

        $continue = $parser->tryContinue($cursor, $this->createMock(BlockContinueParserInterface::class));

        $this->assertNull($continue);
    }
}
