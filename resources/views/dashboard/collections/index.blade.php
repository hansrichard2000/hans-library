@extends('dashboard.layouts.main')

@section('title')
    Manajemen Koleksi | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Manajemen Koleksi</h1>
        <a href="{{route('collections.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-md p-3 me-4"><i
                    class="bi bi-file-plus"></i> Tambah Koleksi</button></a>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Collection Name</th>
                    <th scope="col">Author</th>
                    {{--                <th scope="col">Publisher</th>--}}
                    <th scope="col">Publish Year</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $index = 1 @endphp
                @foreach ($collections as $collection)
                    <tr>
                        {{--                    <th scope="row">{{ $index }}</th>--}}
                        <td>{{ $collection['collectionCode'] }}</td>
                        <td>{{ $collection['collectionName'] }}</td>
                        <td>{{ $collection['collectionAuthor'] }}</td>
                        {{--                    <td>{{ $collection['collectionPublisher'] }}</td>--}}
                        <td>{{ $collection['collectionPublishYear'] }}</td>
                        <td>{{ $collection->collectionType->collectionTypeName }}</td>
                        @if($collection->collectionStatusID == 1)
                            <td class="text-success">{{ $collection->collectionStatus->collectionStatusName }}</td>
                        @elseif($collection->collectionStatusID == 2)
                            <td class="text-danger">{{ $collection->collectionStatus->collectionStatusName }}</td>
                        @else
                            <td class="text-info">{{ $collection->collectionStatus->collectionStatusName }}</td>
                        @endif
                        {{--                    <td>--}}
                        {{--                        <a href="{{ route('courses.show', $project->course->course_code) }}">--}}
                        {{--                            {{ $project->course->course_name }}--}}
                        {{--                        </a>--}}
                        {{--                    </td>--}}
                        <td class="text-center">

                            <form action="{{ route('collections.destroy', $collection->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('collections.show', $collection->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('collections.edit', $collection) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
