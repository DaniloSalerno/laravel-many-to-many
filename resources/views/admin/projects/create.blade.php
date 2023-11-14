@extends('layouts.admin')

@section('content')

<section class="create col-10 mx-auto">

    <div class="container">

        <div class="py-4">
            <h2 class="text-muted text-uppercase">Add a new Project</h2>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action=" {{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId" value="{{old('title')}}" required>
                        <small id="titleHelper" class="text-muted">Type a title of Project</small>
                        @error('title')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>
                </div>
                <!-- /.col -->

                <div class="col">
                    <div>
                        <label for="thumb" class="form-label">Image</label>
                        <input type="file" name="thumb" id="thumb" class="form-control @error('content') is-invalid @enderror" placeholder="" aria-describedby="helpId" required>
                        <small id="imageHelper" class="text-muted">Upload an image</small>
                        @error('thumb')
                        <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>

                </div>
                <!-- /.col -->

                <div class="col">
                        <label for="type_id" class="form-label">Types</label>

                        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                            <option selected disabled>Select a Type</option>
                            <option value="">Untyped</option>
                            @forelse($types as $type)
                                <option value=" {{$type->id}} " {{$type->id == old('type_id') ? 'selected' : ''}} >{{$type->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        @error('type_id')
                        <div class="text-danger"> {{$message}} </div>
                        @enderror
                </div>
                <!-- /.col -->

                <div class="col">
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5" placeholder="Type a description" required>{{old('description')}}</textarea>
                        @error('description')
                        <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>

                </div>
                <!-- /.col -->

                <div class="col">
                    <div>
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="5" placeholder="Type a content" required>{{old('content')}}</textarea>
                        @error('content')
                        <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>

                </div>
                <!-- /.col -->

                <div class="col">
                    <div>
                        <label for="project_url" class="form-label">Project Url</label>
                        <input type="url" name="project_url" id="project_url" class="form-control @error('project_url') is-invalid @enderror" placeholder="" aria-describedby="helpId" value="{{old('project_url')}}">
                        <small id="project_urlHelper" class="text-muted">Type a Project Url</small>
                        @error('project_url')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>

                </div>
                <!-- /.col -->

                <div class="col">
                    <div>
                        <label for="git_url" class="form-label">Git Url</label>
                        <input type="url" name="git_url" id="git_url" class="form-control @error('git_url') is-invalid @enderror" placeholder="" aria-describedby="helpId" value="{{old('git_url')}}">
                        <small id="git_urlHelper" class="text-muted">Type a Project git Url</small>
                        @error('git_url')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>

                </div>
                <!-- /.col -->
            </div>
            
            <div class="py-4">
                <a class="text-decoration-none btn btn-primary" href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-left-long"></i>
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
    
        </form>
    </div>
</section>


@endsection