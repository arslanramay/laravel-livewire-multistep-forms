<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::with('address', 'payment')->get(); // Load related address and payment data

        return view('subscribers-list', compact('subscribers'));
    }
}
