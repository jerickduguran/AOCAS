<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tax_expanded_withheld->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $tax_expanded_withheld->getCode() ?></td>
    </tr>
    <tr>
      <th>Nature income payment:</th>
      <td><?php echo $tax_expanded_withheld->getNatureIncomePayment() ?></td>
    </tr>
    <tr>
      <th>Tax rate percent:</th>
      <td><?php echo $tax_expanded_withheld->getTaxRatePercent() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $tax_expanded_withheld->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $tax_expanded_withheld->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('taxexpandedwithheld/edit?id='.$tax_expanded_withheld->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('taxexpandedwithheld/index') ?>">List</a>
