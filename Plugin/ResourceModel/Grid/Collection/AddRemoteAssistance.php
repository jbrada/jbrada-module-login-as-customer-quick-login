<?php

declare(strict_types=1);

namespace JBrada\LoginAsCustomerQuickLogin\Plugin\ResourceModel\Grid\Collection;

use JBrada\LoginAsCustomerQuickLogin\Ui\Component\Listing\Column\LoginAsCustomer\Options;
use Magento\Customer\Model\ResourceModel\Grid\Collection;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Exception\LocalizedException;
use Zend_Db_Expr;

class AddRemoteAssistance
{
    /**
     * Add login_as_customer_assistance_allowed table to Customer grid collection
     *
     * @param Collection $subject
     * @return void|null
     * @throws LocalizedException
     */
    public function beforeLoad(Collection $subject)
    {
        if ($subject->isLoaded() === true) {
            return null;
        }

        $primaryKey = $subject->getResource()->getIdFieldName();
        $select = $subject->getSelect();
        $select->joinLeft(
            ['as' => $subject->getResource()->getTable('login_as_customer_assistance_allowed')],
            'main_table.' . $primaryKey . '=as.customer_id',
            ['jbrada_login_as_customer' => $this->getAssistanceAllowedExpression($select->getConnection())]
        );
    }

    /**
     * Get SQL Expression to define Login as Customer Assistance Allowed
     *
     * @param AdapterInterface $connection
     * @return Zend_Db_Expr
     */
    private function getAssistanceAllowedExpression(AdapterInterface $connection): Zend_Db_Expr
    {
        return $connection->getCheckSql(
            $connection->quoteIdentifier('as.customer_id') . ' IS NOT NULL',
            (string) Options::ALLOWED,
            (string) Options::DISALLOWED
        );
    }
}
