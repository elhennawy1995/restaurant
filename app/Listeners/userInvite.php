<?php

namespace App\Listeners;

use App\Events\junaidnasir\larainvite\invited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class userInvite
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  invited  $event
     * @return void
     */
    public function handle($invitation)
    {
        \Mail::queue('invitations.emailBody', $invitation, function ($m) use ($invitation) {
            $m->from('From Address', 'Your App Name');
            $m->to($invitation->email);
            $m->subject("You have been invited by ". $invitation->user->name);
        });
    }
}
