<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $taxrate->getId() ?></td>
    </tr>
    <tr>
      <th>Rate:</th>
      <td><?php echo $taxrate->getRate() ?></td>
    </tr>
    <tr>
      <th>Effectivity date:</th>
      <td><?php echo $taxrate->getEffectivityDate() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $taxrate->getType() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $taxrate->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $taxrate->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('taxrate/edit?id='.$taxrate->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('taxrate/index') ?>">List</a>
