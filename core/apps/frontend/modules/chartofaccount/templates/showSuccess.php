<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $chart_of_account->getId() ?></td>
    </tr>
    <tr>
      <th>Account type:</th>
      <td><?php echo $chart_of_account->getAccountTypeId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $chart_of_account->getCode() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $chart_of_account->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $chart_of_account->getDescription() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $chart_of_account->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $chart_of_account->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $chart_of_account->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('chartofaccount/edit?id='.$chart_of_account->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('chartofaccount/index') ?>">List</a>
