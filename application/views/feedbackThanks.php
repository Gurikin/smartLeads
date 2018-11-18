<div class="jumbotron">
    <h1>SMART-LEADS</h1>
</div>
<div class="content col-lg-12 justify-content-start">
    <h4><?= $this->getDinamicContent() ?></h4>
    <i><span>Страница будет перезагружена через 3 секунды</span></i>
    <?php header('Refresh: 3; URL=http://smart-leads/');?>
</div>