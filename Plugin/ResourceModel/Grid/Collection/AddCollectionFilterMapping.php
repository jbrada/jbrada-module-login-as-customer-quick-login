<?php

declare(strict_types=1);

namespace JBrada\LoginAsCustomerQuickLogin\Plugin\ResourceModel\Grid\Collection;

use JBrada\LoginAsCustomerQuickLogin\Ui\Component\Listing\Column\LoginAsCustomer\Options;
use Magento\Customer\Model\ResourceModel\Grid\Collection;

class AddCollectionFilterMapping
{
    /**
     * Add custom filter logic for Login as Customer column
     *
     * @param Collection $subject
     * @param callable $proceed
     * @param string|array $field
     * @param string|int|array $condition
     * @return Collection
     */
    public function aroundAddFieldToFilter(
        Collection $subject,
        callable   $proceed,
        $field,
        $condition = null
    ): Collection {
        if ($field !== 'jbrada_login_as_customer') {
            return $proceed($field, $condition);
        }

        $condition = $this->getMappedCondition($condition);

        $conditionSql = $subject->getConnection()->prepareSqlCondition('as.customer_id', $condition);
        $subject->getSelect()->where($conditionSql);

        return $subject;
    }

    /**
     * Condition mapping
     *
     * @param mixed $condition
     * @return array
     */
    private function getMappedCondition($condition): array
    {
        if ($condition === ['eq' => '1']) {
            return ['notnull' => true];
        }

        return ['null' => true];
    }
}
