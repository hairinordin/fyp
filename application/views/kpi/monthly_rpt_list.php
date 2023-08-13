<legend>Monthly KPI Report</legend>

<div class="row">
    <div class="well col-md-4">
        <div style="overflow: hidden">   
            <form method="POST" action="<?= base_url() ?>kpi/monthly_view_range">
                <div class="form-group">
                        <label class="control-label">Type of Report : </label>

                        <select id="report" name="rpt" class='form-control'>
                            <option value="tools">Pencapaian EMT Bulanan Mengikut Tools</option>
                            <option value="bm">Laporan Pencapaian EMT 7/7</option>
                            <option value="rating">Rating</option>
                        </select>
                </div>
                <div class="form-group">
                    <label class="control-label">From</label> <input class="form-control" type="month" name="from" required>
                    <label class="control-label">To</label>   <input class="form-control" type="month" name="to" required>
                </div>
                
                <?php if ($this->role == "ADM"): ?>
                <div class="form-group">
                            <label class="control-label"> State :</label> 
                            <select class="form-control" id="state" name="state" required>
                                <option value="">Select one</option>
                                <option value="01">JOHOR</option>
                                <option value="02">KEDAH</option>
                                <option value="03">KELANTAN</option>
                                <option value="04">MELAKA</option>
                                <option value="05">NEGERI SEMBILAN</option>
                                <option value="06">PAHANG</option>
                                <option value="07">PULAU PINANG</option>
                                <option value="08">PERAK</option>
                                <option value="09">PERLIS</option>
                                <option value="10">SELANGOR</option>
                                <option value="11">TERENGGANU</option>
                                <option value="12">SABAH</option>
                                <option value="13">SARAWAK</option>
                                <option value="14">W.P KUALA LUMPUR</option>
                                <option value="15">W.P LABUAN</option>
                            </select>
                </div>
                 <?php endif; ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

