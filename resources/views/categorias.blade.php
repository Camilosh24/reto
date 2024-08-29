@extends('welcome')

@section('content')
    @livewire('CrudCategoria')

    @if (session()->has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('message') }}',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif
@endsection