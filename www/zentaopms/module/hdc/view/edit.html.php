<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <strong><?php echo $hdc->name;?></strong>
      <small class='text-muted'> <?php echo $lang->hdc->edit;?></small>
    </div>
  </div>
  <form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form'> 
      <tr>
        <th class='w-90px'><?php echo $lang->hdc->name;?></th>
        <td class='w-p45'><?php echo html::input('name', $hdc->name, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->hdc->code;?></th>
        <td><?php echo $hdc->code;?></td>
      </tr>
      <tr>
        <th class='w-90px'><?php echo $lang->hdc->step?></th>
        <td>
          <?php echo $lang->hdc->lustepList[$hdc->step];//html::select("step", $lang->hdc->lustepList, $hdc->step, "class='form-control'")?>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->hdc->deadline?></th>
        <td>
          <div class='input-group'>
          <?php echo html::input('deadline', $hdc->deadline, "class='form-control form-date'");?>
          </div>
        </td>
      </tr> 
      <tr>
        <th><?php echo $lang->hdc->type;?></th>
        <td><?php echo html::select('type', $lang->hdc->lutypeList, $hdc->type, "class='form-control'");?></td>
      </tr>  
      <tr>
        <th><?php echo $lang->hdc->rating;?></th>
        <td><?php echo html::select("rating", $lang->hdc->luratingList, $hdc->rating, "class='form-control'")?></td>
      </tr>
      <tr>
          <th rowspan='2'><?php echo $lang->hdc->manday;?></th>
          <td>
              <div class='input-group'>
                  <span class='input-group-addon'><?php echo $lang->hdc->totalManday ?></span>
                  <input class="form-control disabled" value='<?php echo $hdc->totalManday;?>' readonly='readonly'>
              </div>
          </td>
          <td>
              <div class='input-group'>
                  <span class='input-group-addon'><?php echo $lang->hdc->onsiteManday ?></span>
                  <input class="form-control disabled" value='<?php echo $hdc->onsiteManday;?>' readonly='readonly'>
              </div>
          </td>
      </tr>
      <tr>
          <td style='padding-left: 5px;'>
              <div class='input-group'>
                  <span class='input-group-addon'><?php echo $lang->hdc->remoteManday ?></span>
                  <input class="form-control disabled" value='<?php echo $hdc->remoteManday;?>' readonly='readonly'>
              </div>
              </td>
          <td>
              <div class='input-group'>
                  <span class='input-group-addon'><?php echo $lang->hdc->codecmtManday ?></span>
                  <input class="form-control disabled" value='<?php echo $hdc->codecmtManday;?>' readonly='readonly'>
              </div>
          </td>
      </tr>
      <tr>
        <th rowspan='4'><?php echo $lang->hdc->owner;?></th>
        <td>
            <?php $funcDesign = trim(strstr($hdc->funcDesign, '/'), '/');?>
          <div class='input-group' <?php if($hdc->funcDesign && !$users[$funcDesign]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->funcDesign;?></span>
            <?php echo html::select('funcDesign', $users, $funcDesign, "class='form-control chosen'");?>
          </div>
        </td>
        <td>
            <?php $techDesign = trim(strstr($hdc->techDesign, '/'), '/');?>
          <div class='input-group' <?php if($hdc->techDesign && !$users[$techDesign]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->techDesign;?></span>
            <?php echo html::select('techDesign', $users, $techDesign, "class='form-control chosen'");?>
          </div>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 5px;'>
            <?php $codeDevelop = trim(strstr($hdc->codeDevelop, '/'), '/');?>
          <div class='input-group' <?php if($hdc->codeDevelop && !$users[$codeDevelop]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->codeDevelop;?></span>
            <?php echo html::select('codeDevelop', $users, $codeDevelop, "class='form-control chosen'");?>
          </div>
        </td>
        <td>
            <?php $remoteTest = trim(strstr($hdc->remoteTest, '/'), '/');?>
          <div class='input-group' <?php if($hdc->remoteTest && !$users[$remoteTest]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->remoteTest;?></span>
            <?php echo html::select('remoteTest', $users, $remoteTest, "class='form-control chosen'");?>
          </div>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 5px;'>
            <?php $siteAccept = trim(strstr($hdc->siteAccept, '/'), '/');?>
          <div class='input-group' <?php if($hdc->siteAccept && !$users[$siteAccept]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->siteAccept;?></span>
            <?php echo html::select('siteAccept', $users, $siteAccept, "class='form-control chosen'");?>
          </div>
        </td>
        <td>
            <?php $remoteHead = trim(strstr($hdc->remoteHead, '/'), '/');?>
          <div class='input-group' <?php if($hdc->remoteHead && !$users[$remoteHead]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->remoteHead;?></span>
            <?php echo html::select('remoteHead', $users, $remoteHead, "class='form-control chosen'");?>
          </div>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 5px;'>
            <?php $siteHead = trim(strstr($hdc->siteHead, '/'), '/');?>
          <div class='input-group' <?php if($hdc->siteHead && !$users[$siteHead]) echo "style='border: 1px solid red'"; ?>>
            <span class='input-group-addon'><?php echo $lang->hdc->siteHead;?></span>
            <?php echo html::select('siteHead', $users, $siteHead, "class='form-control chosen'");?>
          </div>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->hdc->ownerShip;?></th>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->funcOwnership;?></span>
                <?php echo html::select("funcOwnership", $lang->hdc->lufuncOSList, $hdc->funcOwnership, "class='form-control'")?>
            </div>
        </td>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->devOwnership;?></span>
                <?php echo html::select("devOwnership", $ludevOSList, $hdc->devOwnership, "class='form-control'")?>
            </div>
        </td>
      </tr>
      <tr>
        <th  rowspan='4'><?php echo $lang->hdc->date;?></th>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->estReqSubmitDate ?></span>
                  <input type='text' name='estReqSubmitDate' class=" form-control form-date" value='<?php echo $hdc->estReqSubmitDate;?>' />
            </div>
        </td>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->estCodeStartDate ?></span>
                  <input type='text' name='estCodeStartDate' class="form-control form-date" value='<?php echo $hdc->estCodeStartDate;?>' />
            </div>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 5px;'>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->estCodeEndDate ?></span>
                  <input type='text' name='estCodeEndDate' class=" form-control form-date" value='<?php echo $hdc->estCodeEndDate;?>' />
            </div>
        </td>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->estTestEndDate ?></span>
                  <input type='text' name='estTestEndDate' class="form-control form-date" value='<?php echo $hdc->estTestEndDate;?>' />
            </div>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 5px;'>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->actReqSubmitDate ?></span>
                  <input type='text' name='actReqSubmitDate' class=" form-control form-date" value='<?php echo $hdc->actReqSubmitDate;?>' />
            </div>
        </td>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->actCodeStartDate ?></span>
                  <input type='text' name='actCodeStartDate' class="form-control form-date" value='<?php echo $hdc->actCodeStartDate;?>' />
            </div>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 5px;'>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->actCodeEndDate ?></span>
                  <input type='text' name='actCodeEndDate' class=" form-control form-date" value='<?php echo $hdc->actCodeEndDate;?>' />
            </div>
        </td>
        <td>
            <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->hdc->actTestEndDate ?></span>
                  <input type='text' name='actTestEndDate' class="form-control form-date" value='<?php echo $hdc->actTestEndDate;?>' />
            </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->hdc->desc;?></th>
        <td colspan='2'><?php echo html::textarea('desc', htmlspecialchars($hdc->desc), "rows='6' class='form-control'");?></td>
      </tr> 
      <tr><td></td><td colspan='2'><?php echo html::submitButton() . html::backButton();?></td></tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
