<?php

declare(strict_types=1);

namespace Ziswapp\Zenziva;

/**
 * @author Nuradiyana <me@nooradiana.com>
 */
interface ResponseFactoryInterface
{
    /**
     * @return ResponseFactoryInterface|self
     */
    public static function buildFromArrayContent(array $content): self;
}
