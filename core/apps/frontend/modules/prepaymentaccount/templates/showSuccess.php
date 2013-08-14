<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $prepayment_account->getId() ?></td>
    </tr>
    <tr>
      <th>Chart of account:</th>
      <td><?php echo $prepayment_account->getChartOfAccountId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $prepayment_account->getCode() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $prepayment_account->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $prepayment_account->getDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $prepayment_account->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $prepayment_account->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('prepaymentaccount/edit?id='.$prepayment_account->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('prepaymentaccount/index') ?>">List</a>
