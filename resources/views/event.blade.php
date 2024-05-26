<x-app-layout>
    <x-slot name="header">
        <div class="row justify-content-start">
            <div class="col-3 ms-5">
                <form class="d-flex" role="search" action="{{ route('event.search')}}" method="POST">
                    @csrf
                    <input class="form-control me-2 rounded" type="search" name="search" placeholder="Nama event" aria-label="Search" style="border-color: rgba(0, 0, 0, 0.25);">
                    <button class="btn" style="background-color:#7879DF; color:white;" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </x-slot>
    @if($results->isEmpty())
        <h1>Tidak Ada Event</h1>
    @else
    <div class="grid gap-0 row-gap-3" id="group-event-card">
    @foreach($results as $result)
        <div class="card" style="width: 18rem; border: none; background-color: rgba(151,202,209,.08);">
            <img src="{{ asset(str_replace('public', 'storage', $result->e_image)) }}" widht="500px" height="200px" class="card-img-top" alt="Event Image">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                        {{ $result->e_name }}
                    </a>
                </h5>
                <p class="card-text">Hosted by: {{ $result->g_name }}</p>
                <p class="card-text">Place: {{ $result->e_place }}</p>
                <p><i class="bi bi-calendar4-event"></i> {{date('d M Y', strtotime($result->e_date))}}</p>
                <h6><i class="bi bi-ticket-perforated"></i> FREE</h6>
                <div class="float-end">
                    <a href="{{ route('event.joinevent', ['group_id' => $result->g_id, 'event_id' => $result->e_id]) }}" class="btn" style="text-decoration: underline; text-decoration-color: #7879DF; text-decoration-thickness: 1.5px; text-underline-offset: 10px; font-weight:700; color:#7879DF">Daftar sekarang</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif
    <br><br><br>
</x-app-layout>