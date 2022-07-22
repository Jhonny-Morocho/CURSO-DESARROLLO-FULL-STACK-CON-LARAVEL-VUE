@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Resume</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('resumes.update',$resume->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">
                                Title
                            </label>
                            <div class="col-md-6">
                                <input 
                                    id="title" 
                                    type="text" 
                                    class="form-control 
                                    @error('title') is-invalid 
                                    @enderror" 
                                    name="title" 
                                    value="{{ old('title') ?? $resume->title }}" 
                                    required 
                                    autocomplete="title" 
                                    autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                Name
                            </label>
                            <div class="col-md-6">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control 
                                    @error('name') is-invalid 
                                    @enderror" 
                                    name="name" 
                                    value="{{ old('name') ?? $resume->name}}" 
                                    autocomplete="name" 
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                Email
                            </label>
                            <div class="col-md-6">
                                <input 
                                    id="email" 
                                    type="text" 
                                    class="form-control 
                                    @error('email') is-invalid 
                                    @enderror" 
                                    name="email" 
                                    value="{{ old('email')?? $resume->email }}" 
                                    autocomplete="email" 
                                    autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Website" class="col-md-4 col-form-label text-md-end">
                                Website
                            </label>
                            <div class="col-md-6">
                                <input 
                                    id="website" 
                                    type="text" 
                                    class="form-control 
                                    @error('website') is-invalid 
                                    @enderror" 
                                    name="website" 
                                    value="{{ old('website')?? $resume->website }}" 
                                    autocomplete="website" 
                                    autofocus>
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="picture" class="col-md-4 col-form-label text-md-end">
                                Picture
                            </label>
                            <div class="col-md-6">
                                <input 
                                    id="picture" 
                                    type="file" 
                                    class="form-control 
                                    @error('picture') is-invalid 
                                    @enderror" 
                                    name="picture" 
                                    value="{{ old('picture') }}" 
                                    autocomplete="picture" 
                                    autofocus>
                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 col-form-label text-md-end">
                                Abaut
                            </label>
                            <div class="col-md-6">
                                <textarea 
                                    id="about" 
                                    type="text" 
                                    class="form-control 
                                    @error('about') is-invalid 
                                    @enderror" 
                                    name="about" 
                                    value="{{ old('about')?? $resume->about }}" 
                                    autocomplete="about" 
                                    autofocus>
                                </textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
