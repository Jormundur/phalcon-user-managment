<div class="page-header">
    <h1>Mes Services</h1>
</div>
<p>Liste des machines et des machines virtuelles HTTP</p>

<div class="ui two column grid">

    <div class="column">
        <div class="ui segment">
            <h2>Mes Hosts</h2>
            <p>Serveurs dédiés</p>
            <?= $q['servhost'] ?>
        </div>
    </div>
    <div class="column">
        <div class="ui segment">
            <h2>Mes VirtualHosts</h2>
            <p>Hôtes virtuels sur serveur mutualisés</p>
            <?= $q['servirthost'] ?>
        </div>
    </div>
</div>
<?= $script_foot ?>

