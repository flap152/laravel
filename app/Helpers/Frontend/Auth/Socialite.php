<?php

namespace App\Helpers\Frontend\Auth;

/**
 * Class Socialite.
 */
class Socialite
{
    /**
     * Generates social login links based on what is enabled.
     *
     * @return string
     */
    public function getSocialLinks()
    {
        $socialite_enable = [];
        $socialite_links = '';

        if (config('services.google.client_id')) {
            $socialite_enable[] = "<a href='/login/google'><i class='fa fa-google fa-2x'></i></a>";
        }

        for ($i = 0; $i < count($socialite_enable); $i++) {
            $socialite_links .= $socialite_enable[$i];
        }

        return $socialite_links;
    }

    /**
     * List of the accepted third party provider types to login with.
     *
     * @return array
     */
    public function getAcceptedProviders()
    {
        return [
            'bitbucket',
            'facebook',
            'google',
            'github',
            'linkedin',
            'twitter',
        ];
    }
}
