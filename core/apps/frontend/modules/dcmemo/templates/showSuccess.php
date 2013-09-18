<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $debit_credit_memo->getId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $debit_credit_memo->getBookId() ?></td>
    </tr>
    <tr>
      <th>Voucher number:</th>
      <td><?php echo $debit_credit_memo->getVoucherNumber() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $debit_credit_memo->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $debit_credit_memo->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Period:</th>
      <td><?php echo $debit_credit_memo->getPeriod() ?></td>
    </tr>
    <tr>
      <th>Header message:</th>
      <td><?php echo $debit_credit_memo->getHeaderMessage() ?></td>
    </tr>
    <tr>
      <th>Footer message:</th>
      <td><?php echo $debit_credit_memo->getFooterMessage() ?></td>
    </tr>
    <tr>
      <th>Total amount:</th>
      <td><?php echo $debit_credit_memo->getTotalAmount() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $debit_credit_memo->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $debit_credit_memo->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $debit_credit_memo->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('dcmemo/edit?id='.$debit_credit_memo->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('dcmemo/index') ?>">List</a>
