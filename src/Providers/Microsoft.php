<?php

/*
 * This file is based on ianm/oauth-amazon.
 *
 * Copyright (c) 2021 IanM.
 *
 *  For the full copyright and license information, please view the LICENSE.md
 *  file that was distributed with this source code.
 */

namespace xrh0905\OAuthMicrosoft\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use TheNetworg\OAuth2\Client\Provider\Azure;
use TheNetworg\OAuth2\Client\Provider\AzureResourceOwner;

class Microsoft extends Provider
{
    /**
     * @var Azure
     */
    protected $provider;

    public function name(): string
    {
        return 'microsoft';
    }

    public function link(): string
    {
        return 'https://learn.microsoft.com/azure/active-directory/develop/v2-oauth2-auth-code-flow';
    }

    public function fields(): array
    {
        return [
            'client_id'     => 'required',
            'client_secret' => 'required',
            'tenant'        => 'nullable',
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        $provider = new Azure([
            'clientId'               => $this->getSetting('client_id'),
            'clientSecret'           => $this->getSetting('client_secret'),
            'redirectUri'            => $redirectUri,
            'defaultEndPointVersion' => Azure::ENDPOINT_VERSION_2_0,
            'scopes'                 => ['openid', 'profile', 'email'],
            'tenant'                 => $this->getSetting('tenant') ?: 'common',
        ]);

        return $this->provider = $provider;
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        /** @var AzureResourceOwner $user */
        $email = $user->getEmail();
        $this->verifyEmail($email);

        $registration
            ->provideTrustedEmail($email)
            ->suggestUsername($user->getPreferredUsername())
            ->setPayload($user->toArray());
    }
}
