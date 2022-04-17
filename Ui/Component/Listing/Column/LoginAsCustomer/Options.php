<?php

declare(strict_types=1);

namespace JBrada\LoginAsCustomerQuickLogin\Ui\Component\Listing\Column\LoginAsCustomer;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Phrase;

class Options implements OptionSourceInterface
{
    public const ALLOWED = 1;

    public const DISALLOWED = 0;

    /**
     * Get options
     *
     * @return array<int, array<string, int|Phrase>>
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::DISALLOWED,
                'label' => __('Disllowed')
            ], [
                'value' => self::ALLOWED,
                'label' => __('Allowed')
            ]
        ];
    }
}
