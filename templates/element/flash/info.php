<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<link href="/css/style.css" rel="stylesheet">


<section>
    <div class="alert alert-info d-flex align-items-center" role="alert" style="font-size: 15px; width: fit-content;">
        <i class="bi bi-info-circle-fill me-2" style="font-size: 15px;"></i>
        <p> - <?= $message ?> </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 10px;" onclick="this.parentNode.parentNode.classList.add('hidden');"></button>
    </div>
</section>
