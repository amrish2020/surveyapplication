@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12"><h2>Add Survey</h2></div>
        <div class="col-md-12">
            <form action="{{ route('admin.surveys.create') }}" method="post">
                <div class="form-group">
                    <label for="title">Survey Title</label>
                    <input type="text" class="form-control" id="survey" name="survey">
                    <input type="hidden" id="user_id" name="user_id" value="{{$userID}}">
                </div>
                <div class="form-group">
                    <label for="title">Select Questions</label>
                    @foreach($questions as $question)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="questions[]" value="{{ $question->id }}">{{ $question->question }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="title">Survey Status</label>
                    <br/>
                    <select name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.surveys.index') }}" class="btn btn-danger">Go Back</a>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
