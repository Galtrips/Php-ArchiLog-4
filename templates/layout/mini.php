<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
    <?= $this->Html->css(['style']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <section id="container">

    
        <?= $this->fetch('content') ?>

        <section class="" style="margin-left: auto; margin-right: auto; width: fit-content; margin-top: 10px;">
            <?= $this->Flash->render() ?>
        </section>

    </section>
    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.min.js"></script>

    <?= $this->Html->script(['common-scripts']) ?>
</body>
</html>