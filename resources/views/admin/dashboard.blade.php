@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
@stop

@section('js')
    <script>
        window.onload = function () {
            const deleteBtns = document.getElementsByClassName('delete-btn');
            if (!deleteBtns.length) {
                return false;
            }
            for (const i in deleteBtns) {
                deleteBtns[i].onclick = function (event) {
                    event.preventDefault();
                    const form = this.parentElement;
                    if (confirm(this.getAttribute('data-msg'))) {
                        form.submit();
                    }
                }
            }
            return true;
        }
    </script>
@stop
