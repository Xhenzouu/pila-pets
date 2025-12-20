<!-- residents/layouts/partials/delete_pet_modal.php -->
<div class="modal fade" id="deletePetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill me-2"></i> Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-trash3 fs-1 text-danger mb-3"></i>
                <p class="lead">Are you sure you want to <strong>permanently delete</strong> the pet named:</p>
                <h4 class="text-danger fw-bold" id="deletePetName">Pet Name</h4>
                <p class="text-muted">This action <strong>cannot be undone</strong>.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger px-4">Yes, Delete Pet</a>
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('deletePetModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const petId = button.getAttribute('data-pet-id');
        const petName = button.getAttribute('data-pet-name');

        this.querySelector('#deletePetName').textContent = petName;
        this.querySelector('#confirmDeleteBtn').href = '<?= base_url('resident/pet/delete/') ?>' + petId;
    });
</script>