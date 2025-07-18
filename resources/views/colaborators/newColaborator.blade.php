
<x-layout-app title="New RH Colaborator">

    <div class="w-100 p-4">

        <div class="container-fluid">
            <div class="row">
                <div class="col-4">

                    <h3>New Human Resources Colaboratos</h3>

                    <hr>

                    <form action="{{ route('colaborators.create') }}" method="post">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="select_department" class="form-label">Department</label>
                        <select class="form-select" name="select_department" id="select_department">
                            @foreach($departments as $department)
                                <option value="{{ $department->id}}">{{ $department->name }}</option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <a href="{{ route('colaborators') }}" class="btn btn-outline-danger me-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create colaborator</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>


    </div>

</x-layout-app>
