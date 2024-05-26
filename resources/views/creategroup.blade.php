<x-app-layout>
    <x-slot name="header">
        <h1 class="h3">Ayo buat grup baru milikmu!</h1>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-1">
                    <div class="card-header">Data Grup</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('group.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="mb-3">Nama Grup :</label>
                                <input type="text" name="name" id="name" class="form-control rounded custom-border" required>
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="description" class="mb-3">Deskripsi Grup :</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary mt-3 custom-btn">
                                    Buat Grup
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="text-center mt-5">
                    <img src="/img/friends-joyce-no.png">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>