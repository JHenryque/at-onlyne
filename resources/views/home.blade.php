<x-layout-app title="Home">
    <div class="d-flex justify-content-center">

        @can('admin')Add commentMore actions
        <div class="text-center mt-5">O usuário que está logado e Admin</div>
        @else
            <div class="d-flex justify-content-center">
                <p class="text-center display-6 my-5 p-5 border border-primary rounded-4 shadow-sm"><i class="fa-solid fa-gear me-3"></i>RH MANGNT LAYOUT</p>
            </div>
        @endcan
        @php
            dump(auth()->user()->toArray())
        @endphp

    </div>

</x-layout-app>



