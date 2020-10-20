<?php

declare(strict_types=1);

namespace QuillStack\MonologFactory;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use QuillStack\DI\Container;
use QuillStack\DI\CustomFactoryInterface;

final class FileLoggerClassFactory implements CustomFactoryInterface
{
    /**
     * @var Container|null
     */
    private ?Container $container;

    /**
     * @var int
     */
    public int $level = Logger::WARNING;

    /**
     * @var string
     */
    public string $path = 'monolog.log';

    /**
     * {@inheritDoc}
     */
    public function create(string $id)
    {
        $logger = new Logger('quillstack');
        $logger->pushHandler(
            new StreamHandler($this->path, $this->level)
        );

        return $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }
}
