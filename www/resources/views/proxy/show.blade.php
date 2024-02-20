@extends('layouts.main')

@section('content')
    <table border='1'>
        <tr>
            <th>IP</th>
            <th>Type</th>
            <th>Status</th>
            <th>Country</th>
            <th>City</th>
        </tr>
        @foreach ($proxies as $proxy)
            <tr>
                <td>{{ $proxy['ip'] }}</td>
                <td>{{ $proxy['type'] }}</td>
                <td>{{ $proxy['status'] }}</td>
                <td>{{ $proxy['country'] }}</td>
                <td>{{ $proxy['city'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection