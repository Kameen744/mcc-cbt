<?php if(isset($questions)):?>
    <?php for($i=0; $i< $noofcrs; $i++): ?>
    <?php foreach($questions[$i] as $qst): ?>
        <?php if(isset($qst['id'])): ?>
        <div class="col-12">
            <button class="btn btn-sm btn-info ml-1 qstNumbsBtn" value="<?=$qst['id']?>">
                <?=$qst['id']?>
            </button>
            <hr>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="col-12">
        <button class="btn btn-sm btn-info ml-1 qstNumbsBtn" value="<?=$qst['id']?>">
            <?=$qst['id']?>
        </button>
    </div>
    <?php endfor; ?>
<?php endif; ?> 
<!-- finised exam -->
<?php if(isset($stuScore)): ?>
    <div class="jumbotron">
        <h1 class="display-3">Successfully Finished</h1> 
        <p class="lead"><b>You attempted <?= $stuScore['ttatmpt']?> questions</b></p>
        <hr class="my-2">
        <p><b>You can proceed to an interview.</b></p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="<?php echo base_url()?>logout/studentsLogout" role="button">Logout</a>
        </p>
    </div>
<?php endif; ?>