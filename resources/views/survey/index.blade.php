@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">

    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3>Survey list</h3>
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
                    <th scope="col">Created</th>
                    <th scope="col">Submitted Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surveys as $survey)
                <tr>
                    <th scope="row">{{ $survey['id'] }}</th>
                    <td>
                        {{ ucfirst($survey['survey']) }}
                    </td>
                    <td>{{ $survey['created_at'] }}</td>
                    <td>{{ $survey['rescreated'] }}</td>
                    <td>{{ ucfirst($survey['status']) }}</td>
                    <td>
                        @if($survey['status'] == 'completed')
                            <a class="btn btn-success" href="{{route('survey.results', ['id' => $survey['id']]) }}">View Result</a>
                        @else
                            <a class="btn btn-light" href="{{route('survey.take', ['id' => $survey['id']]) }}">Take</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection