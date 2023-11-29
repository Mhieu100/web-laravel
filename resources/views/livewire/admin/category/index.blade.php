<div>

    <!-- Modal -->
    <div wire:ignore.seft class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>List Category
                        <a href="{{ url('admin/category/create') }}"
                            class="btn btn-primary text-white btn-sm float-end">Add
                            Category</a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{ asset("$category->image") }}"/></td>
                                    <td>{{ $category->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                            class="btn btn-sm btn-success text-white">Edit</a>
                                        <a wire:click="deleteCategory({{ $category->id }})" href=""
                                            class="btn btn-sm btn-danger  text-white" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Cotegories Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        })
    </script>
@endpush
