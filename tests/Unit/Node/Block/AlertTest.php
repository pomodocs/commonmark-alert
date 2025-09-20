<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests\Unit\Node\Block;

use PHPUnit\Framework\TestCase;
use PomoDocs\CommonMarkAlert\Node\Block\Alert;

final class AlertTest extends TestCase
{
    public function testConstructorAndGetter(): void
    {
        $node = new Alert('warning');

        $this->assertEquals($node->getType(), 'warning');
    }

    public function testConstructorWithDefaultValue(): void
    {
        $node = new Alert();

        $this->assertEquals($node->getType(), 'note');
    }
}
