<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification) {
        // Marcar la notificacion como leída
        $notification->markAsRead();
        // Regresar a la página previa
        return back();
    }
}
