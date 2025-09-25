<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests\Unit\Parser\Block;

use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;
use PHPUnit\Framework\TestCase;
use PomoDocs\CommonMarkAlert\Node\Block\Alert;
use PomoDocs\CommonMarkAlert\Parser\Block\AlertStartParser;

final class AlertStartParserTest extends TestCase
{
    public function testAlertStartNote(): void
    {
        $cursor = new Cursor('> [!NOTE]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNotNull($start);

        $parsers = $start->getBlockParsers();
        $this->assertCount(1, $parsers);

        $block = null;
        foreach ($parsers as $parser) {
            $block = $parser->getBlock();
        }

        $this->assertInstanceOf(Alert::class, $block);

        $this->assertSame('note', $block->getType());
    }

    public function testAlertStartTip(): void
    {
        $cursor = new Cursor('> [!TIP]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNotNull($start);

        $parsers = $start->getBlockParsers();
        $this->assertCount(1, $parsers);

        $block = null;
        foreach ($parsers as $parser) {
            $block = $parser->getBlock();
        }

        $this->assertInstanceOf(Alert::class, $block);

        $this->assertSame('tip', $block->getType());
    }

    public function testAlertStartImportant(): void
    {
        $cursor = new Cursor('> [!IMPORTANT]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNotNull($start);

        $parsers = $start->getBlockParsers();
        $this->assertCount(1, $parsers);

        $block = null;
        foreach ($parsers as $parser) {
            $block = $parser->getBlock();
        }

        $this->assertInstanceOf(Alert::class, $block);

        $this->assertSame('important', $block->getType());
    }

    public function testAlertStartWarning(): void
    {
        $cursor = new Cursor('> [!WARNING]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNotNull($start);

        $parsers = $start->getBlockParsers();
        $this->assertCount(1, $parsers);

        $block = null;
        foreach ($parsers as $parser) {
            $block = $parser->getBlock();
        }

        $this->assertInstanceOf(Alert::class, $block);

        $this->assertSame('warning', $block->getType());
    }

    public function testAlertStartCaution(): void
    {
        $cursor = new Cursor('> [!CAUTION]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNotNull($start);

        $parsers = $start->getBlockParsers();
        $this->assertCount(1, $parsers);

        $block = null;
        foreach ($parsers as $parser) {
            $block = $parser->getBlock();
        }

        $this->assertInstanceOf(Alert::class, $block);

        $this->assertSame('caution', $block->getType());
    }

    public function testAlertStartWithIndentation(): void
    {
        $cursor = new Cursor('  [!NOTE]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNull($start);
    }

    public function testAlertWrongStart(): void
    {
        $cursor = new Cursor('! [!NOTE]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNull($start);
    }

    public function testWrongTitleReturnNull(): void
    {
        $cursor = new Cursor('> [!WRONG]');

        $parser = new AlertStartParser();
        $start = $parser->tryStart($cursor, $this->createMock(MarkdownParserStateInterface::class));

        $this->assertNull($start);
    }
}
