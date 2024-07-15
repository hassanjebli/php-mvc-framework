<?php

/** @var $exception \Exception */
?>

<div class="container">
    <div class="row justify-content-center align-items-center mt-4">
        <div class="col-md-6 text-center">
                <div class="card-body p-5">
                    <h1 class="display-1 mb-4"><?= $exception->getCode() ?></h1>
                    <h2 class="mb-4">Access Denied</h2>
                    <p class="lead mb-4"><?= $exception->getMessage() ?></p>
                    <a href="/" class="btn btn-secondary">Go Back to Home</a>
                </div>
        </div>
    </div>
</div>