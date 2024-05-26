<!-- createevent.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h1 class="h3">Buat event baru disini!</h1>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-1">

                    <div class="card-header">Data Event</div>

                    <div class="card-body">
                        <form action="{{ route('event.store', ['group_id' => $group_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="e_name" class="form-label">Nama Event</label>
                                <input type="text" class="form-control rounded custom-border" id="e_name" name="e_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="e_description" class="form-label">Deskripsi Event</label>
                                <textarea class="form-control" id="e_description" name="e_description" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="e_place" class="form-label">Tempat atau Lokasi Event</label>
                                <input type="text" class="form-control rounded custom-border" id="e_place" name="e_place" required>
                            </div>

                            <div class="mb-3">
                                <label for="e_image" class="form-label">Poster Event</label>
                                <input type="file" class="form-control rounded custom-border custom-height" id="e_image" name="e_image" accept="image/*" required>

                            </div>

                            <div class="mb-3">
                                <label for="e_date" class="form-label">Tanggal Pelaksanaan Event</label>
                                <input type="date" class="form-control rounded custom-border" id="e_date" name="e_date" required>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary custom-btn">Create Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col mt-5">
                <img src="/img/friends-party-no.png" alt="">
            </div>
        </div>
    </div>
    <br><br>
</x-app-layout>