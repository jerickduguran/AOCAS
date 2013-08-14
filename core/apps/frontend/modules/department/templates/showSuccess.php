<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $department->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $department->getCode() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $department->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $department->getDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $department->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $department->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('department/edit?id='.$department->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('department/index') ?>">List</a>
