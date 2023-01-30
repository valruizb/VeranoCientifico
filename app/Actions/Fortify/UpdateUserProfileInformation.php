<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use App\Models\Tematicas;
use App\Models\Subtematicas;
use App\Models\Instituciones;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */

    public function update($user, array $input)
    {
        
        Validator::make($input, [
            'name' => ['nullable', 'string', 'max:255'],
            'lastnamep' => ['nullable', 'string', 'max:255'],
            'lastnamem' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'institution_id' => ['nullable', 'string', 'max:255'],
            'thematic_id' => ['nullable', 'string', 'max:255'],
            'subthematic_id' => ['nullable', 'string', 'max:255'],
            'job' => ['nullable', 'string', 'max:255'],
            'snilevel' => ['nullable', 'string', 'max:255'],
            'invline' => ['nullable', 'email', 'max:255'],
            'maxgrade' => ['nullable', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'lastnamep' => $input['lastnamep'],
            'lastnamem' => $input['lastnamem'],
            'phone' => $input['phone'],
            'institution_id' => $input['institution_id'],
            'thematic_id' => $input['thematic_id'],
            'subthematic_id' => $input['subthematic_id'],
            'job' => $input['job'],
            'snilevel' => $input['snilevel'],
            'invline' => $input['invline'],
            'maxgrade' => $input['maxgrade'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
