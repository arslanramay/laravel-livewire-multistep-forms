@extends('components.layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Subscribers List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subscription Type</th>
                <th>Address</th>
                <th>Payment Details</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subscribers as $subscriber)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subscriber->name }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->phone }}</td>
                    <td>{{ ucfirst($subscriber->subscription_type) }}</td>
                    <td>
                        {{ $subscriber->address->address_line1 }},
                        {{ $subscriber->address->city }},
                        {{ $subscriber->address->state }},
                        {{ $subscriber->address->country }}
                    </td>
                    <td>
                        @if($subscriber->subscription_type === 'premium')
                            Card: **** **** **** {{ substr($subscriber->payment->card_number, -4) }}<br>
                            Expiry: {{ $subscriber->payment->expiry_date }}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No subscribers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection