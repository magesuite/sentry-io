<?php

namespace MageSuite\SentryIo\Block;

class Sentry extends \Magento\Framework\View\Element\Template
{
    protected $_template = 'MageSuite_SentryIo::sentry.phtml';

    const SENTRY_DATA_SOURCE_NAME_PATH = 'sentry_io/configuration/data_source_name';
    const SENTRY_CUSTOM_CONFIGURATION_PATH = 'sentry_io/configuration/custom_configuration';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Framework\App\ProductMetadataInterface
     */
    protected $productMetadata;

    /**
     * @var \Magento\Framework\App\CacheInterface
     */
    protected $cache;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\App\ProductMetadataInterface $productMetadata,
        \Magento\Framework\App\CacheInterface $cache,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->scopeConfig = $scopeConfig;
        $this->productMetadata = $productMetadata;
        $this->cache = $cache;
    }

    public function getDataSourceName()
    {
        return $this->scopeConfig->getValue(self::SENTRY_DATA_SOURCE_NAME_PATH);
    }

    public function getCustomConfiguration()
    {
        return $this->scopeConfig->getValue(self::SENTRY_CUSTOM_CONFIGURATION_PATH);
    }

    public function getMagentoVersion()
    {
        if (($version = $this->cache->load('magento_version')) == false) {
            $version = $this->productMetadata->getVersion();

            $this->cache->save($version, 'magento_version');
        }

        return $version;
    }
}
