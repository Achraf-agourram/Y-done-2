<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function addBooking (StoreBookingRequest $request)
    {
        return [$request->hourToBook, $request->tables];
    }
}
