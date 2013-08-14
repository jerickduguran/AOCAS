<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Department:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getDepartmentId() ?></td>
    </tr>
    <tr>
      <th>Start date:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getStartDate() ?></td>
    </tr>
    <tr>
      <th>Receive date:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getReceiveDate() ?></td>
    </tr>
    <tr>
      <th>Bill number:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getBillNumber() ?></td>
    </tr>
    <tr>
      <th>Amount:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getAmount() ?></td>
    </tr>
    <tr>
      <th>Particulars:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getParticulars() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $accounts_receivable_beginning_balance->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('arbeginningbalance/edit?id='.$accounts_receivable_beginning_balance->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('arbeginningbalance/index') ?>">List</a>
