
        <!-- Collect the nav links, forms, and other content for toggling -->
                 <?php if($this->role == 'premis'):?>
                
                <li><a href="<?= base_url() ?>emt/listEMT"><span class="fa fa-home fa-2x"></span></a></li>
                <li><a href="<?= base_url() ?>questions/">Soalan</a></li>
                
                <?php else : ?>
                <li><a href="<?= base_url() ?>dashboard/"><span class="fa fa-home fa-2x"></span></a></li>
                <li><a href="<?= base_url() ?>answers/">Answers from premise</a></li>
                <li><a href="<?= base_url() ?>fieldinspection/">Field Inspections</a></li>
                <!--<li><a href="<?= base_url() ?>questions/">!CAC (Penguatkuasa)</a></li>-->
                <li><a href="<?= base_url() ?>score/">Scoring</a></li>
                <li><a href="<?= base_url() ?>ulasan/">Remarks</a></li>
                <li><a href="<?= base_url() ?>kpi/sasaran">KPI</a></li>
                <li><a href="<?= base_url() ?>report/listing">Reporting</a></li>
                <?php endif ?>