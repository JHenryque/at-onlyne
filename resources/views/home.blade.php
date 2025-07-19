<x-layout-app title="Home">
    <div class="w-100 p-4">

        <h1>Home</h1>

    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card p-5 text-center">
                <p>Welcome, <strong>{{ auth()->user()->name }}</strong>!</p>
            </div>
        </div>
    </div>

</x-layout-app>



