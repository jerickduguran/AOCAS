<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $accounts_payable_voucher->getId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $accounts_payable_voucher->getBookId() ?></td>
    </tr>
    <tr>
      <th>Voucher number:</th>
      <td><?php echo $accounts_payable_voucher->getVoucherNumber() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $accounts_payable_voucher->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $accounts_payable_voucher->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Si dr number:</th>
      <td><?php echo $accounts_payable_voucher->getSiDrNumber() ?></td>
    </tr>
    <tr>
      <th>Purchase order number:</th>
      <td><?php echo $accounts_payable_voucher->getPurchaseOrderNumber() ?></td>
    </tr>
    <tr>
      <th>Date received:</th>
      <td><?php echo $accounts_payable_voucher->getDateReceived() ?></td>
    </tr>
    <tr>
      <th>Period:</th>
      <td><?php echo $accounts_payable_voucher->getPeriod() ?></td>
    </tr>
    <tr>
      <th>Due date:</th>
      <td><?php echo $accounts_payable_voucher->getDueDate() ?></td>
    </tr>
    <tr>
      <th>Terms of payment:</th>
      <td><?php echo $accounts_payable_voucher->getTermsOfPaymentId() ?></td>
    </tr>
    <tr>
      <th>Header message:</th>
      <td><?php echo $accounts_payable_voucher->getHeaderMessage() ?></td>
    </tr>
    <tr>
      <th>Footer message:</th>
      <td><?php echo $accounts_payable_voucher->getFooterMessage() ?></td>
    </tr>
    <tr>
      <th>Total amount:</th>
      <td><?php echo $accounts_payable_voucher->getTotalAmount() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $accounts_payable_voucher->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $accounts_payable_voucher->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $accounts_payable_voucher->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('apvoucher/edit?id='.$accounts_payable_voucher->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('apvoucher/index') ?>">List</a>
