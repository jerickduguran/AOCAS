<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $receipt->getId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $receipt->getBookId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $receipt->getStatus() ?></td>
    </tr>
    <tr>
      <th>Receipt number:</th>
      <td><?php echo $receipt->getReceiptNumber() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $receipt->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Currency:</th>
      <td><?php echo $receipt->getCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Purchase order number:</th>
      <td><?php echo $receipt->getPurchaseOrderNumber() ?></td>
    </tr>
    <tr>
      <th>Date receive:</th>
      <td><?php echo $receipt->getDateReceive() ?></td>
    </tr>
    <tr>
      <th>Period:</th>
      <td><?php echo $receipt->getPeriod() ?></td>
    </tr>
    <tr>
      <th>Due date:</th>
      <td><?php echo $receipt->getDueDate() ?></td>
    </tr>
    <tr>
      <th>Header message:</th>
      <td><?php echo $receipt->getHeaderMessage() ?></td>
    </tr>
    <tr>
      <th>Footer message:</th>
      <td><?php echo $receipt->getFooterMessage() ?></td>
    </tr>
    <tr>
      <th>Total amount:</th>
      <td><?php echo $receipt->getTotalAmount() ?></td>
    </tr>
    <tr>
      <th>Mode payment:</th>
      <td><?php echo $receipt->getModePayment() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $receipt->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $receipt->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('or/edit?id='.$receipt->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('or/index') ?>">List</a>
