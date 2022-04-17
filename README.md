<div id="top"></div>

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<br />
<div align="center">

<h3 align="center">JBrada/LoginAsCustomerQuickLogin</h3>

  <p align="center">
    <a href="https://docs.magento.com/user-guide/customers/login-as-customer.html" target="_blank">Login as Customer</a> made easy.
    <br />
    <br />
    <a href="https://github.com/jbrada/module-login-as-customer-quick-login/issues">Report Bug</a>
    ·
    <a href="https://github.com/jbrada/module-login-as-customer-quick-login/issues">Request Feature</a>
  </p>
</div>

## About The Project
Do you use [Login as Customer](https://docs.magento.com/user-guide/customers/login-as-customer.html) a lot and often? This module makes it easy to log in from the Customer Grid in Admin Panel so that you don't have to click through to the customer details.


### Features
- Added filterable and sortable column "Login as Customer"
- Possibility to login as a customer right away from the Customer grid

[![ScreenShot][product-screenshot]](https://github.com/jbrada/module-login-as-customer-quick-login)

### Built For

* [Magento 2 - Open Source](https://magento.com/)

### Limitations
- Currently it is not possible to log in from the Customer Grid if Login as Customer is set to "Manual Selection"





## Installation

1. (Optional if you are still using Composer 1)
    ```sh
    composer config repositories.jbrada/module-login-as-customer-quick-login vcs https://github.com/jbrada/module-login-as-customer-quick-login
    ```

2. Require package
   ```sh
   composer require jbrada/module-login-as-customer-quick-login
   ```
3. Setup:upgrade
   ```sh
   php bin/magento setup:upgrade
   ```


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->

## Contact

Jiří Brada - jiri@jbrada.cz

Project Link: [https://github.com/jbrada/module-login-as-customer-quick-login](https://github.com/jbrada/module-login-as-customer-quick-login)




<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/jbrada/module-login-as-customer-quick-login.svg?style=for-the-badge
[contributors-url]: https://github.com/jbrada/module-login-as-customer-quick-login/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/jbrada/module-login-as-customer-quick-login.svg?style=for-the-badge
[forks-url]: https://github.com/jbrada/module-login-as-customer-quick-login/network/members
[stars-shield]: https://img.shields.io/github/stars/jbrada/module-login-as-customer-quick-login.svg?style=for-the-badge
[stars-url]: https://github.com/jbrada/module-login-as-customer-quick-login/stargazers
[issues-shield]: https://img.shields.io/github/issues/jbrada/module-login-as-customer-quick-login.svg?style=for-the-badge
[issues-url]: https://github.com/jbrada/module-login-as-customer-quick-login/issues
[license-shield]: https://img.shields.io/github/license/jbrada/module-login-as-customer-quick-login.svg?style=for-the-badge
[license-url]: https://github.com/jbrada/module-login-as-customer-quick-login/blob/main/LICENSE.md
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/jbrada
[product-screenshot]: images/login-as-customer-grid.png
