@extends('layouts.main')

@section('content')
    <label for="proxies">Enter proxies via new line (IP:PORT)</label>
    <form action="{{ route('check') }}" method="POST">
        @csrf
        <textarea id="proxies" name="proxies" cols="30" rows="10"></textarea>
        <input type="submit" value="Push">
    </form>
@endsection