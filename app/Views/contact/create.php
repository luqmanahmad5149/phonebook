<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="d-flex justify-content-center align-items-center" style="margin-top: 50px;">
        <div>
            <div class="mt-5">
                <!-- link to return home -->
                <a href="/"><button type="button" class="btn btn-link">Return Home</button></a>
            </div>
            <h2 class="mt-3 text-center">Create Contact</h2>
            <!-- form for creating new contact information -->          
            <form action="/save" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="mt-2" for="name">Name:</label>
                    <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" style="width: 400px;" placeholder="Enter your name..." id="name" name="name" value="<?= old('name'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mt-2 for="pwd">Contact:</label>
                    <input type="text" class="form-control <?= ($validation->hasError('contact')) ? 'is-invalid' : ''; ?>" style="width: 400px;" placeholder="Enter your contact number..." id="contact" name="contact" value="<?= old('contact'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('contact'); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-2" style="width: 400px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>