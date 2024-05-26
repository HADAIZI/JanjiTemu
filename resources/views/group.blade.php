<!-- ===================================================================================== -->

<x-app-layout>
    <x-slot name="header">
        <div class="row justify-content-start">
            <div class="col-3 ms-5">
                <form class="d-flex" role="search" action="{{ route('group.search')}}" method="POST">
                    @csrf
                    <input class="form-control me-2 rounded" type="search" name="search" placeholder="Nama grup" aria-label="Search" style="border-color: rgba(0, 0, 0, 0.25);">
                    <button class="btn" style="background-color:#7879DF; color:white;" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </x-slot>
    @if($results->isEmpty())
                <h1>Tidak ada grup</h1>
    @else
    <!-- Part Your Group -->
    <div class="row">
        <div class="col-md-9 ms-5 mt-3 mb-3">
            <h2 class="h4">Grup Anda</h2 </div>
        </div>
    </div>
    <div class="grid gap-0 row-gap-3" id="group-card">
    @foreach($results as $result)
    
        <div class="card mb-3">
            {{-- <div class="position-relative">
                <img src="/img/event4.jpg" class="card-img-top rounded-circle img-thumbnail position-absolute start-0 top-0 ms-2 mt-2" alt="..." style="width: 70px; height: 70px; object-fit: cover;">
            </div> --}}
            <div class="card-body">
                <div class="ms-5">
                    <h3 class="card-title ms-4"><strong>{{ $result->g_name }}</strong></h3>
                    <p class="card-text ms-4">Jumlah Anggota: {{ $result->g_users }}</p>
                    <p class="card-text ms-4">Created At: {{date('d M Y', strtotime($result->created_at)) }}</p>
                </div>
                <div class="float-end">
                    <a href="{{ route('group.getgroupbyid', ['group_id' => $result->g_id]) }}" class="btn" style="text-decoration: underline; text-decoration-color: #7879DF; text-decoration-thickness: 1.5px; text-underline-offset: 10px; font-weight:700; color:#7879DF">Lihat grup</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif
    <br><br><br>
</x-app-layout>