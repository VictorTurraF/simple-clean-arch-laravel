<div>

    <ul>
        @foreach($sellers as $seller)
            <li>{{ $seller['name'] }}</li>
        @endforeach
    </ul>
</div>
