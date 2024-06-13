@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
           <h3>Data Polyline</h3>
        </div>
        <div class="card-body">
            <div class="mb-3"></div> <!-- Memberikan jarak ke bawah -->
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>

                @php $no = 1 @endphp
                @foreach ($polylines as $p)
                    @php
                        $geometry = json_decode($p->geom);
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->description }}</td>
                        <td>{{ date_format($p->created_at, 'D, d M Y, H:i:s') }}</td>
                        <td>{{ date_format($p->updated_at, 'D, d M Y, H:i:s') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3"></div> <!-- Memberikan jarak ke atas -->
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('script')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#example');
</script>
@endsection
