<?php

declare(strict_types=1);

namespace Ziswapp\Zenziva\Client;

use DateTimeInterface;

/**
 * @author Nuradiyana <me@nooradiana.com>
 */
interface SmsCenterClientInterface extends ClientInterface
{
    /**
     * @return mixed
     */
    public function status(string $messageId);

    /**
     * @return mixed
     */
    public function balance();

    /**
     * @return mixed
     */
    public function inbox(DateTimeInterface $startDate, DateTimeInterface $endDate);

    /**
     * @return mixed
     */
    public function outbox(DateTimeInterface $startDate, DateTimeInterface $endDate);
}
