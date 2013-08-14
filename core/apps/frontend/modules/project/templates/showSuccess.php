<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $project->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $project->getCode() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $project->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $project->getDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $project->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $project->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('project/edit?id='.$project->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('project/index') ?>">List</a>
