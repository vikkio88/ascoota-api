<?php

namespace App\Actions\User\Auth\Facebook;

use App\Lib\Helpers\Config;
use App\Lib\Slime\RestAction\ApiAction;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Storage\Memory;
use OAuth\ServiceFactory;

class Login extends ApiAction
{
    protected function performAction()
    {
        $serviceFactory = new ServiceFactory();
        $facebookConfig = Config::get('authProvider.facebook');
        // Session storage
        $storage = new Memory();
        // Setup the credentials for the requests
        $credentials = new Credentials(
            $facebookConfig['id'],
            $facebookConfig['secret'],
            $this->getQueryParams()['callback']
        );

        $facebookService = $serviceFactory->createService('facebook', $credentials, $storage, ['email']);
        $this->payload = $facebookService->getAuthorizationUri()->getAbsoluteUri();
    }
}