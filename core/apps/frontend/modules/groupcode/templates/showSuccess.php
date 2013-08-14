<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $group_code->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $group_code->getCode() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $group_code->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $group_code->getDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $group_code->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $group_code->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('groupcode/edit?id='.$group_code->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('groupcode/index') ?>">List</a>
