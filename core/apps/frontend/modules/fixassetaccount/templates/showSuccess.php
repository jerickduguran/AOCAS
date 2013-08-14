<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $fix_asset_account->getId() ?></td>
    </tr>
    <tr>
      <th>Chart of account:</th>
      <td><?php echo $fix_asset_account->getChartOfAccountId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $fix_asset_account->getCode() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $fix_asset_account->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $fix_asset_account->getDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $fix_asset_account->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $fix_asset_account->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('fixassetaccount/edit?id='.$fix_asset_account->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('fixassetaccount/index') ?>">List</a>
