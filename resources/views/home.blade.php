
<x-layout-app title="Home">
<div>
    <h3>Dados do Admin:</h3>Add commentMore actions
    <p>Nome: {{ $admin->name }}</p>
    <p>Email: {{ $admin->email }}</p>
    <p>Perfil: {{ $admin->role }}</p>
    <p>Permissões</p>
    <ul>
        @foreach(json_decode($admin->permissions) as $permission)
            <li>{{ $permission }}</li>
        @endforeach
    </ul>
    <h3>Detalhes</h3>
    <p>Endereco: {{$admin->userAddress->address }}</p>
    <p>N°: {{ $admin->userAddress->number }}</p>
    <p>Cidade: {{ $admin->userAddress->cidade }}</p>
</div>
</x-layout-app>


