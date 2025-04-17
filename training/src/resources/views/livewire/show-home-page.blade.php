<main>
    <section class="section">
        <div class="container">
            @foreach ($menuItems as $menuItem)
                @if ($menuItem->services->isNotEmpty())
                    <h2 class="text-center mb-5">{{ $menuItem->title }}</h2>
                    <div class="row justify-content-center mb-5">
                        @foreach ($menuItem->services as $service)
                            <div class="icon-box-item text-center col-lg-4 col-md-6 mb-4">
                                <div class="rounded shadow py-5 px-4">
                                    <img src="{{ asset('storage/' . $service->image) }}"
                                         alt="{{ $service->title }}"
                                         style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.5rem;"
                                         class="mb-4">

                                    <h3 class="mb-3">{{ $service->title }}</h3>
                                    <p class="mb-4">{{ $service->detail }}</p>
                                    <a class="btn btn-sm btn-outline-primary" href="{{ $service->url }}">
                                        View Details <i class="las la-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </section>
</main>
