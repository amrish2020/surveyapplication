@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12"><h2>Update Survey</h2></div>
        <div class="col-md-12">
            <form action="{{ route('admin.surveys.update') }}" method="post">
                <div class="form-group">
                <label for="title">Survey Title</label>
                    <input type="text" class="form-control" id="title" name="survey" value="{{$survey->survey}}">
                </div>
                <div class="form-group">
                    <label for="title">Select Questions</label>
                    @foreach($questions as $question)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="questions[]" value="{{ $question->id }}" {{
                                $survey->questions->contains($question->id) ? 'checked' : '' }}>{{ $question->question }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="title">Survey Status</label>
                    <br/>
                    <select name="status">
                        <option value="active"  @if($survey->status === 'active') selected @endif >Active</option>
                        <option value="inactive" @if($survey->status === 'inactive') selected @endif>Inactive</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="{{ $survey->id }}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.surveys.index') }}" class="btn btn-danger">Go Back</a>
            </form>
        </div>
    </div>
    </div>
</div>    
@endsection