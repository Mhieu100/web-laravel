<div>

    @include('livewire.admin.brand.modal_form')

    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>List Brand
                        <a href="" class="btn btn-primary text-white btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#addBrandModal">Add
                            Brand</a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                         No Category
                                        @endif
                                    </td>
                                    <td>{{ $brand->status == '1' ? 'hidden' : 'visible' }}</td>
                                    <td>
                                        <a href="" wire:click="editBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-sm btn-success text-white">Edit</a>
                                        <a href="" wire:click="deleteBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        })
    </script>
@endpush
