<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $bank->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $bank->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $bank->getDescription() ?></td>
    </tr>
    <tr>
      <th>Logo:</th>
      <td><?php echo $bank->getLogo() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $bank->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $bank->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $bank->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('bank/edit?id='.$bank->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('bank/index') ?>">List</a>
