<?php
declare(strict_types=1);

namespace MageSuite\SentryIo\ViewModel;

class Sentry implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected \MageSuite\SentryIo\Helper\Configuration $configuration;

    protected \Magento\Framework\App\ProductMetadataInterface $productMetadata;

    public function __construct(
        \MageSuite\SentryIo\Helper\Configuration $configuration,
        \Magento\Framework\App\ProductMetadataInterface $productMetadata
    ) {
        $this->configuration = $configuration;
        $this->productMetadata = $productMetadata;
    }

    public function getDataSourceName(): string
    {
        return $this->configuration->getDataSourceName();
    }

    public function getCustomConfiguration(): string
    {
        return $this->configuration->getCustomConfiguration();
    }

    public function getMagentoVersion(): string
    {
        return $this->productMetadata->getVersion();
    }
}
