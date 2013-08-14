<h1>Taxrates List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Rate</th>
      <th>Effectivity date</th>
      <th>Type</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($taxrates as $taxrate): ?>
    <tr>
      <td><a href="<?php echo url_for('taxrate/show?id='.$taxrate->getId()) ?>"><?php echo $taxrate->getId() ?></a></td>
      <td><?php echo $taxrate->getRate() ?></td>
      <td><?php echo $taxrate->getEffectivityDate() ?></td>
      <td><?php echo $taxrate->getType() ?></td>
      <td><?php echo $taxrate->getCreatedAt() ?></td>
      <td><?php echo $taxrate->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('taxrate/new') ?>">New</a>
