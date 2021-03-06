@extends('adminlte::page')

@section('title')

@section('content')
    <div class="container pb-4" style="max-width: 800px">
        <div class="card bg-dark" style="border-top: 5px solid var(--danger)">
            <div class="card-header h5"><i class="fa fa-file-alt"></i> Exam Upload</div>
            <div class="card-body">
                @include('partials.alerts')
                 <form action="{{route('exams.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="border px-4 py-2 mb-3 rounded">
                                <div class="form-group">
                                    <label for="exam">Add Exam (doc)</label>
                                    <input type="file" name="examfile" id="exam"
                                    class="form-control border-0 pl-0">
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="title" id="title" placeholder="Exam Title"
                                class="form-control">
                            </div>
                        </div>                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="author" id="subject" placeholder="Exam Author"
                                class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="info" id="info" class="form-control" placeholder="Exam Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Exam Year</label>
                        <input type="number" name="year" id="year" class="form-control">


                    </div>

                    <button type="submit" name="upload" class="btn bg-danger btn-block">Upload Exam</button>
                </form>
            </div>
        </div>
    </div>

@endsection
