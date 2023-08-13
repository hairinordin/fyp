<div class="row-fluid">
    <div class="col-md-12">
        <legend>Remarks</legend>
        <?php if ($ulasan) { ?>
            <?php foreach ($ulasan as $key => $premise): ?>
                <div class="well well-sm">

                    <?php if ($premise->suggestion) { ?>
                        <!-- Left-aligned -->
                        <div class="media">
                            <div class="media-left">
                                <span class="fa fa-user fa-4x media-object" aria-hidden="true"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $premise->sender_id ?> <small><i> Submitted on <?= date("d/m/Y H:i:s", strtotime($premise->datetime)) ?></i></small></h4>
                                <br>
                                <p><i> <?= $premise->message ?></i></p>
                                <p><b>Suggested Action - <?= $premise->suggestion ?></b></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        <?php } ?>
    </div></div> 

