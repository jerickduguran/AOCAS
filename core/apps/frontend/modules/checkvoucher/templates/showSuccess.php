<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $check_voucher->getId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $check_voucher->getBookId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $check_voucher->getStatus() ?></td>
    </tr>
    <tr>
      <th>Voucher number:</th>
      <td><?php echo $check_voucher->getVoucherNumber() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $check_voucher->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $check_voucher->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Date received:</th>
      <td><?php echo $check_voucher->getDateReceived() ?></td>
    </tr>
    <tr>
      <th>Period:</th>
      <td><?php echo $check_voucher->getPeriod() ?></td>
    </tr>
    <tr>
      <th>Due date:</th>
      <td><?php echo $check_voucher->getDueDate() ?></td>
    </tr>
    <tr>
      <th>Header message:</th>
      <td><?php echo $check_voucher->getHeaderMessage() ?></td>
    </tr>
    <tr>
      <th>Footer message:</th>
      <td><?php echo $check_voucher->getFooterMessage() ?></td>
    </tr>
    <tr>
      <th>Si dr number:</th>
      <td><?php echo $check_voucher->getSiDrNumber() ?></td>
    </tr>
    <tr>
      <th>Total amount:</th>
      <td><?php echo $check_voucher->getTotalAmount() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $check_voucher->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $check_voucher->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('checkvoucher/edit?id='.$check_voucher->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('checkvoucher/index') ?>">List</a>
