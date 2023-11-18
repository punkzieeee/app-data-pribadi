<div class="btn-group">
    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detail-modal-{{$data['uuid']}}">Detail</button>
    @include('sections.detail')
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-modal-{{$data['uuid']}}">Edit</button>
    @include('sections.edit')
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$data['uuid']}}">Delete</button>
    @include('sections.delete')
</div>
