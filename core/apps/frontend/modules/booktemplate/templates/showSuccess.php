<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $booktemplate->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $booktemplate->getCode() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $booktemplate->getName() ?></td>
    </tr>
    <tr>
      <th>Particulars:</th>
      <td><?php echo $booktemplate->getParticulars() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $booktemplate->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Department:</th>
      <td><?php echo $booktemplate->getDepartmentId() ?></td>
    </tr>
    <tr>
      <th>General library:</th>
      <td><?php echo $booktemplate->getGeneralLibraryId() ?></td>
    </tr>
    <tr>
      <th>Chart of account:</th>
      <td><?php echo $booktemplate->getChartOfAccountId() ?></td>
    </tr>
    <tr>
      <th>Debit:</th>
      <td><?php echo $booktemplate->getDebit() ?></td>
    </tr>
    <tr>
      <th>Credit:</th>
      <td><?php echo $booktemplate->getCredit() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $booktemplate->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $booktemplate->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('booktemplate/edit?id='.$booktemplate->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('booktemplate/index') ?>">List</a>
