@extends('dashboard.layouts.main')

@section('title')
    Tambah Koleksi | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Koleksi Baru</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="{{route('collections.store')}}" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="collectionName" class="form-label">Judul Koleksi</label>
                <input type="text" class="form-control @error('collectionName') is-invalid @enderror" id="collectionName" name="collectionName"
                       required autofocus value="{{ old('collectionName') }}">
                @error('collectionName')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="collectionCode" class="form-label">Kode Koleksi</label>
                <input type="text" class="form-control @error('collectionCode') is-invalid @enderror" id="collectionCode" name="collectionCode"
                       required value="{{ old('collectionCode') }}">
                @error('collectionCode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="collectionAuthor" class="form-label">Author</label>
                <input type="text" class="form-control @error('collectionAuthor') is-invalid @enderror" id="collectionAuthor" name="collectionAuthor"
                       required value="{{ old('collectionAuthor') }}">
                @error('collectionAuthor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="row row-cols-2">
                <div class="col">
                    <div class="form-group">
                        <label for="collectionPublisher" class="form-label">Publisher</label>
                        <input type="text" class="form-control @error('collectionPublisher') is-invalid @enderror" id="collectionPublisher" name="collectionPublisher"
                               required value="{{ old('collectionPublisher') }}">
                        @error('collectionPublisher')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="collectionPublishYear" class="form-label">Publish Year</label>
                        <input type="number" class="form-control @error('collectionPublishYear') is-invalid @enderror" id="collectionPublishYear" name="collectionPublishYear"
                               required value="{{ old('collectionPublishYear') }}">
                        @error('collectionPublishYear')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="collectionType" class="form-label">Tipe Koleksi</label>
                <select class="form-select" name="collectionType">
                    @foreach ($collectionTypes as $collectionType)
                        @if (old('collectionType') === $collectionType->id)
                            <option value="{{ $collectionType->id }}" selected>{{ $collectionType->collectionTypeName }}</option>
                        @else
                            <option value="{{ $collectionType->id }}">{{ $collectionType->collectionTypeName }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="collectionImage" class="form-label">Unduh Gambar Koleksi</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('collectionImage') is-invalid @enderror" type="file" id="collectionImage" name="collectionImage" onchange="previewImage()">
                @error('collectionImage')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="collectionDesc" class="form-label">Deskripsi</label>
                @error('collectionDesc')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="collectionDesc" type="hidden" name="collectionDesc" value="{{ old('collectionDesc') }}">
                <trix-editor input="collectionDesc"></trix-editor>
            </div>

            <button type="submit" class="btn btn-dark bg-gradient">Submit</button>
        </form>
    </div>

    <script>
        function previewImage(){
            const image = document.querySelector('#collectionImage');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
