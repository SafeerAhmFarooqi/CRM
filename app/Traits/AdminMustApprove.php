<?php

namespace App\Traits;

trait AdminMustApprove
{
    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
    */

    public function isShopApproved(): bool
    {
        return $this->status;
    }

    /**
     * Mark the given user as approved.
     *
     * @return bool
    */
   
    public function markShopAsApproved(): bool
    {
        return $this->forceFill([
            'status' => true,
        ])->save();
    }
}
