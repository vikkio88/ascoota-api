<?php

namespace App\Actions\User\Auth\Facebook;

use App\Lib\Helpers\Config;
use App\Lib\Slime\RestAction\ApiAction;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Uri\UriFactory;
use OAuth\Common\Storage\Memory;
use OAuth\ServiceFactory;

class Login extends ApiAction
{
    protected function performAction()
    {
        $uriFactory = new UriFactory();
        $currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
        $serviceFactory = new ServiceFactory();
        $facebookConfig = Config::get('authProvider.facebook');
        // Session storage
        $storage = new Memory();
        // Setup the credentials for the requests
        $credentials = new Credentials(
            $facebookConfig['id'],
            $facebookConfig['secret'],
            $currentUri->getAbsoluteUri() . '/callback'
        );
        $facebookService = $serviceFactory->createService('facebook', $credentials, $storage, ['email']);
        $url = $facebookService->getAuthorizationUri()->getAbsoluteUri();
        echo $url;
        exit;
    }
}