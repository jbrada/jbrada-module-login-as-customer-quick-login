<?php

declare(strict_types=1);

namespace JBrada\LoginAsCustomerQuickLogin\Ui\Component\Listing\Column;

use JBrada\LoginAsCustomerQuickLogin\Ui\Component\Listing\Column\LoginAsCustomer\Options;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\LoginAsCustomerAdminUi\Ui\Customer\Component\Button\DataProvider;
use Magento\Framework\Escaper;
use Magento\LoginAsCustomerApi\Api\ConfigInterface;
use Magento\Framework\AuthorizationInterface;

class LoginAsCustomer extends Column
{
    /**
     * @var Escaper
     */
    private Escaper $escaper;

    /**
     * @var UrlInterface
     */
    private UrlInterface $urlBuilder;

    /**
     * @var ConfigInterface
     */
    private ConfigInterface $config;

    /**
     * @var AuthorizationInterface
     */
    private AuthorizationInterface $authorization;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Escaper $escaper
     * @param UrlInterface $urlBuilder
     * @param ConfigInterface $config
     * @param AuthorizationInterface $authorization
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        Escaper $escaper,
        UrlInterface $urlBuilder,
        ConfigInterface $config,
        AuthorizationInterface $authorization,
        array              $components = [],
        array              $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);

        $this->escaper = $escaper;
        $this->urlBuilder = $urlBuilder;
        $this->config = $config;
        $this->authorization = $authorization;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items']) === false) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as &$item) {
            $allowed = (int) $item[$this->getData('name')];
            if ($allowed === Options::DISALLOWED ||
                $this->config->isStoreManualChoiceEnabled() === true ||
                $this->authorization->isAllowed('Magento_LoginAsCustomer::login') === false
            ) {

                $label = $allowed ?  __('Allowed') :  __('Disallowed');

                $item[$this->getData('name')] = [
                    'allowed' => false,
                    'label' => $this->escaper->escapeHtml((string) $label),
                    'lacUrl' => ''
                ];
                continue;
            }

            $item[$this->getData('name')] = [
                'allowed' => true,
                'label' => $this->escaper->escapeHtml((string) __('Login as Customer')),
                'lacUrl' => $this->getLoginUrl((int) $item['entity_id'])
            ];
        }

        return $dataSource;
    }

    /**
     * Get Login as Customer login url.
     *
     * @param int $customerId
     * @return string
     */
    private function getLoginUrl(int $customerId): string
    {
        return $this->urlBuilder->getUrl('loginascustomer/login/login', ['customer_id' => $customerId]);
    }
}
