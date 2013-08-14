<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $particular_template->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $particular_template->getCode() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $particular_template->getName() ?></td>
    </tr>
    <tr>
      <th>Particulars:</th>
      <td><?php echo $particular_template->getParticulars() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $particular_template->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Department:</th>
      <td><?php echo $particular_template->getDepartmentId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $particular_template->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $particular_template->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('particulartemplate_edit', $particular_template) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('particulartemplate') ?>">List</a>
