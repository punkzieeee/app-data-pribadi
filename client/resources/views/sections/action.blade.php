<div class="btn-group">
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button>
    @include('sections.detail', $data)
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
    @include('sections.edit', $data)
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
    @include('sections.delete', $data)
</div>
