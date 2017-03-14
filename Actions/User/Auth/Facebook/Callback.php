<?php

namespace App\Actions\User\Auth\Facebook;

use App\Lib\Helpers\Config;
use App\Lib\Slime\RestAction\ApiAction;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Client\CurlClient;
use OAuth\Common\Storage\Memory;
use OAuth\ServiceFactory;

class Callback extends ApiAction
{
    /**
     *
     */
    protected function performAction()
    {
        $serviceFactory = new ServiceFactory();
        $serviceFactory->setHttpClient(new CurlClient());
        $facebookConfig = Config::get('authProvider.facebook');
        // Session storage
        $storage = new Memory();
        // Setup the credentials for the requests
        $credentials = new Credentials(
            $facebookConfig['id'],
            $facebookConfig['secret'],
            $facebookConfig['staticCallback']
        );


        $facebookService = $serviceFactory->createService('facebook', $credentials, $storage, ['email']);

        $params = $this->getQueryParams();
        $code = $params['code'];
        $facebookService->requestAccessToken($code);
        $this->payload = json_decode($facebookService->request('/me?fields=name,email'), true);

    }
}