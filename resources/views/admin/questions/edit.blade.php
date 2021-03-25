@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12"><h2>Update Question</h2></div>
        <div class="col-md-12">
            <form action="{{ route('admin.questions.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Question Title</label>
                    <input type="text" class="form-control" id="title" name="question" value="{{$question->question}}">
                </div>
                <div class="form-group">
                    <label for="title">Select Answer:-</label>
                    <br/>
                    @foreach($answers as $answer)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="answers[]" value="{{ $answer->id }}" {{
                                $question->answers->contains($answer->id) ? 'checked' : '' }}>{{ $answer->answer }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="id" value="{{ $question->id }}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.questions.index') }}" class="btn btn-danger">Go Back</a>
            </form>
        </div>
    </div>
    </div>
</div>    
@endsection