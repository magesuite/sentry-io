<?php

namespace MageSuite\SentryIo\Test\Integration\Block;

class SentryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \MageSuite\SentryIo\Block\Sentry
     */
    private $sentryBlock;

    public function setUp(): void {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->sentryBlock = $this->objectManager->get(\MageSuite\SentryIo\Block\Sentry::class);
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoAppArea frontend
     * @magentoAdminConfigFixture sentry_io/configuration/data_source_name example.com
     * @magentoAdminConfigFixture sentry_io/configuration/custom_configuration {}
     */
    public function testItReturnCorrectConfiguration() {
        $expectedDataSourceName = 'example.com';
        $expectedCustomConfiguration = '{}';

        $this->assertEquals($expectedDataSourceName, $this->sentryBlock->getDataSourceName());
        $this->assertEquals($expectedCustomConfiguration, $this->sentryBlock->getCustomConfiguration());
    }
}
