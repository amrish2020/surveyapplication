@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
    <div class="row">
        <div class="col-md-8">
            <h2>Questions list</h2>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.questions.create') }}" class="btn btn-success">New Question</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Answer Type</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <th scope="row">{{ $question['id'] }}</th>
                    <td>
                        {{ ucfirst($question->question) }}
                    </td>
                    <td>
                        @if($answers)
                        <ul class="list-unstyled">
                            @foreach($answers as $answer)
                                @if($question->answers->contains($answer->id)) <li>{{ $answer->answer }}</li> @else {{''}} @endif
                            @endforeach
                        </ul>
                        @endif
                    </td>
                    <td>{{ $question['created_at'] }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.questions.edit', ['id' => $question->id]) }}">Edit</a>
                        &nbsp;
                        <a class="btn btn-danger" href="{{ route('admin.questions.delete', ['id' => $question->id]) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>    
@endsection