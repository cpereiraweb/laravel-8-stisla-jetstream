<?php

namespace App\Observers;

use App\Models\Device;

class DeviceObserver
{
    /**
     * Handle the Device "created" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function created(Device $device)
    {

    }
    /**
     * Handle the Device "creating" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function creating(Device $device)
    {
        /* $token = auth()->user()->createToken("iot-{$device->id}", ["read","create","update"]);
        $device->api_token = $token->plainTextToken;
        info(sprintf("created: %s", $device->id)); */
    }

    /**
     * Handle the Device "saving" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function updated(Device $device)
    {
        /* info(sprintf("updated: %s", $device->id)); */
    }

    /**
     * Handle the Device "updating" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function updating(Device $device)
    {
        /* info(sprintf("updating: %s", $device->id)); */
    }

    /**
     * Handle the Device "saving" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function saving(Device $device)
    {
        /* info(sprintf("saving: %s", $device->id)); */
    }

    /**
     * Handle the Device "saved" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function saved(Device $device)
    {
        /* info(sprintf("saved: %s", $device->id)); */
    }

    /**
     * Handle the Device "deleted" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function deleted(Device $device)
    {
        //
    }

    /**
     * Handle the Device "restored" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function restored(Device $device)
    {
        //
    }

    /**
     * Handle the Device "force deleted" event.
     *
     * @param  \App\Models\Device  $device
     * @return void
     */
    public function forceDeleted(Device $device)
    {
        //
    }
}
