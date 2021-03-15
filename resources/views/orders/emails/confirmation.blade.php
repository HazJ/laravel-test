@component('mail::message')
An order was placed by {{ $order->contact->first_name }} {{ $order->contact->last_name }}. The order reference is #{{ $order->uuid }}.

<ul>
    @foreach ($order->items as $item)
        <li>{{ $item->item }}</li>
    @endforeach
</ul>
@endcomponent
