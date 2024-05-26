<x-app-layout>
    <x-slot name="header">
        <div class="row justify-content-start">
            <div class="col-3 ms-5">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 rounded" type="search" placeholder="Nama event" aria-label="Search" style="border-color: rgba(0, 0, 0, 0.25);">
                    <button class="btn" style="background-color:#7879DF; color:white;" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </x-slot>
    @if($results->isEmpty())
    <h1>Tidak ada grup</h1>
    @else
    <div class="grid gap-0 row-gap-3" id="group-event-card">
    @foreach($results as $result)
        <div class="card position-relative" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/event4.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="#">Autumn Party</a></h5>
                        <p class="card-text">Hosted by: Weather Indonesia</p>
                        <p><i class="bi bi-calendar4-event"></i> Minggu, 15 OCT 2023 - 9:00 WIB</p>
                        <h6><i class="bi bi-ticket-perforated"></i> FREE</h6>
                        <div class="position-absolute bottom-0 end-0 mb-3 me-3">
                            <button href="#" class="btn btn-primary" style="color:white;"><i class="bi bi-list"></i>
                                Detail Event</button>
                            <button href="#" class="btn btn-danger" style="color:white"><i class="bi bi-x-circle"></i>
                                Batalkan
                                Reservasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif
    <br><br><br>
</x-app-layout>