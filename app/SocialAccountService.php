<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Facades\Session;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password'=>bcrypt(str_random()),
                ]);
                $userInfo = Userinfo::create([
                    'user_id' => $user->id
                    ]);
                Session::flash('registerSuccess', 'फेसबुक बाट एकाउण्ट खोल्नु भएकोमा बधाई सहित धन्यबाद ! तपाइले आफ्नो प्रोफाइलमा फोटो र अन्य बिवरण थप्न सक्नुहुन्छ l');
                        
                    }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}