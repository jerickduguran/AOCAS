<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tax_final_withheld->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $tax_final_withheld->getCode() ?></td>
    </tr>
    <tr>
      <th>Nature income payment:</th>
      <td><?php echo $tax_final_withheld->getNatureIncomePayment() ?></td>
    </tr>
    <tr>
      <th>Tax rate percent:</th>
      <td><?php echo $tax_final_withheld->getTaxRatePercent() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $tax_final_withheld->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $tax_final_withheld->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('taxfinalwithheld/edit?id='.$tax_final_withheld->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('taxfinalwithheld/index') ?>">List</a>
