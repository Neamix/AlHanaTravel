<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function filter(Request $request)
    {
        return Booking::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 10);
    }

    public function status(Booking $booking,$status)
    {
        return $booking->changeBookingStatusTo($status);
    }

    public function getBooking(Booking $booking)
    {
        return $booking;
    }

    public function updateBooking(Request $request)
    {
        Booking::updateInstance($request);
    }
}
