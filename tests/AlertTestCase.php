<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Tests;

use PHPUnit\Framework\TestCase;

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

class AlertTestCase extends TestCase
{
    public static function markdownProvider(): array
    {
        return [
            [
                '> [!NOTE]
> Note lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-note">
<strong><span>Note</span></strong>
<p>Note lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!TIP]
> Tip lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-tip">
<strong><span>Tip</span></strong>
<p>Tip lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!IMPORTANT]
> Important lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-important">
<strong><span>Important</span></strong>
<p>Important lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!WARNING]
> Warning lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-warning">
<strong><span>Warning</span></strong>
<p>Warning lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!CAUTION]
> Caution lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-caution">
<strong><span>Caution</span></strong>
<p>Caution lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
        ];
    }

    public static function markdownConfigurationProvider(): array
    {
        return [
            [
                '> [!NOTE]
> Note lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-primary">
<strong><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Zm8-6.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13ZM6.5 7.75A.75.75 0 0 1 7.25 7h1a.75.75 0 0 1 .75.75v2.75h.25a.75.75 0 0 1 0 1.5h-2a.75.75 0 0 1 0-1.5h.25v-2h-.25a.75.75 0 0 1-.75-.75ZM8 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"></path></svg>Note</span></strong>
<p>Note lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!TIP]
> Tip lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-info">
<strong><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8 1.5c-2.363 0-4 1.69-4 3.75 0 .984.424 1.625.984 2.304l.214.253c.223.264.47.556.673.848.284.411.537.896.621 1.49a.75.75 0 0 1-1.484.211c-.04-.282-.163-.547-.37-.847a8.456 8.456 0 0 0-.542-.68c-.084-.1-.173-.205-.268-.32C3.201 7.75 2.5 6.766 2.5 5.25 2.5 2.31 4.863 0 8 0s5.5 2.31 5.5 5.25c0 1.516-.701 2.5-1.328 3.259-.095.115-.184.22-.268.319-.207.245-.383.453-.541.681-.208.3-.33.565-.37.847a.751.751 0 0 1-1.485-.212c.084-.593.337-1.078.621-1.489.203-.292.45-.584.673-.848.075-.088.147-.173.213-.253.561-.679.985-1.32.985-2.304 0-2.06-1.637-3.75-4-3.75ZM5.75 12h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1 0-1.5ZM6 15.25a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75Z"></path></svg>Tip</span></strong>
<p>Tip lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!IMPORTANT]
> Important lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-success">
<strong><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v9.5A1.75 1.75 0 0 1 14.25 13H8.06l-2.573 2.573A1.458 1.458 0 0 1 3 14.543V13H1.75A1.75 1.75 0 0 1 0 11.25Zm1.75-.25a.25.25 0 0 0-.25.25v9.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h6.5a.25.25 0 0 0 .25-.25v-9.5a.25.25 0 0 0-.25-.25Zm7 2.25v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"></path></svg>Important</span></strong>
<p>Important lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!WARNING]
> Warning lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-warning">
<strong><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M6.457 1.047c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0 1 14.082 15H1.918a1.75 1.75 0 0 1-1.543-2.575Zm1.763.707a.25.25 0 0 0-.44 0L1.698 13.132a.25.25 0 0 0 .22.368h12.164a.25.25 0 0 0 .22-.368Zm.53 3.996v2.5a.75.75 0 0 1-1.5 0v-2.5a.75.75 0 0 1 1.5 0ZM9 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"></path></svg>Warning</span></strong>
<p>Warning lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!CAUTION]
> Caution lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="alert alert-danger">
<strong><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M4.47.22A.749.749 0 0 1 5 0h6c.199 0 .389.079.53.22l4.25 4.25c.141.14.22.331.22.53v6a.749.749 0 0 1-.22.53l-4.25 4.25A.749.749 0 0 1 11 16H5a.749.749 0 0 1-.53-.22L.22 11.53A.749.749 0 0 1 0 11V5c0-.199.079-.389.22-.53Zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5ZM8 4a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"></path></svg>Caution</span></strong>
<p>Caution lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
        ];
    }

    public static function markdownClassProvider(): array
    {
        return [
            [
                '> [!NOTE]
> Note lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="admonition admonition-note">
<span>Note</span>
<p>Note lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!TIP]
> Tip lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="admonition admonition-tip">
<span>Tip</span>
<p>Tip lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!IMPORTANT]
> Important lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="admonition admonition-important">
<span>Important</span>
<p>Important lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!WARNING]
> Warning lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="admonition admonition-warning">
<span>Warning</span>
<p>Warning lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
            [
                '> [!CAUTION]
> Caution lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<div class="admonition admonition-caution">
<span>Caution</span>
<p>Caution lorem ipsum dolor sit amet, <em>consectetur adipiscing elit</em>
sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
</div>
',
            ],
        ];
    }

    public static function markdownXml(): array
    {
        return [
            [
                '> [!NOTE]
> Note lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<?xml version="1.0" encoding="UTF-8"?>
<document xmlns="http://commonmark.org/xml/1.0">
    <alert type="note">
        <paragraph>
            <text>Note lorem ipsum dolor sit amet, </text>
            <emph>
                <text>consectetur adipiscing elit</text>
            </emph>
            <softbreak />
            <text>sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</text>
        </paragraph>
    </alert>
</document>
',
            ],
            [
                '> [!TIP]
> Tip lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<?xml version="1.0" encoding="UTF-8"?>
<document xmlns="http://commonmark.org/xml/1.0">
    <alert type="tip">
        <paragraph>
            <text>Tip lorem ipsum dolor sit amet, </text>
            <emph>
                <text>consectetur adipiscing elit</text>
            </emph>
            <softbreak />
            <text>sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</text>
        </paragraph>
    </alert>
</document>
',
            ],
            [
                '> [!IMPORTANT]
> Important lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<?xml version="1.0" encoding="UTF-8"?>
<document xmlns="http://commonmark.org/xml/1.0">
    <alert type="important">
        <paragraph>
            <text>Important lorem ipsum dolor sit amet, </text>
            <emph>
                <text>consectetur adipiscing elit</text>
            </emph>
            <softbreak />
            <text>sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</text>
        </paragraph>
    </alert>
</document>
',
            ],
            [
                '> [!WARNING]
> Warning lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<?xml version="1.0" encoding="UTF-8"?>
<document xmlns="http://commonmark.org/xml/1.0">
    <alert type="warning">
        <paragraph>
            <text>Warning lorem ipsum dolor sit amet, </text>
            <emph>
                <text>consectetur adipiscing elit</text>
            </emph>
            <softbreak />
            <text>sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</text>
        </paragraph>
    </alert>
</document>
',
            ],
            [
                '> [!CAUTION]
> Caution lorem ipsum dolor sit amet, _consectetur adipiscing elit_
> sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.',
                '<?xml version="1.0" encoding="UTF-8"?>
<document xmlns="http://commonmark.org/xml/1.0">
    <alert type="caution">
        <paragraph>
            <text>Caution lorem ipsum dolor sit amet, </text>
            <emph>
                <text>consectetur adipiscing elit</text>
            </emph>
            <softbreak />
            <text>sed do eiusmod tempor incidunt ut labore et dolore magna aliqua.</text>
        </paragraph>
    </alert>
</document>
',
            ],
        ];
    }
}
