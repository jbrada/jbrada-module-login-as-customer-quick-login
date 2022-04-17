<?php

declare(strict_types=1);

namespace JBrada\LoginAsCustomerQuickLogin\Plugin\Api\ConfigInterface;

use Magento\Framework\App\Request\Http;
use Magento\LoginAsCustomerApi\Api\ConfigInterface;

class DisableOnCustomerGridIfChoice
{
    private const CUSTOMER_GRID_PAGE = 'customer_index_index';
    /**
     * @var Http
     */
    private Http $http;

    /**
     * @param Http $http
     */
    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * Plugin disables Login As Customer for Customer Grid if Manual choice is Enabled
     *
     * @param ConfigInterface $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsEnabled(ConfigInterface $subject, bool $result): bool
    {
        if ($this->http->getFullActionName() === self::CUSTOMER_GRID_PAGE &&
            $subject->isStoreManualChoiceEnabled() === true) {
            return false;
        }

        return $result;
    }
}
