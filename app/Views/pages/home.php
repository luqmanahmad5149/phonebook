<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<section>
    <div class="container">
        <div class="d-flex flex-row justify-content-center align-items-center bd-highlight mt-5">
            <div class="p-2 bd-highlight">
                <h2>Phone Book System</h2>
            </div>
            <div class="p-2 bd-highlight">
                <!-- link to create page -->
                <a href="/create"><button type="button" class="btn btn-success">Create Contact</button></a>
            </div>
        </div>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success text-center alert-dismissible fade show mt-3" role="0">
                <?= session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <table class="table table-bordered mt-3">
            <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <!-- check if variable exist -->
            <?php if ($contacts): ?>
                <!-- calculation to show numbering based on pages -->
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <!-- loop through variable -->
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $contact['name']; ?></td>
                        <td><?= $contact['contact']; ?></td>
                        <td class="w-25">
                            <div class="d-flex justify-content-center">
                                <div class="mx-3">
                                    <!-- link to update page -->
                                    <a href="/edit/<?= $contact['id']; ?>"><button type="button" class="btn btn-warning mt-2">Update</button></a>
                                </div>
                                <div class="mx-3">
                                    <!-- form to delete contact -->
                                    <form action="/delete/<?= $contact['id']; ?>" method="post">
                                        <?= csrf_field(); ?>    
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Are you sure?');">Delete</button>
                                    </form>                       
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <!-- links for each pages -->
        <?= $pager->links('contacts', 'contacts_pagination'); ?>
    </div>
</section>

<?= $this->endSection(); ?>