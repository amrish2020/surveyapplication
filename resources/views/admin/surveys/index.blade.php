@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
    <div class="row">
        <div class="col-md-8">
            <h2>Survey list</h2>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.surveys.create') }}" class="btn btn-success">New Survey</a>
        </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-md-12">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Active</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Inactive</a>
        </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Total Question</th>
                        <th scope="col">Created</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys as $survey)
                        @if($survey['status'] == 'active')
                        <tr>
                            <th scope="row">{{ $survey['id'] }}</th>
                            <td>
                                {{ ucfirst($survey['survey']) }}
                            </td>
                            <td>{{count($questions)}}</td>
                            <td>{{ $survey['created_at'] }}</td>
                            <td>{{ ucfirst($survey['status']) }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('admin.surveys.report', ['id' => $survey->id]) }}">View Report</a>
                                &nbsp;
                                <a class="btn btn-primary" href="{{route('admin.surveys.edit', ['id' => $survey->id]) }}">Edit</a>
                                &nbsp;
                                <a class="btn btn-danger" href="{{route('admin.surveys.delete', ['id' => $survey->id]) }}">Delete</a>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="6">
                                <p>No record found</p>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Total Question</th>
                        <th scope="col">Created</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys as $survey)
                        @if($survey['status'] == 'inactive')
                        <tr>
                            <th scope="row">{{ $survey['id'] }}</th>
                            <td>
                                {{ ucfirst($survey['survey']) }}
                            </td>
                            <td>{{count($questions)}}</td>
                            <td>{{ $survey['created_at'] }}</td>
                            <td>{{ ucfirst($survey['status']) }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('admin.surveys.report', ['id' => $survey->id]) }}">View Report</a>
                                &nbsp;
                                <a class="btn btn-primary" href="{{route('admin.surveys.edit', ['id' => $survey->id]) }}">Edit</a>
                                &nbsp;
                                <a class="btn btn-danger" href="{{route('admin.surveys.delete', ['id' => $survey->id]) }}">Delete</a>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="6">
                                <p>No record found</p>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
	</div>		
        
        
    
    </div>
</div>    
@endsection