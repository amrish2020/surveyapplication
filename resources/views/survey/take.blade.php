@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ ucfirst($survey_name) }}</h2>
            <hr/>
            <form action="{{ route('survey.create') }}" method="post">
                <input type="hidden" name="user_id" id="user_id" value="{{ $userID }}">
                <input type="hidden" name="survey_id" id="survey_id" value="{{ $survey_id }}">
                <div class="form-group">

                    @for($i=0; $i < count($surveys); $i++)

                        @foreach($surveys[$i]['questions'] as $question_key =>$question_value)
                            <input type="hidden" id="{{$question_key}}" name="question{{ $question_key }}" value="{{$question_value}}">

                            <label for="question{{$question_key}}"><b>Question :  {!!  $question_value !!}</b></label>
                            <br/>
                            @if($surveys[$i])
                                <span><b>Select Answer:-</b></span>
                                <div class="radio">
                                    @foreach($surveys[$i]['answers'][$question_key] as $answer_key =>$answer_value)
                                        <label>
                                            <input type="radio" name="question[{{ $question_key }}]" value="{{ $answer_key }}" required>{{ $answer_value }}
                                        </label>
                                    @endforeach
                                </div>
                            @endif    
                            <br/>
                        @endforeach

                    @endfor
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('survey.index') }}" class="btn btn-danger">Go Back</a>
            </form>
        </div>
    </div>
    </div>
</div>    
@endsection