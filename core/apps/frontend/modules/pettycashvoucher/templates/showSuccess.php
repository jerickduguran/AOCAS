<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $petty_cash_voucher->getId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $petty_cash_voucher->getBookId() ?></td>
    </tr>
    <tr>
      <th>Voucher number:</th>
      <td><?php echo $petty_cash_voucher->getVoucherNumber() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $petty_cash_voucher->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $petty_cash_voucher->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Replenishment date:</th>
      <td><?php echo $petty_cash_voucher->getReplenishmentDate() ?></td>
    </tr>
    <tr>
      <th>Period:</th>
      <td><?php echo $petty_cash_voucher->getPeriod() ?></td>
    </tr>
    <tr>
      <th>Header message:</th>
      <td><?php echo $petty_cash_voucher->getHeaderMessage() ?></td>
    </tr>
    <tr>
      <th>Footer message:</th>
      <td><?php echo $petty_cash_voucher->getFooterMessage() ?></td>
    </tr>
    <tr>
      <th>Total amount:</th>
      <td><?php echo $petty_cash_voucher->getTotalAmount() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $petty_cash_voucher->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $petty_cash_voucher->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $petty_cash_voucher->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('pettycashvoucher/edit?id='.$petty_cash_voucher->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('pettycashvoucher/index') ?>">List</a>
