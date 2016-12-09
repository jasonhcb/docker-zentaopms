<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php'; ?>
<?php include 'table.html.php'; ?>
<form id='batchForm' target='hiddenwin' method='post' class='form-condensed'>

    <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="0" data-custom-menu="true">
        <thead>
            <tr>
                <th data-flex="false" data-width="140"><?php echo $lang->hdc->code ?></th>
                <th data-flex="false" data-width="auto"><?php echo $lang->hdc->name ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->step ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->deadline ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->type ?></th>
                <th data-flex="true" data-width="80"><?php echo $lang->hdc->rating ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->funcDesign ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->techDesign ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->codeDevelop ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->remoteTest ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->siteAccept ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->remoteHead ?></th>
                <th data-flex="true" data-width="100"><?php echo $lang->hdc->siteHead ?></th>
                <th data-flex="true" data-width="180"><?php echo $lang->hdc->funcOwnership ?></th>
                <th data-flex="true" data-width="180"><?php echo $lang->hdc->devOwnership ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->estReqSubmitDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->estCodeStartDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->estCodeEndDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->estTestEndDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->actReqSubmitDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->actCodeStartDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->actCodeEndDate ?></th>
                <th data-flex="true" data-width="150"><?php echo $lang->hdc->actTestEndDate ?></th>
                <th data-flex="true" data-width="200"><?php echo $lang->hdc->desc ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fileData as $key => $data): ?>
                <tr valign='top' align='center'>
                    <td>
                        <?php
                        if ($data->code) {
                            echo $data->code;
                            echo html::hidden("code[$key]", $data->code);
                        } else {
                            echo html::input("code[$key]", $data->code, "class='form-control' style='border-color: red;'");
                        }
                        echo html::hidden("project[$key]", $projectID);
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($data->name) {
                            echo $data->name;
                            echo html::hidden("name[$key]", $data->name);
                        } else {
                            echo html::input("name[$key]", $data->name, "class='form-control' style='border-color: red;'");
                        }
                        ?>
                    </td>
                    <?php
                    foreach ($lang->hdc->lustepList as $step => $value) {
                        if ($value == $data->step)
                            $data->step = $step;
                    }
                    ?>
                    <td><?php echo html::select("step[$key]", $lang->hdc->lustepList, $data->step, "class='form-control'") ?></td>
                    <td><?php echo html::input("deadline[$key]", $data->deadline, "class='form-control form-date'"); ?></td>
                    <td><?php echo html::select("type[$key]", $lang->hdc->lutypeList, $data->type, "class='form-control'") ?></td>
                    <td><?php echo html::select("rating[$key]", $lang->hdc->luratingList, $data->rating, "class='form-control'") ?></td>
                    <td><?php echo html::input("funcDesign[$key]", $data->funcDesign, "class='form-control'"); ?></td>
                    <td><?php echo html::input("techDesign[$key]", $data->techDesign, "class='form-control'"); ?></td>
                    <td><?php echo html::input("codeDevelop[$key]", $data->codeDevelop, "class='form-control'"); ?></td>
                    <td><?php echo html::input("remoteTest[$key]", $data->remoteTest, "class='form-control'"); ?></td>
                    <td><?php echo html::input("siteAccept[$key]", $data->siteAccept, "class='form-control'"); ?></td>
                    <td><?php echo html::input("remoteHead[$key]", $data->remoteHead, "class='form-control'"); ?></td>
                    <td><?php echo html::input("siteHead[$key]", $data->siteHead, "class='form-control'"); ?></td>
                    <td><?php echo html::select("funcOwnership[$key]", $lang->hdc->lufuncOSList, $data->funcOwnership, "class='form-control'") ?></td>
                    <td><?php echo html::select("devOwnership[$key]", $ludevOSList, $data->devOwnership, "class='form-control'") ?></td>
                    <td><?php echo html::input("estReqSubmitDate[$key]", $data->estReqSubmitDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("estCodeStartDate[$key]", $data->estCodeStartDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("estCodeEndDate[$key]", $data->estCodeEndDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("estTestEndDate[$key]", $data->estTestEndDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("actReqSubmitDate[$key]", $data->actReqSubmitDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("actCodeStartDate[$key]", $data->actCodeStartDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("actCodeEndDate[$key]", $data->actCodeEndDate, "class='form-control '"); ?></td>
                    <td><?php echo html::input("actTestEndDate[$key]", $data->actTestEndDate, "class='form-control '"); ?></td>
                    <td><?php echo html::textarea("desc[$key]", $data->desc, "rows='1' class='form-control'") ?></td>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='24' class='text-center' style="height: 45px;line-height: 45px;">
                    <?php
                    echo html::submitButton();
                    echo ' &nbsp; ' . html::backButton()
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<?php include '../../common/view/footer.html.php'; ?>

