<!-- Upload Modal -->
<div id="uploadModal" class="modal">
    <div class="modal-content">
        <h3>Upload File</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" id="file" multiple>
            <button type="submit">Upload</button>
        </form>

    </div>
</div>

<!-- New Directory Modal -->
<div id="newDirModal" class="modal">
    <div class="modal-content">
        <h3>Create New Directory</h3>
        <form action="" method="post">
            <input type="text" name="new_dir" placeholder="Directory Name">
            <button type="submit">Create</button>
        </form>
    </div>
</div>

<!-- Rename Modal -->
<div id="renameModal" class="modal">
    <div class="modal-content">
        <h3>Rename File</h3>
        <form action="" method="post">
            <input type="hidden" name="rename_from" id="rename_from">
            <input type="text" name="rename_to" id="rename_to" placeholder="New Name">
            <button type="submit">Rename</button>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3>Are you sure you want to delete this file?</h3>
        <form action="" method="post">
            <input type="hidden" name="delete" id="delete_file">
            <button type="submit">Delete</button>
        </form>
    </div>
</div>