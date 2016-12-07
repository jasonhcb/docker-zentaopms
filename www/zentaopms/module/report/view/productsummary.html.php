<?php include '../../common/view/header.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['report-file']);?></span>
    <strong> <?php echo $title;?></strong>
  </div>
</div>
<div class='side'>
  <?php include 'blockreportlist.html.php';?>
  <div class='panel panel-body' style='padding: 10px 6px'>
    <div class='text proversion'>
      <strong class='text-danger small text-latin'>PRO</strong> &nbsp;<span class='text-important'><?php echo $lang->report->proVersion;?></span>
    </div>
  </div>
</div>

<div class='main'>
  <div id='conditions'>
    <strong><?php echo $lang->report->conditions?></strong>
    <label for='closedProduct'>
    <input type='checkbox' value='closedProduct' name='closedProduct' id='closedProduct' <?php if(strpos($conditions, 'closedProduct') !== false) echo "checked='checked'"?>/>
      <?php echo $lang->report->closedProduct?>
    </label>
    <label for='overduePlan'>
      <input type='checkbox' value='overduePlan' name='overduePlan' id='overduePlan' <?php if(strpos($conditions, 'overduePlan') !== false) echo "checked='checked'"?>/>
      <?php echo $lang->report->overduePlan?>
    </label>
  </div>
  <table class='table table-condensed table-striped table-bordered tablesorter table-fixed active-disabled' id='product'>
    <thead>
    <tr class='colhead'>
      <th width='200'><?php echo $lang->product->name;?></th>
      <th width='120'><?php echo $lang->product->PO;?></th>
      <th><?php echo $lang->productplan->common;?></th>
      <th width="150"><?php echo $lang->productplan->begin;?></th>
      <th width="150"><?php echo $lang->productplan->end;?></th>
      <th class="w-50px"><?php echo $lang->story->statusList['draft'];?></th>
      <th class="w-50px"><?php echo $lang->story->statusList['active'];?></th>
      <th class="w-50px"><?php echo $lang->story->statusList['changed'];?></th>
      <th class="w-50px"><?php echo $lang->story->statusList['closed'];?></th>
    </tr>
    </thead>
    <tbody>
    <?php $color = false;?>
    <?php foreach($products as $product):?>
      <tr class="a-center">
        <?php $count = isset($product->plans) ? count($product->plans) : 1;?>
        <td align='left' rowspan="<?php echo $count;?>"><?php echo "<p>" . html::a($this->createLink('product', 'view', "product=$product->id"), $product->name) . "</p>";?></td>
        <td align='left' rowspan="<?php echo $count;?>" class="a-center"><?php echo "<p>" . $users[$product->PO] . '</p>';?></td>
        <?php if(isset($product->plans)):?>
        <?php $id = 1;?>
        <?php foreach($product->plans as $plan):?>
          <?php $class = $color ? 'rowcolor' : '';?>
          <?php if($id != 1) echo "<tr class='a-center'>"?>
            <td align='left' class="<?php echo $class;?>"><?php echo $plan->title;?></td>
            <td class="<?php echo $class;?>"><?php echo $plan->begin;?></td>
            <td class="<?php echo $class;?>"><?php echo $plan->end;?></td>
            <td class="<?php echo $class;?>"><?php echo (isset($plan->status['draft']) ? $plan->status['draft'] : 0);?></td>
            <td class="<?php echo $class;?>"><?php echo (isset($plan->status['active']) ? $plan->status['active'] : 0);?></td>
            <td class="<?php echo $class;?>"><?php echo (isset($plan->status['changed']) ? $plan->status['changed'] : 0);?></td>
            <td class="<?php echo $class;?>"><?php echo (isset($plan->status['closed']) ? $plan->status['closed'] : 0);?></td>
          <?php if($id != 1) echo "</tr>"?>
          <?php $id ++;?>
          <?php $color = !$color;?>
        <?php endforeach;?>
        <?php else:?>
          <?php $class = $color ? 'rowcolor' : '';?>
          <td class="<?php echo $class;?>"></td>
          <td class="<?php echo $class;?>"></td>
          <td class="<?php echo $class;?>"></td>
          <td class="<?php echo $class;?>"></td>
          <td class="<?php echo $class;?>"></td>
          <td class="<?php echo $class;?>"></td>
          <td class="<?php echo $class;?>"></td>
          <?php $color = !$color;?>
        <?php endif;?>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table> 
</div>
<?php include '../../common/view/footer.html.php';?>
