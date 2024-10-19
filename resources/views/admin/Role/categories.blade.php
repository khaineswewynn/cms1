@extends('layout.master')
@section('content')
<div id="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Add New Category</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('categories.restore')}}" class="btn btn-primary">Restore All</a>
            </div>
        </div>
        <div class="row mt-3">
            @if ($message=Session::get('success'))
            <span class="alert alert-success d-block w-100">{{$message}}</span>
            @endif
            
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Parent Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($categories as $category)
                       <tr>
                        <td>{{++$i}}</td>
                        <td>{{$category->name}}</td>
                        @if($category->parent==null)
                        <td>-</td>
                        @else
                        <td>{{$category->parent->name}}</td>
                        @endif
                        <td data-url="{{route('categories.destroy',$category->id)}}"><a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning me-2">Edit</a>
                        <button class="btn btn-danger btn-delete">Delete</button>
                        </td>
                       </tr>
                       @empty
                       <tr>
                       <td colspan="4"><span class="text-danger">No category data</span></td>
                       </tr>
                       
                       @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        {{$categories->links()}}
    </div>

</div>

@endsection