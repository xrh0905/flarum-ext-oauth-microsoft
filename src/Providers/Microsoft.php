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

use Flarum\Extend\Console;
use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Stevenmaguire\OAuth2\Client\Provider\Microsoft as MicrosoftProvider;
use Stevenmaguire\OAuth2\Client\Provider\MicrosoftResourceOwner;

class Microsoft extends Provider
{
    /**
     * @var MicrosoftProvider
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
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new MicrosoftProvider([
            'clientId'     => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'redirectUri'  => $redirectUri,
        ]);
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        /** @var MicrosoftResourceOwner $user */
        $this->verifyEmail($email = $user->getEmail());

        $registration
            ->provideTrustedEmail($email)
            ->suggestUsername(str_replace(' ', '', trim($user->getName())))
            ->setPayload($user->toArray());
    }
}
