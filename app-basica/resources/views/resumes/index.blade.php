@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Titulos</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resumes as $resume)
            <tr>
                <th scope="row">{{ $resume->id }}</th>
                <td>
                    <a href="{{ route('resumes.show',$resume->id) }}">
                        {{ $resume->title }}
                    </a>
                </td>
                <td>
                    <div class="d-flex justify-content-end">
                        <div>
                            <a href="{{ route('resumes.edit',$resume->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                        </div>
                        <div class="ml-2">
                            <a href="{{ route('resumes.destroy',$resume->id) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
