<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php $i=1; @endphp
        @foreach ($slider as $item)
            <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                @php $i++ @endphp
                <a href="{{ $item->link }}">
                    <img src="{{ asset('assets/uploads/slider/' . $item->image) }}" class="d-block w-100"
                        alt="Slider Image">
                </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
