<?php

declare(strict_types=1);

namespace Ziswapp\Zenziva\Response;

use Carbon\Carbon;
use DateTimeInterface;
use Ziswapp\Zenziva\ResponseFactoryInterface;

/**
 * @author Nuradiyana <me@nooradiana.com>
 */
final class Inbox implements ResponseFactoryInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $from;

    /**
     * @var DateTimeInterface
     */
    private $date;

    /**
     * @var string
     */
    private $message;

    public function __construct(int $id, string $from, DateTimeInterface $date, string $message)
    {
        $this->id = $id;
        $this->from = $from;
        $this->date = $date;
        $this->message = $message;
    }

    /**
     * @return ResponseFactoryInterface|self
     *
     * @psalm-suppress PossiblyFalseArgument
     */
    public static function buildFromArrayContent(array $content): ResponseFactoryInterface
    {
        $id = (int) $content['messageId'];
        $from = $content['dari'];
        $message = $content['isiPesan'];

        /** @var DateTimeInterface $expiredDate */
        $date = Carbon::createFromFormat(Carbon::DEFAULT_TO_STRING_FORMAT, $content['date']);

        return new static($id, $from, $date, $message);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
