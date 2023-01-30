<?php
declare(strict_types=1);

namespace MageSuite\SentryIo\Helper;

class Configuration
{
    const XML_PATH_DATA_IS_ENABLED = 'sentry_io/configuration/is_enabled';
    const XML_PATH_DATA_SOURCE_NAME = 'sentry_io/configuration/data_source_name';
    const XML_PATH_CUSTOM_CONFIGURATION = 'sentry_io/configuration/custom_configuration';

    protected \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getDataSourceName(): string
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_DATA_SOURCE_NAME);
    }

    public function getCustomConfiguration(): string
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_CUSTOM_CONFIGURATION);
    }
}
