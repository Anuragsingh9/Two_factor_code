@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    
                  </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
