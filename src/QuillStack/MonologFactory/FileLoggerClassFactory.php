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
     * {@inheritDoc}
     */
    public function create(string $id)
    {
        $logger = new Logger('quillstack');
        $logger->pushHandler(new StreamHandler('../var/logs/quillstack.log', Logger::DEBUG));

        return $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(Container $container): self
    {
        return $this;
    }
}
