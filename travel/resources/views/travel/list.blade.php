<ul class="list-group">
    @forelse($travels as $travel)
    <li class="list-group-item">
        <div class="flex-row">
            <div>
                {{$travel->country}}
                <i>{{$travel->hotel}}</i>
            </div>
            <div class="js--form">
                <button type="button" class="btn btn-outline-secondary" data-url="{{route('travel-delete', $travel)}}" data-method="delete">
                    delete
                </button>
            </div>
        </div>
    </li>
    @empty
    <li class="list-group-item">No travels yet</li>
    @endforelse
</ul>
