@inject('cats', 'App\Services\CatsService')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>All types</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($cats->get() as $type)
                        <li class="list-group-item">
                            <div class="list-table cats">
                                <div class="list-table__content">
                                    <a href="{{route('show-cats-drinks', $type)}}">
                                    <h3>
                                    @if($type->is_alk)
                                    <div class="alk">
                                        <svg>
                                            <use xlink:href="#glass"></use>
                                        </svg>
                                    </div>
                                    @endif
                                    {{$type->title}}
                                    <div class="count">[{{$type->typeDrinks()->count()}}]</div>
                                    </h3>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No types yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>