<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent='destroyCategory'>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <h3>Category List
                        <a href="{{ url('admin/category/create') }}" class="btn btn-outline-primary float-right">
                            Add
                            Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="h5">Id</th>
                            <th class="h5">Name</th>
                            <th class="h5">Status</th>
                            <th class="h5">Image</th>
                            <th class="h5">Edit</th>
                            <th class="h5">Remove</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td><img src="{{ asset('/assets/category/' . $category->image) }}" alt="image"
                                        class="border" height="70px" width="70px"></td>
                                <td><a href="{{ url('admin/category/'.$category->id.'/edit') }}"
                                        class="btn btn-sm btn-primary">Edit</a></td>
                                <td><a href="#" wire:click="deleteCategory({{ $category->id }})" data-toggle="modal"
                                        data-target="#deleteModal" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal',event=>{
            $("#deleteModal").modal('hide');
        })
</script>
@endpush
