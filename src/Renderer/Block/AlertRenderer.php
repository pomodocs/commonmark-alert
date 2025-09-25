<?php

declare(strict_types=1);

/*
 * This file is part of the pomodocs/commonmark-alert package.
 * MIT License. For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace PomoDocs\CommonMarkAlert\Renderer\Block;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;
use PomoDocs\CommonMarkAlert\Node\Block\Alert;

/**
 * Renderer for Alert block.
 */
final class AlertRenderer implements NodeRendererInterface, XmlNodeRendererInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    /**
     * Render the alert block.
     *
     * @param Node $node The Alert node
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Alert::assertInstanceOf($node);

        /** @var Alert $node */
        $type = $node->getType();

        /** @var string $class */
        $class = $this->config->get('alert/class_name');

        /** @var string $svg */
        $svg = $this->config->get('alert/icons') ? $this->config->get("alert/icon_svg/$type") : '';

        $title = "<span>$svg" . \ucfirst($type) . "</span>";
        $title = $this->config->get('alert/strong_title') ? "<strong>$title</strong>" : $title;

        /** @var array<string, array<array-key, string>> $attributes */
        $attributes = $node->data->get('attributes');

        /** @var string $color */
        $color = $this->config->get("alert/colors/$type");
        $attributes['class'] = "$class $class-$color";

        $filling = $childRenderer->renderNodes($node->children());
        $innerSeparator = $childRenderer->getInnerSeparator();

        $content = $innerSeparator
            . $title
            . $innerSeparator
            . ($filling !== '' ? $filling . $innerSeparator : '');

        return new HtmlElement('div', $attributes, $content);
    }

    public function getXmlTagName(Node $node): string
    {
        return 'alert';
    }

    /**
     * @return array<string, scalar>
     */
    public function getXmlAttributes(Node $node): array
    {
        /** @var Alert $node */
        return [
            'type' => $node->getType(),
        ];
    }
}
