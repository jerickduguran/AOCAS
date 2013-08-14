<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $invoice->getId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $invoice->getBookId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $invoice->getStatus() ?></td>
    </tr>
    <tr>
      <th>Invoice number:</th>
      <td><?php echo $invoice->getInvoiceNumber() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $invoice->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $invoice->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Purchase order number:</th>
      <td><?php echo $invoice->getPurchaseOrderNumber() ?></td>
    </tr>
    <tr>
      <th>Date receive:</th>
      <td><?php echo $invoice->getDateReceive() ?></td>
    </tr>
    <tr>
      <th>Period:</th>
      <td><?php echo $invoice->getPeriod() ?></td>
    </tr>
    <tr>
      <th>Terms of payment:</th>
      <td><?php echo $invoice->getTermsOfPaymentId() ?></td>
    </tr>
    <tr>
      <th>Due date:</th>
      <td><?php echo $invoice->getDueDate() ?></td>
    </tr>
    <tr>
      <th>Header message:</th>
      <td><?php echo $invoice->getHeaderMessage() ?></td>
    </tr>
    <tr>
      <th>Footer message:</th>
      <td><?php echo $invoice->getFooterMessage() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $invoice->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $invoice->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('invoice/edit?id='.$invoice->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('invoice/index') ?>">List</a>
