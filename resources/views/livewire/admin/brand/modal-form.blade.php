{{-- create --}}
<div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeBrand" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="h6">Name : </label>
                        <input type="text" wire:model.defer="name" id="" class="form-control">
                        @error('name')
                            <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="h6">Slug : </label>
                        <input type="text" wire:model.defer="slug" id="" class="form-control">
                        @error('slug')
                            <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="h6">Status : </label><br>
                        <input type="checkbox" wire:model.defer="status" id=""><br>[check -> hide]<br>[uncheck -> view]
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- update --}}
<div wire:ignore.self class="modal fade" id="updatebrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="updateBrand" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="h6">Name : </label>
                        <input type="text" wire:model.defer="name" id="" class="form-control">
                        @error('name')
                            <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="h6">Slug : </label>
                        <input type="text" wire:model.defer="slug" id="" class="form-control">
                        @error('slug')
                            <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="h6">Status : </label><br>
                        <input type="checkbox" wire:model.defer="status" id=""><br>[check -> hide]<br>[uncheck -> view]
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- delete --}}
<div wire:ignore.self class="modal fade" id="deletebrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent='destroyBrand'>
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
