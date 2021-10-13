<?php

/*
 * This file is part of ianm/oauth-amazon.
 *
 * Copyright (c) 2021 IanM.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace IanM\OAuthAmazon\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Luchianenco\OAuth2\Client\Provider\Amazon as AmazonProvider;

class Amazon extends Provider
{
    /**
     * @var AmazonProvider
     */
    protected $provider;

    public function name(): string
    {
        return 'amazon';
    }

    public function link(): string
    {
        return 'https://developer.amazon.com/docs/login-with-amazon/register-web.html';
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
        return $this->provider = new AmazonProvider([
            'clientId'     => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'redirectUri'  => $redirectUri
        ]);
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        $this->verifyEmail($email = $user->getEmail());

        $registration
            ->provideTrustedEmail($email)
            ->setPayload($user->toArray());
    }
}
