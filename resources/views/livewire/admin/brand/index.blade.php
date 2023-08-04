<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row mt-3">
        <div class="col-md-12">
            @if (session('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="alert alert-success">
                    <h5>{{ session('message') }}</h5>
                </div>
            </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h3>Brand List
                        <a href="" class="btn btn-outline-primary float-right" data-toggle="modal"
                            data-target="#addbrandModal"> Add
                            Brand</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="h5">Id</th>
                            <th class="h5">Name</th>
                            <th class="h5">Slug</th>
                            <th class="h5">Status</th>
                            <th class="h5">Edit</th>
                            <th class="h5">Remove</th>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td><a href="#" wire:click="editBrand({{ $brand->id }})" data-toggle="modal"
                                        data-target="#updatebrandModal" class="btn btn-sm btn-primary">Edit</a></td>
                                <td><a href="#" data-toggle="modal" wire:click="deleteBrand({{ $brand->id }})"
                                        data-target="#deletebrandModal" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No Brands Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal',event=>{
            $("#addbrandModal").modal('hide');
            $("#updatebrandModal").modal('hide');
            $("#deletebrandModal").modal('hide');
        })
</script>
@endpush
