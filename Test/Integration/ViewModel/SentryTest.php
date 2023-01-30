<?php

namespace MageSuite\SentryIo\Test\Integration\ViewModel;

class SentryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Magento\Framework\View\Element\Template
     */
    protected $sentryBlock;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();
        $this->sentryBlock = $this->objectManager->create(\Magento\Framework\View\Element\Template::class);
        $this->sentryBlock->setData('view_model', $this->objectManager->get(\MageSuite\SentryIo\ViewModel\Sentry::class));
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoAppArea frontend
     * @magentoAdminConfigFixture sentry_io/configuration/data_source_name example.com
     * @magentoAdminConfigFixture sentry_io/configuration/custom_configuration {}
     */
    public function testItReturnCorrectConfiguration()
    {
        $expectedDataSourceName = 'example.com';
        $expectedCustomConfiguration = '{}';

        $this->assertEquals($expectedDataSourceName, $this->sentryBlock->getViewModel()->getDataSourceName());
        $this->assertEquals($expectedCustomConfiguration, $this->sentryBlock->getViewModel()->getCustomConfiguration());
    }
}
