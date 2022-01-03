
@extends('pdf.layout')

@section('content')
    <strong>DATOS DEL CLIENTE</strong>
    <br>

    @foreach($customers as $customer)
        <ul>
            <li>
                <strong>Nombre: </strong>
                <a>{{$customer->getName()}}</a>
            </li>
            <li>
                <strong>Apellido: </strong>
                <a>{{$customer->getSurname()}}</a>
            </li>
            <li>
                <strong>Email: </strong>
                <a>{{$customer->getUser()->getEmail()}}</a>
            </li>
            <li>
                <strong>Perfil: </strong>
                <a>{{$customer->getUser()->getProfileId() == 1 ? 'ADMIN' : 'CUSTOMER'}}</a>
            </li>
            <li>
                <strong>Hobbies: </strong>
                @foreach($customer->getHobbies() as $hobbie)
                    <a>{{$hobbie->getHobbie()->getName()}}</a>
                @endforeach
            </li>

        </ul>
    @endforeach

    {{ $customers->links() }}

@endsection



