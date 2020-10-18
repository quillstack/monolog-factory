<?php

declare(strict_types=1);

namespace QuillStack\Tests;

use Monolog\Logger;
use Monolog\Test\TestCase;
use QuillStack\DI\Container;
use QuillStack\MonologFactory\FileLoggerClassFactory;

final class FileLoggerClassFactoryTest extends TestCase
{
    /**
     * @var FileLoggerClassFactory
     */
    private FileLoggerClassFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new FileLoggerClassFactory();
    }

    public function testCreate()
    {
        $logger = $this->factory->create('');

        $this->assertInstanceOf(Logger::class, $logger);
    }

    public function testSetContainer()
    {
        $container = new Container();
        $this->factory->create('');
        $factory = $this->factory->setContainer($container);

        $this->assertInstanceOf(FileLoggerClassFactory::class, $factory);
    }
}
