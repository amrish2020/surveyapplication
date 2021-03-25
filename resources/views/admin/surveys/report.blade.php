@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
    @include('partials.errors')
    <div class="row">
    <div class="col-md-12"><h2>Survey Report</h2></div>
        <div class="col-md-12">
            @php
            echo ' cnt : '.count($surveys);
            echo '<pre>';
            print_r($surveys[0]['questions']);
            echo '</pre>';
        //exit;
            @endphp
            <h3>{{$survey_name}}</h3>
            <div class="form-group">
                <label for="title">Select Questions</label>
                @for($i=0; $i < count($surveys); $i++)
                        @foreach($surveys[$i]['questions'] as $question_key =>$question_value)
                            <input type="hidden" id="{{$question_key}}" name="question{{ $question_key }}" value="{{$question_value}}">
                            <label for="question{{$question_key}}"><b>Question :  {!!  $question_value !!}</b></label>
                            <br/>
                            @php
                            print_r($surveys[$i]['answers']);
                            @endphp
                            
                            @if($surveys[$i]['answers'])    
                            <span><b>Selected Answer:-</b></span>
                                <div class="radio">
                                    @foreach($surveys[$i]['answers'][$question_key] as $answer_key =>$answer_value)
                                            <label for="question[{{ $question_key }}]">
                                                <input
                                                        type="radio"
                                                        name="question[{{ $question_key }}]"
                                                        value="{{ $answer_key }}"

                                                    @foreach($survey_results as $survey_result)

                                                        @if($survey_result['question_id'] == $question_key && $survey_result['answer_id'] == $answer_key )
                                                            checked="checked"
                                                        @endif

                                                        @endforeach
                                                disabled>
                                                    {{ $answer_value }}
                                            </label>
                                    @endforeach
                                </div>
                            @endif    
                        @endforeach
                    @endfor
            </div>
        </div>
    </div>
    </div>
</div>    
@endsection