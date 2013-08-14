<h1>Prepayment accounts List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Chart of account</th>
      <th>Code</th>
      <th>Title</th>
      <th>Description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($prepayment_accounts as $prepayment_account): ?>
    <tr>
      <td><a href="<?php echo url_for('prepaymentaccount/show?id='.$prepayment_account->getId()) ?>"><?php echo $prepayment_account->getId() ?></a></td>
      <td><?php echo $prepayment_account->getChartOfAccountId() ?></td>
      <td><?php echo $prepayment_account->getCode() ?></td>
      <td><?php echo $prepayment_account->getTitle() ?></td>
      <td><?php echo $prepayment_account->getDescription() ?></td>
      <td><?php echo $prepayment_account->getCreatedAt() ?></td>
      <td><?php echo $prepayment_account->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('prepaymentaccount/new') ?>">New</a>
